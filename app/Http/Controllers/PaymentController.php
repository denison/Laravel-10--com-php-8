<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\DataTables\PaymentPostbackDataTable;
use App\Enum\RoleName;
use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\CheckIn;
use App\Models\Company;
use App\Models\Order;
use App\Models\Payment;
use App\Models\StatusPayment;
use App\Models\PaymentPostback;
use App\Models\User;
use App\Repositories\PaymentRepository;
use Auth;
use Flash;
use Response;
use DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Lang;

class PaymentController extends Controller
{
     /** @var  PaymentRepository */
     private $paymentRepository;

     public function __construct(PaymentRepository $paymentRepo)
     {
         $this->paymentRepository = $paymentRepo;
     }

     public function index()
    {
        
        return view("payments.index");
    }

     /**
     * Show the form for creating a new Payment
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
    
        $payment = null;

        $users_select =  $users = User::select(
            "*",
        )->join("model_has_roles", "model_has_roles.model_id", 'users.id')
        ->where("model_has_roles.role_id", RoleName::from(strval(RoleName::CLIENT))->getId())->get();

        $users = $users_select->pluck("name", 'id')->all();

        $status_payments_array = StatusPayment::orderBy('name')->pluck('name', 'id')->toArray();

        $companies_select = Company::orderBy('name')->pluck('name', 'id')->toArray();

        return view("payments.create", compact("companies_select", "status_payments_array", "users", 'payment'));
    }

    public function store(CreatePaymentRequest $request)
    {
        
        $input = $request->all();

        if (!request()->created_at)
        {
            $input['created_at'] = Carbon::now();
        }
        
        try{
            $this->paymentRepository->create($input);
        }catch(\Exception $e){
            dd($e);
            toastr()->error("Houve algum erro. Entre em contato com o suporte!");
            return redirect(route("payments.index"));
        }

        
        toastr()->success(Lang::choice("tables.payments", "s")." ".Lang::choice("flash.created", "f"));
        return redirect(route("payments.index"));
        
    }

     /**
     * Show the form for editing the specified Payment
     *
     * @return Response
     * */
    public function edit()
    {
        $payment = Payment::find(request()->payment_id);
        
        if (empty($payment)) 
        {
            toastr()->error(\Lang::choice("tables.payments", "s")." ".\Lang::choice("flash.not_found", "f"));
            return redirect(route('payments.index'));
        }

        $users_select =  $users = User::select(
            "*",
        )->join("model_has_roles", "model_has_roles.model_id", 'users.id')
        ->where("model_has_roles.role_id", RoleName::from(strval(RoleName::CLIENT))->getId())->get();

        $users = $users_select->pluck("name", 'id')->all();

        $status_payments_array = StatusPayment::orderBy('name')->pluck('name', 'id')->toArray();
        $companies_select = Company::orderBy('name')->pluck('name', 'id')->toArray();


        return view("payments.edit", compact("payment", "status_payments_array", "users", "companies_select"));
    }

    public function update(UpdatePaymentRequest $request)
    {
        $payment = Payment::find(request()->payment_id);

        if (empty($payment))
        {
            toastr()->error(\Lang::choice("tables.payments", "s")." ".\Lang::choice("flash.not_found", "f"));
            return redirect(route('payments.index'));
        }

        

        $input = $request->all();
        try{
            $payment = $this->paymentRepository->update($input, $payment->id);
        }catch(\Exception $e){
            toastr()->error("Houve algum erro. Entre em contato com o suporte!");
            return redirect(route("payments.index"));
            dd($e);
        }
        
        toastr()->success(Lang::choice("tables.payments", "s")." ".Lang::choice("flash.created", "f"));
        return redirect(route("payments.index"));
    }

    public function destroy()
    {
        $payment = Payment::find(request()->payment_id);
       

        if (empty($payment)) {
            toastr()->error(\Lang::choice("tables.payments", "s")." ".\Lang::choice("flash.not_found", "f"));
            return redirect(route('payments.index'));
        }

        try 
        {
            $this->paymentRepository->delete($payment->id);
        }
        catch (\Exception $e) 
        {
            toastr()->error("Houve algum erro. Entre em contato com o suporte!");
            return redirect(route("payments.index"));
            dd($e);
        }

        toastr()->success(Lang::choice("tables.companies", "s")." ".Lang::choice("flash.deleted_successfully","f"));
        return redirect(route("payments.index"));
    }


    public function get_payments(){
        
        $payments = Payment::select(
            "payments.id",
            "payments.value",
            DB::raw("(
                SELECT users.name
                FROM users
                WHERE users.id = payments.user_id
            ) as user_name"),
            DB::raw("(
                SELECT users.phone
                FROM users
                WHERE users.id = payments.user_id
            ) as user_phone"),
            DB::raw("(
                SELECT companies.name
                FROM companies
                WHERE companies.id = payments.company_id
            ) as company_name"),
            DB::raw("(
                SELECT status_payments.name
                FROM status_payments
                WHERE status_payments.id = payments.status_payment_id
            ) as status_payment_name")
        )->orderBy("payments.id");
        return DataTables::of($payments)
        ->addColumn('action', function($payment){})
        ->editColumn('action', function($row) {
            $id = $row->id;
            return view('payments.datatables_actions', compact('row','id'))->render();
          })
        ->rawColumns(['action'])
        ->make(true);
    }
}
