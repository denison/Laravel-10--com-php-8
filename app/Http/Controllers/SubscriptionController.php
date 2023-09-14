<?php

namespace App\Http\Controllers;

use App\Repositories\SubscriptionRepository;

use App\Http\Requests\CreateSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Company;
use App\Models\Subscription;
use App\Models\SubscriptionMember;
use App\Models\User;

use Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Illuminate\Support\Facades\Lang;

class SubscriptionController extends Controller
{
    /** @var  SubscriptionRepository */
    private $subscriptionRepository;

    public function __construct(SubscriptionRepository $subscriptionRepo)
    {
        $this->subscriptionRepository = $subscriptionRepo;
    }

    public function index()
    {
        return view('subscriptions.index');
    }

    public function create(){
        $companies = Company::pluck('name','id')->all();
        return view("subscriptions.create", compact("companies"));
    }

    /**
     * Store a newly created Company in storage
     *
     * @param CreateSubscriptionRequest $request
     *
     * @return Response
     */
    public function store(CreateSubscriptionRequest $request){
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
            $this->subscriptionRepository->create($input);
        }catch(\Exception $e){
            DB::rollBack();
            toastr()->error("Houve algum erro. Entre em contato com o suporte!");
            return redirect(route("subscriptions.index"));
        }

        DB::commit();
        toastr()->success(Lang::choice("tables.subscriptions", "s")." ".Lang::choice("flash.created", "f"));
        return redirect(route("subscriptions.index" ));
    }

    public function edit(){
        $companies = Company::pluck('name','id')->all();
        $subscription = Subscription::find(request()->subscription_id);
        
        if (empty($subscription)) 
        {
            toastr()->error(\Lang::choice("tables.subscriptions", "s")." ".\Lang::choice("flash.not_found", "f"));
            return redirect(route('subscriptions.index'));
        }

        return view("subscriptions.edit", compact("subscription", "companies"));
    }

    public function update(UpdateSubscriptionRequest $request){
        $input = $request->all();

        $subscription = Subscription::find($request->subscription_id);

        if (empty($subscription))
        {
            toastr()->error(\Lang::choice("tables.subscriptions", "s")." ".\Lang::choice("flash.not_found", "f"));
            return redirect(route('subscriptions.index'));
        }
       
        if (request()->expired_at)
        {
            $input['duration_days'] = null;
            $input['is_allow_renovation'] = false;
        }else if (request()->duration_days) {
            $input['expired_at'] = null;
        }
        try{
           $this->subscriptionRepository->update($input, $subscription->id);;
        }catch(\Exception $e){
            DB::rollBack();
            toastr()->error("Houve algum erro. Entre em contato com o suporte!");
            return redirect(route("subscriptions.index"));
        }

        DB::commit();
        toastr()->success(Lang::choice("tables.subscriptions", "s")." ".Lang::choice("flash.updated", "f"));
        return redirect(route("subscriptions.index"));
    }

    public function destroy(){
        try {
            $this->subscriptionRepository->delete(request()->subscription_id);
        } catch(\Exception $e) {
            toastr()->error("Houve algum erro. Entre em contato com o suporte!");
            return redirect(route("subscriptions.index"));
            dd($e);
        }

        toastr()->success(Lang::choice("tables.subscriptions", "s")." ".Lang::choice("flash.deleted_successfully","f"));
        return redirect(route("subscriptions.index"));
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
        ->groupBy("subscriptions.id");

        return DataTables::of($subscriptions)
        ->addColumn('action', function($subscription){})
        ->editColumn('action', function($row) {
            $id = $row->id;
            return view('subscriptions.datatables_actions', compact('row','id'))->render();
          })
        ->rawColumns(['action'])
        ->make(true);
    }
}
