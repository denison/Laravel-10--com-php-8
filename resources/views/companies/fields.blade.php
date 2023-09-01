
<div class="row container-fluid px-4">
    <div class="col-lg-12 alert-ajax"></div>
    <div class="form-group col-md-12">
        <h4><b>Dados Cadastrais</b></h4>
    </div>
   
  
    {{ Form::hidden('holding_id', 1) }}
    {{ Form::hidden('is_active', 1) }}
    {{ Form::hidden('is_anchor', 0) }}
    {{ Form::hidden('color_primrimary', "#f39e1c") }}
    {{ Form::hidden('color_secondary', "#1b212b") }}
    {{ Form::hidden('color_tertiary', "d42330") }}
    {{ Form::hidden('user_id', auth()->user()->id) }}
    {{ Form::hidden('slug', bin2hex(random_bytes(3))) }}
    {{ Form::hidden('working_time', null) }}


    {{-- Name Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("name", \Lang::get("attributes.name").":") !!}
        {{-- <i class='fas fa-asterisk' style="font-size: 8px; top: -2px; position:relative;"></i> --}}
        {!! Form::text("name", null, ["class" => "form-control"]) !!}
    </div>

     {{-- Email Field --}}
     <div class="form-group col-md-6">
        {!! Form::label("email", \Lang::get("attributes.email").":") !!}
        {!! Form::text("email", null, ["class" => "form-control"]) !!}
    </div>  

    {{-- Document Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("document", \Lang::get("attributes.document").":") !!}
        {!! Form::text("document", null, ["class" => "form-control document-mask"]) !!}
    </div>

    {{-- Phone Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("phone", \Lang::get("attributes.phone").":") !!}
        {!! Form::text("phone", null, ["class" => "form-control phone-mask"]) !!}
    </div>

    {{-- Whatsapp Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("whatsapp", \Lang::get("attributes.whatsapp").":") !!}
        {!! Form::text("whatsapp", null, ["class" => "form-control phone-mask"]) !!}
    </div>

     {{-- Zipcode Field --}}
     <div class="form-group col-md-6">
        {!! Form::label("zipcode", \Lang::get("attributes.zipcode").":") !!}
        {!! Form::text("zipcode", null, ["class" => "form-control zipcode-mask", 'required' => true, "autocomplete" => "off"]) !!}
    </div>

    {{-- Address Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("address", \Lang::get("attributes.address").":") !!}
        {!! Form::text("address", null, ["class" => "form-control", "readonly" => true, 'required' => true, "autocomplete" => "off"]) !!}
    </div>

    {{-- Number Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("number", \Lang::get("attributes.number").":") !!}
        {!! Form::text("number", null, ["class" => "form-control", "readonly" => true, 'required' => true, "autocomplete" => "off"]) !!}
    </div>

    {{-- Neighborhood Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("neighborhood", \Lang::get("attributes.neighborhood").":") !!}
        {!! Form::text("neighborhood", null, ["class" => "form-control", "readonly" => true, 'required' => true, "autocomplete" => "off"]) !!}
    </div>

     {{-- City Field --}}
     <div class="form-group col-md-6">
        {!! Form::label("city", \Lang::get("attributes.city").":") !!}
        {!! Form::text("city", null, ["class" => "form-control", "readonly" => true, 'required' => true, "autocomplete" => "off"]) !!}
    </div>

    {{-- State Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("state", \Lang::get("attributes.state").":") !!}
        {!! Form::text("state", null, ["class" => "form-control state-mask", "readonly" => true, 'required' => true, "autocomplete" => "off"]) !!}
    </div>

    {{-- Complement Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("complement", \Lang::get("attributes.complement").":") !!}
        {!! Form::text("complement", null, ["class" => "form-control", "autocomplete" => "off"]) !!}
    </div>

    {{-- Reference Field --}}
    <div class="form-group col-md-12">
        {!! Form::label("reference", \Lang::get("attributes.reference").":") !!}
        {!! Form::text("reference", null, ["class" => "form-control", "autocomplete" => "off"]) !!}
    </div>

    {{-- Facebook Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("facebook", \Lang::get("attributes.facebook").":") !!}
        {!! Form::text("facebook", null, ["class" => "form-control"]) !!}
    </div>

    {{-- Instagram Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("instagram", \Lang::get("attributes.instagram").":") !!}
        {!! Form::text("instagram", null, ["class" => "form-control"]) !!}
    </div>
    
    {{-- Website Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("website", \Lang::get("attributes.website").":") !!}
        {!! Form::text("website", null, ["class" => "form-control "]) !!}
    </div>

     {{-- Pix Field --}}
    <div class="form-group col-md-6">
        {!! Form::label("pix", \Lang::get("attributes.pix").":") !!}
        {!! Form::text("pix", null, ["class" => "form-control"]) !!}
    </div>
    

    {{-- Color Primary Field --}}
    {{-- <div class="form-group col-md-4">
        {!! Form::label("color_primary", \Lang::get("attributes.color_primary").":") !!}
        {!! Form::text("color_primary", (isset($company)) ? $company->color_primary : null, ["class" => "form-control colorpicker"]) !!}
    </div> --}}

    {{-- Color Secondary Field --}}
    {{-- <div class="form-group col-md-4">
        {!! Form::label("color_secondary", \Lang::get("attributes.color_secondary").":") !!}
        {!! Form::text("color_secondary", (isset($company)) ? $company->color_secondary : null, ["class" => "form-control colorpicker"]) !!}
    </div> --}}

    {{-- Color Tertiary Field --}}
    {{-- <div class="form-group col-md-4">
        {!! Form::label("color_tertiary", \Lang::get("attributes.color_tertiary").":") !!}
        {!! Form::text("color_tertiary", (isset($company)) ? $company->color_tertiary : null, ["class" => "form-control colorpicker"]) !!}
    </div> --}}

    {{-- <div class="form-group col-md-6">
        {!! Form::label("is_active", \Lang::get("attributes.is_active").":") !!}
        <div class="icheck">
            <label>
                {!! Form::radio('is_active', 1, true) !!}
                <span>{!! \Lang::get('text.yes') !!}</span>
            </label>
        </div>
        <div class="icheck">
            <label>
                {!! Form::radio('is_active', 0, false) !!}
                <span>{!! \Lang::get('text.no') !!}</span>
            </label>
        </div>
    </div> --}}

    {{-- Is Anchor Field --}}
    {{-- <div class="form-group col-md-6">
        {!! Form::label("is_anchor", \Lang::get("attributes.is_anchor").":") !!}
        <div class="icheck">
            <label>
                {!! Form::radio('is_anchor', 1, true) !!}
                <span>{!! \Lang::get('text.yes') !!}</span>
            </label>
        </div>
        <div class="icheck">
            <label>
                {!! Form::radio('is_anchor', 0, false) !!}
                <span>{!! \Lang::get('text.no') !!}</span>
            </label>
        </div>
    </div> --}}

    <div class="form-group col-md-6">
        {!! Form::label('photo', \Lang::get('attributes.photo').':') !!}
        @if (isset($company))
            <!-- Div needed to restrict link to img -->
            <div style="width:10%">
                <a href="{!! $company->photo !!}" target="_blank">
                    <img class="thumbnail" src="{!! $company->photo !!}"/>
                </a>
            </div>
            <!-- Delete img -->
            <div class="form-group col-md-12 no-padding" style="margin-bottom:10px">
                <div class="icheck">
                    <label>
                        {!! Form::checkbox('photo', 'delete', false) !!}
                        <span>{!! \Lang::get('text.delete').' '.\Lang::get('attributes.photo') !!}</span>
                    </label>
                </div>
            </div>
        @else
            <img src=""/>
        @endif
        {!! Form::file('photo', null, ['class' => 'form-control']) !!}
    </div>

    {{-- Cover Image Field --}}
    <div class="form-group col-md-6">
        {!! Form::label('cover_image', \Lang::get('attributes.cover_image').':') !!}
        @if (isset($company))
            <!-- Div needed to restrict link to img -->
            <div style="width:10%">
                <a href="{!! $company->cover_image !!}" target="_blank">
                    <img class="thumbnail" src="{!! $company->cover_image !!}"/>
                </a>
            </div>
            <!-- Delete img -->
            <div class="form-group col-md-12 no-padding" style="margin-bottom:10px">
                <div class="icheck">
                    <label>
                        {!! Form::checkbox('cover_image', 'delete', false) !!}
                        <span>{!! \Lang::get('text.delete').' '.\Lang::get('attributes.image') !!}</span>
                    </label>
                </div>
            </div>
        @else
            <img src=""/>
        @endif
        {!! Form::file('cover_image', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-md-12">
        {!! Form::label("description", \Lang::get("attributes.description").":") !!}
        {!! Form::textarea("description", null, ["class" => "form-control"]) !!}
    </div>

    <div class="form-group col-md-12">
        <h4><b>Conta Bancária</b></h4>
    </div>
    
    <div class="form-group col-md-6">
        {!! Form::label('bank_code', \Lang::get('attributes.bank_code').':') !!}
        {{-- {!! Form::text("bank_code", null, ["class" => "form-control"]) !!} --}}
         
        @php
            $banks = public_path()."/json/banks_iugu.json";
            $jsonBanks = file_get_contents($banks);
            $data = json_decode($jsonBanks, true);
        @endphp
        
        <select class="form-control select2" id="bank_code" name="bank_code">
            <option value="">{{ \Lang::get('text.select')}}</option>
            
            @foreach ($data as $key => $value)
                @if (isset($value['code']) && is_numeric($value['code']))
                    <option value="{{ $value['code'] }}" {{ (isset($company) && $company->bank_code == $value['code']) ? 'selected' : '' }}>
                        {{ $value['code'] }} - {{ $value['name'] }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>
    
    
    {{-- Bank Account Type --}}
    <div class="form-group col-md-6">
        {!! Form::label('bank_account_type', \Lang::get('attributes.bank_account_type').':') !!}
        <select class="form-control" id="bank_account_type" name="bank_account_type">
            <option value="">{{ \Lang::get('text.select')}}</option>
            <option value="CC" {!! (isset($company->bank_account_type) && $company->bank_account_type == 'CC') ? 'selected' : '' !!}>{{ \Lang::get('text.bank_account_type_cc')}}</option>
            <option value="PP" {!! (isset($company->bank_account_type) && $company->bank_account_type == 'PP') ? 'selected' : '' !!}>{{ \Lang::get('text.bank_account_type_pp')}}</option>
        </select>
    </div>

    {{-- Bank Agency --}}
    <div class="form-group col-md-6">
        {!! Form::label('bank_agency', \Lang::get('attributes.bank_agency').':') !!}
        {!! Form::text("bank_agency", null, ["class" => "form-control"]) !!}
    </div>
    
    {{-- Bank Agency Digit --}}
    <div class="form-group col-md-6">
        {!! Form::label('bank_agency_digit', \Lang::get('attributes.bank_agency_digit').':') !!}
        {!! Form::text("bank_agency_digit", null, ["class" => "form-control"]) !!}
    </div>

    {{-- Bank Account --}}
    <div class="form-group col-md-6">
        {!! Form::label('bank_account', \Lang::get('attributes.bank_account').':') !!}
        {!! Form::text("bank_account", null, ["class" => "form-control"]) !!}
    </div>
    
    {{-- Bank Account Digit --}}
    <div class="form-group col-md-6">
        {!! Form::label('bank_account_digit', \Lang::get('attributes.bank_account_digit').':') !!}
        {!! Form::text("bank_account_digit", null, ["class" => "form-control"]) !!}
    </div>

    <div class="form-group col-md-12">
        {!! Form::label("email_financial", \Lang::get("attributes.email_financial").":") !!}
        {!! Form::text("email_financial", null, ["class" => "form-control"]) !!}
    </div>   

     {{-- Submit Field --}}
     <div class="form-group col-md-12 no-margin">
        {!! Form::submit(\Lang::get("text.save"), ["class" => "btn btn-primary"]) !!}
        
        <a href="{{ route('companies.index') }}" class="btn btn-default">{{ \Lang::get("text.cancel") }}</a>
       
    </div>

</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            let disableFields = true;
            let statesAbbreviation = {"Acre":"AC", "Alagoas":"AL", "Amazonas":"AM", "Amapá":"AP", "Bahia":"BA", "Ceará":"CE", "Distrito Federal":"DF", "Espírito Santo":"ES", "Goiás":"GO", "Maranhão":"MA", "Minas Gerais":"MG", "Mato Grosso do Sul":"MS", "Mato Grosso":"MT", "Pará":"PA", "Paraíba":"PB", "Pernambuco":"PE", "Piauí":"PI", "Paraná":"PR", "Rio de Janeiro":"RJ", "Rio Grande do Norte":"RN", "Rondônia":"RO", "Roraima":"RR", "Rio Grande do Sul":"RS", "Santa Catarina":"SC", "Sergipe":"SE", "São Paulo":"SP", "Tocantins":"TO"};

            $("#zipcode").on("change", function() {
                let zipcode = $(this).val();

                if (zipcode.indexOf("_")===-1) {
                    let route = "{{ route('address.findByZipcode', ':zipcode') }}";
                    route = route.replace(":zipcode", zipcode);
                    
                    $.ajax(
                        {
                            url: route,
                            dataType: "json",
                            type: "GET",
                            beforeSend: function() 
                            {
                                $(".alert-ajax").fadeOut(300, "swing");
                                showLoading();
                            },
                            success: function(data) 
                            {
                                if (data) 
                                {

                                    disableFields = false;

                                    // console.log('aaaa');

                                    $("#address").val(data.logradouro);
                                    $("#number").val($("#number").data('old'));
                                    $("#neighborhood").val(data.bairro);
                                    $("#city").val(data.localidade);
                                    $("#state").val(data.uf);

                                    updateMarker();
                                } 
                                else 
                                {
                                    disableFields = false;
                                    
                                    $(".alert-ajax").empty();
                                    $(".alert-ajax").attr("class", "alert alert-danger alert-ajax col-lg-12");
                                    $(".alert-ajax").append("<li>{!! \Lang::get('flash.zipcode_not_found') !!}</li>");
                                    
                                    window.scrollTo({top: 0, behavior: "smooth"});
                                    $(".alert-ajax").fadeIn(300, "swing");
                                    toggleAddressFields();
                                }
                            },
                            error: function(fail) 
                            {
                                try
                                {
                                    disableFields = true;

                                    $(".alert-ajax").empty();
                                    $(".alert-ajax").attr("class", "alert alert-danger alert-ajax col-lg-12");
                                    
                                    if (typeof fail.responseJSON.errors !== "undefined") 
                                    {
                                        Object.values(fail.responseJSON.errors).forEach(
                                            function(value) 
                                            {
                                                $(".alert-ajax").append("<li>"+value+"</li>");
                                            }
                                        );
                                    } 
                                    else $(".alert-ajax").append("<li>"+fail.responseJSON.message+"</li>");

                                    window.scrollTo({top: 0, behavior: "smooth"});
                                    $(".alert-ajax").fadeIn(300, "swing");
                                }
                                catch (exe) {}
                            },
                            complete: function() 
                            {
                                toggleAddressFields();
                                hideLoading();
                            }
                        }
                    );
                } 
                else 
                {
                    disableFields = true;
                    toggleAddressFields();
                }
            });

            function toggleAddressFields() {
                if (disableFields) {
                    $("#address").val("");
                    $("#number").val("");
                    $("#neighborhood").val("");
                    $("#city").val("");
                    $("#state").val("");
                    $("#latitude").val("");
                    $("#longitude").val("");

                    $("#address").attr("readonly", true);
                    $("#number").attr("readonly", true);
                    $("#neighborhood").attr("readonly", true);
                    $("#city").attr("readonly", true);
                    $("#state").attr("readonly", true);

                    // latlng = L.latLng(0, 0);
                    // map.panTo(latlng);
                    // marker.setLatLng(latlng); 
                } else {
                    $("#address").attr("readonly", false);
                    $("#number").attr("readonly", false);
                    $("#neighborhood").attr("readonly", false);
                    $("#city").attr("readonly", false);
                    $("#state").attr("readonly", false);

                    if ($("#number").val() == "") {
                        $("#number").focus();
                    }
                }
            }

             // Update marker location
            function updateMarker() {
                $(".alert-ajax").fadeOut(300, "swing");
                showLoading();
                
                try
                {
                    address = $("#address").val();
                    number = $("#number").val();
                    neighborhood = $("#neighborhood").val();
                    city = $("#city").val();
                    state = $("#state").val();
                    zipcode = $("#zipcode").val();

                    // L.esri.Geocoding.geocode().address(address+" "+number).neighborhood(neighborhood).city(city).region(state).postal(zipcode).run(function (error, result) {
                    //     try
                    //     {
                    //         if (error) {
                    //             $(".alert-ajax").empty();
                    //             $(".alert-ajax").attr("class", "alert alert-danger alert-ajax");
                    //             $(".alert-ajax").append("<li>{!! \Lang::get('flash.leaflet_marker') !!}</li>");
                    //             $(".alert-ajax").append("<li>"+status+"</li>");
                                            
                    //             window.scrollTo({top: 0, behavior: "smooth"});
                    //             $(".alert-ajax").fadeIn(300, "swing");

                    //         } else {
                    //             latlng = L.latLng(result.results[0].latlng.lat, result.results[0].latlng.lng);
                    //             map.panTo(latlng); // Use "flyTo" to animate
                    //             marker.setLatLng(latlng); 

                    //             $("#latitude").val(latlng.lat.toFixed(8));
                    //             $("#longitude").val(latlng.lng.toFixed(8));
                    //         }
                    //     }
                    //     catch (exe)
                    //     {

                    //     }

                    //    
                    // });
                    hideLoading();
                }
                catch (exe)
                {
                    hideLoading();
                }
            }
        });

       

       
    </script>
@endpush


