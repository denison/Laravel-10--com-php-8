<div class="row container-fluid px-4">
    <div class="col-lg-12 alert-ajax"></div>
    <div class="form-group col-md-12">
        <h4><b>Dados Cadastrais</b></h4>
    </div>

    {{ Form::hidden('spoten_fee', 1.0) }}
    {{ Form::hidden('withdraw_date', "-") }}

    {{-- Company Id Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("company_id", \Lang::get("attributes.company_id").":") !!}
        {!! Form::select("company_id", ["" => "Selecionar"] + $companies_select, (isset($company)) ? $company->id : null, ["class" => "form-control"]) !!}
    </div>
    
    {{-- Status Payment Id Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("status_payment_id", \Lang::get("attributes.status_payment_id").":") !!}
        {!! Form::select("status_payment_id", ["" => "Selecionar"] + $status_payments_array, null, ["class" => "form-control", "required" => true]) !!}
    </div>

    {{-- User Id Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("user_id", \Lang::get("attributes.user_id").":") !!}
        {!! Form::select("user_id",  ["" => "Selecionar"] + $users, null, ["class" => "form-control select2 users", "required" => true]) !!}
    </div>

    {{-- Value Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("value", \Lang::get("attributes.value").":") !!}
        {!! Form::text("value", null, ["class" => "form-control money-mask"]) !!}
    </div>

    {{-- Submit Field --}}
    <div class="form-group col-md-12 no-margin">
        {!! Form::submit(\Lang::get("text.save"), ["class" => "btn btn-primary"]) !!}
        <a href="{{ route('payments.index') }}" class="btn btn-default">{{ \Lang::get("text.cancel") }}</a>
        
    </div>
    
</div>
