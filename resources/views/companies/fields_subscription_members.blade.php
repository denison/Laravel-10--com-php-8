@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-selection__rendered {
            line-height: 31px !important;
        }
        .select2-container .select2-selection--single {
            height: 40px !important;
        }
        .select2-selection__arrow {
            height: 34px !important;
        }
    </style>
@endpush

<div class="row container-fluid px-4">
    <div class="col-lg-12 alert-ajax"></div>
    <div class="form-group col-md-12">
        <h4><b>Dados Cadastrais</b></h4>
    </div>

    {{ Form::hidden('subscription_id', request()->subscription_id) }}

    {{-- Company Id Field --}}
    <div class="form-group col-md-12">
        {!! Form::label("user_id", \Lang::get("attributes.user_id").":") !!}
        {!! Form::select("user_id[]", $users, null, ["class" => "form-control select2", "multiple" => "multiple"]) !!}
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label("expiration_date", \Lang::get("attributes.expiration_date").": ") !!}
        {!! Form::text("expiration_date", null, ["class" => "form-control datetime-mask", "required" => true]) !!}
    </div>

    {{-- Submit Field --}}
    <div class="form-group col-sm-12 no-margin">
        {!! Form::submit(\Lang::get("text.save"), ["class" => "btn btn-primary"]) !!}
        <a href="{{ route('companies.all-subscriptions-members', [request()->company_id, request()->subscription_id]) }}" class="btn btn-default"> {{ \Lang::get("text.cancel") }}</a>
    </div>

</div>


@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(e)
        {
            $('.select2').select2();
        });
    </script>
@endpush