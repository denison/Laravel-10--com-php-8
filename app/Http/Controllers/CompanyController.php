<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\CompanyDataTable;
use App\Repositories\CompanyRepository;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

use App\Models\Company;

use Auth;
use Carbon\Carbon;
use DB;
use Exception;
use Flash;
use Response;
use App\Helpers\Functions;
use App\Http\Requests\CreateSubscriptionRequest;
use App\Models\CompanyEmployee;
use App\Repositories\SubscriptionRepository;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    private $companyRepository;
    private $subscriptionRepository;

    public function __construct(CompanyRepository $companyRepo, SubscriptionRepository $subscriptionRepo)
    {
        ini_set('memory_limit', '1G');
        ini_set('max_execution_time', 0);
        set_time_limit(0);

        $this->companyRepository = $companyRepo;
        $this->subscriptionRepository = $subscriptionRepo;
    }

    public function index(CompanyDataTable $companyDataTable)
    {
        $user = Auth::user();
        // return $companyDataTable->render("companies.index");
        return view('companies.index');
    }

    public function create()
    {
        return view("companies.create");
    }

     /**
     * Store a newly created Company in storage
     *
     * @param CreateCompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyRequest $request)
    {
        DB::beginTransaction();

        $partner = Company::first();
        $input = $request->all();
        try{
            $company = $this->companyRepository->create($input);

            $company_partners = [
                [
                    "company_id"            => $company->id,
                    "partner_id"            => $partner->id,
                    "cashback_percentage"   => 0
                ]
            ];
            DB::table('company_partners')->insert($company_partners);

            $company_employee = [
                [
                    "user_id"       => auth()->user()->id,
                    "company_id"    => $company->id,
                    "created_at"    => Carbon::now(),
                    "updated_at"    => Carbon::now()
                ]
            ];
            DB::table('company_employee')->insert($company_employee);

            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            toastr()->error("Houve algum erro. Entre em contato com o suporte!");
            return redirect(route("companies.index"));
            dd($e);
        }

        toastr()->success(Lang::choice("tables.companies", "s")." ".Lang::choice("flash.created", "f"));
        return redirect(route("companies.index"));
        
    }

    public function create_subscription(){
        return view("companies.create_subscription");
    }

    /**
     * Store a newly created Company in storage
     *
     * @param CreateSubscriptionRequest $request
     *
     * @return Response
     */
    public function storeSubscription(CreateSubscriptionRequest $request){
        DB::beginTransaction();
        $input = $request->all();
       
        if (request()->expired_at)
        {
            $input['duration_days'] = null;
            $input['is_allow_renovation'] = false;
        }else if (request()->duration_days) {
            $input['expired_at'] = null;
        }
        try{
            $subscription = $this->subscriptionRepository->create($input);
        }catch(\Exception $e){
            DB::rollBack();
            toastr()->error("Houve algum erro. Entre em contato com o suporte!");
            return redirect(route("companies.all-subscriptions", request()->company_id));
        }

        DB::commit();
        toastr()->success(Lang::choice("tables.subscriptions", "s")." ".Lang::choice("flash.created", "f"));
        return redirect(route("companies.all-subscriptions", request()->company_id));
    }

    public function myCompanies(){

        $my_companies = DB::table("company_employee")->where('user_id', auth()->user()->id)->pluck("company_id")->all();
        $companies = Company::select(
            "companies.id",
            "companies.name",
            "companies.phone",
            \DB::raw("CONCAT(companies.address, ',Nº',
                        CONCAT(companies.number, '-',
                            CONCAT(companies.neighborhood, '-',
                                CONCAT(companies.city, '/',
                                    CONCAT(companies.state, '(',
                                        CONCAT(companies.zipcode, ')')
                                    )
                                )
                            )
                        )
                    ) as full_address"),

            // \DB::raw("(CASE
            //         WHEN companies.is_active=true  THEN 'Sim'
            //         WHEN companies.is_active=false THEN 'Não'
            //         ELSE NULL
            //     END) as readable_is_active"),

            // \DB::raw('(select sum(payments.value) from payments where payments.gateway_transaction_id is not null and payments.company_id = companies.id and payments.is_accepted) as total_payments_to_holding'),

            // Current Plan
            // \DB::raw("(
            //     select
            //         concat('#', plans.id, ' - ', plans.name)
            //     from
            //         company_plan
            //         inner join plans
            //             on company_plan.plan_id = plans.id
            //     where
            //         company_plan.company_id = companies.id
            //         and company_plan.active
            //         and company_plan.expiration_date is not null
            //     order by
            //         company_plan.id desc
            //     limit 1
            // ) as current_plan"),
            DB::raw("COUNT(subscriptions.company_id) as count_subscriptions"),
        )
        ->leftJoin("subscriptions","subscriptions.company_id","companies.id")
        ->whereIn('companies.id', $my_companies)
        ->groupBy("companies.id");

        return DataTables::of($companies)
        ->editColumn('name', function(Company $company) {
            return '<a href="'.route('companies.all-subscriptions', $company->id).'" a>'.$company->name.'</a>';
        })
        ->rawColumns(['name'])
        ->make(true);
    }

    public function allSubscriptions(){
        return view("companies.subscriptions");
    }

    public function getSubscriptions(){
        $subscriptions = DB::table("subscriptions")->select(
            "subscriptions.id",
            "subscriptions.name",
            DB::raw("(CASE
                    WHEN subscriptions.is_active=true  THEN 'Sim'
                     WHEN subscriptions.is_active=false THEN 'Não'
                    ELSE NULL
            END) as readable_is_active"),
            "subscriptions.description",
            "subscriptions.value",
            DB::raw("COUNT(subscription_member.subscription_id) as count_members"),
        )
        ->leftJoin("subscription_member","subscription_member.subscription_id","subscriptions.id")
        ->where('company_id', request()->company_id)
        ->groupBy("subscriptions.id");

        return DataTables::of($subscriptions)
        ->editColumn('name', function( $subscription) {
            return '<a href="'.route('companies.all-subscriptions-members', [request()->company_id, $subscription->id]).'" a>'.$subscription->name.'</a>';
        })
        ->rawColumns(['name'])
        ->make(true);
    }

    public function allSubscriptionsMembers(){
        return view("companies.subscriptions-members");
    }

    public function getSubscriptionsMembers(){
        $subscriptions_members = DB::table("subscription_member")->select(
            "subscription_member.id",
            "users.name as user_name",
            "subscription_member.expiration_date",
            "subscription_member.description",

        )
        ->join("users","users.id","subscription_member.user_id")
        ->where('subscription_member.subscription_id', request()->subscription_id);
        
        return DataTables::of($subscriptions_members)
        ->make(true);
    }
}
