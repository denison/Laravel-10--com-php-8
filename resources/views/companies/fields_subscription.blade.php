@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
<div class="row container-fluid px-4">
    <div class="col-lg-12 alert-ajax"></div>
    <div class="form-group col-md-12">
        <h4><b>Dados Cadastrais</b></h4>
    </div>

    {{ Form::hidden('company_id', request()->company_id) }}

    {{-- Name Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("name", \Lang::get("attributes.name").":") !!}
        {{-- <i class='fas fa-asterisk' style="font-size: 8px; top: -2px; position:relative;"></i> --}}
        {!! Form::text("name", null, ["class" => "form-control"]) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label("value", \Lang::get("attributes.value").": ") !!}
        {!! Form::text("value", null, ["class" => "form-control money-mask", 'required' => true]) !!}
    </div>

    <div class="form-group col-md-12">
        {!! Form::label("description", \Lang::get("attributes.description").":") !!}
        {!! Form::textarea("description", null, ["class" => "form-control"]) !!}
    </div>

    {{-- Quantity Vacancies Field --}}
    <div class="form-group col-sm-6">
        {!! Form::label("quantity_vacancies", \Lang::get("attributes.quantity_vacancies").":") !!}
        {!! Form::number("quantity_vacancies", null, ["class" => "form-control number-mask"]) !!}
    </div>

     {{-- Commercial Description Field --}}
     <div class="form-group col-sm-6">
        {!! Form::label("commercial_description", \Lang::get("attributes.commercial_description").":") !!}
        {!! Form::text("commercial_description", null, ["class" => "form-control"]) !!}
    </div>

      {{-- Accepted Payment Methods --}}
      <div class="form-group col-md-12">
        {!! Form::label('accepted_payment_methods', \Lang::get('attributes.accepted_payment_methods').':') !!}
        <select class="form-control select2" name="accepted_payment_methods[]" multiple="multiple">
            <option value="credit" {!! (isset($subscription->accepted_payment_methods) && in_array('credit', $subscription->accepted_payment_methods)) ? "selected" : "" !!}>{{ \Lang::get('text.credit')}}</option>
            {{-- <option value="debit" {!! (isset($subscription->accepted_payment_methods) && in_array('debit', $subscription->accepted_payment_methods)) ? "selected" : "" !!}>{{ \Lang::get('text.debit')}}</option> --}}
            <option value="pix" {!! (isset($subscription->accepted_payment_methods) && in_array('pix', $subscription->accepted_payment_methods)) ? "selected" : "" !!}>{{ \Lang::get('text.pix')}}</option>
        </select>
    </div>

     {{-- Expiration Field --}}
     <div class="form-group col-sm-12 expiration_type_options">
        {!! Form::label("expiration_type", \Lang::get("attributes.expiration_type").": ") !!}
        <div class="icheck">
            <label>
                {!! Form::radio('expiration_type', 'expired_at', (isset($subscription->expired_at)) ? true : false, ['required' => true]) !!}
                <span>{!! \Lang::get('attributes.expired_at') !!}</span>
            </label>
            <label>
                {!! Form::radio('expiration_type', 'duration_days', (isset($subscription->duration_days)) ? true : false, ['required' => true]) !!}
                <span>{!! \Lang::get('attributes.duration_days') !!}</span>
            </label>
        </div>
    </div>

    <div class="expiration_type_fields col-lg-12">
    </div>

    {{-- Card Image Field --}}
    <div class="form-group col-sm-12" style="margin-top: 25px">
        {!! Form::label('card_image', \Lang::get('attributes.card_image').':') !!}
        @if (isset($subscription) && !$subscription->isCardImageDefault())
            <!-- Div needed to restrict link to img -->
            <div style="width:10%">
                <a href="{!! $subscription->card_image !!}" target="_blank">
                    <img class="thumbnail" src="{!! $subscription->card_image !!}"/>
                </a>
            </div>
            <!-- Delete img -->
            <div class="form-group col-sm-12 no-padding" style="margin-bottom:10px">
                <div class="icheck">
                    <label>
                        {!! Form::checkbox('card_image', 'delete', false) !!}
                        <span>{!! \Lang::get('text.delete').' '.\Lang::get('attributes.photo') !!}</span>
                    </label>
                </div>
            </div>
        @else
            <img src=""/>
        @endif
        {!! Form::file('card_image', null, ['class' => 'form-control']) !!}
    </div>

    {{-- Submit Field --}}
    <div class="form-group col-sm-12 no-margin">
        {!! Form::submit(\Lang::get("text.save"), ["class" => "btn btn-primary"]) !!}
        <a href="{{ route('companies.index') }}" class="btn btn-default"> {{ \Lang::get("text.cancel") }}</a>
    </div>

</div>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(e)
        {
            $('.select2').select2();

            $('input:radio[name="expiration_type"]').change(function()
            {
                if ($(this).is(':checked')) 
                {
                    $('.expiration_type_fields').empty();
    
                    switch ($(this).val())
                    {
                        case 'expired_at':
                        {
                            $('.expiration_type_fields').append(
                                
                                    '<div class="form-group col-sm-12">' +
                                        '{!! Form::label("expired_at", \Lang::get("attributes.expired_at").": ") !!}' +
                                        '{!! Form::text("expired_at", null, ["class" => "form-control datetime-mask", "required" => true]) !!}' +
                                    '</div>'
                               
                            );
                        }
                        break;
    
                        case 'duration_days':
                        {
                            $('.expiration_type_fields').append(
                                '<div class="col-sm-12">' +
                                    '<div class="row">' +
                                        '<div class="form-group col-sm-6">' +
                                            '{!! Form::label("duration_days", \Lang::get("attributes.duration_days").": ") !!}' +
                                            '{!! Form::text("duration_days", null, ["class" => "form-control integer-mask", "required" => true]) !!}' +
                                        '</div>' +
    
                                        '<div class="form-group col-sm-6">' +
                                            '{!! Form::label("is_allow_renovation", \Lang::get("attributes.is_allow_renovation").": ") !!}' +
                                            '<div class="icheck">' +
                                                '<label>' +
                                                    '{!! Form::radio("is_allow_renovation", 1, true, ["required" => true]) !!}' +
                                                    '<span>{!! \Lang::get("text.yes") !!} &nbsp</span>' +
                                                '</label>' +
                                                '<label>' +
                                                    '{!! Form::radio("is_allow_renovation", 0, false, ["required" => true]) !!}' +
                                                    '<span>{!! \Lang::get("text.no") !!}</span>' +
                                                '</label>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>'
                            );
    
                            $('input[name="is_allow_renovation"]').iCheck({
                                checkboxClass: 'icheckbox_flat-green',
                                radioClass: 'iradio_flat-green',
                            });
                        }
                        break;
                    }
                }
            }).trigger('change');
        });
    </script>
@endpush