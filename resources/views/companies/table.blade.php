@push('css')
    @include('layouts.datatables_css')
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@push('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}

    <script type="text/javascript">
        $(document).ready(function()
        {
            $(document).on('click', '.btn-approve', function(e)
            {
                let url = $(this).data('url');

                let has_sub_account = $(this).data('has-sub-account');
                let has_company_plan = $(this).data('has-company-plan');
                
                let plan_name = $(this).data('plan-name');
                let plan_value = $(this).data('plan-value');

                if (!has_sub_account)
                {
                    e.preventDefault();
                    Swal.fire(
                    {
                        title: 'Ops! Atenção.',
                        text: '{{ \Lang::get("flash.company_not_approve_by_sub_account") }}',
                        icon: 'warning',
                        showCloseButton: true,
                    });
                }
                else
                {
                    Swal.fire(
                    {
                        title: "Aprovar Empresa",
                        reverseButtons: true,
                        showCancelButton: true,
                        cancelButtonText: "Cancelar",
                        confirmButtonText: "Aprovar",
                        //html: 'Selecione a data de <strong>Periodo Grátis</strong>. <br/> <br/> <input data-toggle="datepicker" type="text" id="swal_input_expiration_date" class="swal2-input"> <br/> <small>Não obrigatório, se for em branco, será definido padrão de 15 dias.</small>',
                        html: (has_company_plan) ? 
                            `<div class="row" style="margin-top: 35px">
                                <div class="col-md-12">
                                    <p>Você está aceitando a empresa no plano <b>${ plan_name }</b>.</p>
                                <div/>
                            </div>
                            
                            <div class="row" style="margin-top: 35px">
                                <div class="col-md-12">
                                    <label for="swal_input_plan_expiration_date" style="text-align: left; margin: 0;"> Selecione a data de <strong>Período Grátis</strong>: </label> 
                                    <br/>
                                    <input data-toggle="datepicker" value="" placeholder="Período Grátis" type="text" id="swal_input_plan_expiration_date" class="swal2-input">
                                </div>

                                <div class="col-md-12">
                                    <label for="swal_input_plan_value" style="text-align: left;margin: 0;">Defina Um <strong>Valor do Plano</strong>: </label>
                                    <br/>
                                    <input data-toggle="money" value="${ plan_value }" placeholder="Valor do Plano" type="text" id="swal_input_plan_value" class="swal2-input">
                                </div>
                            </div>` : null,
            
                        onOpen: function() 
                        {
                            $('[data-toggle="datepicker"]').datepicker(
                            {
                                // startView: 2,
                                startDate: '+1d',
                                format: 'dd/mm/yyyy',
                                autoHide: true,
                                inline: true,
                                zIndex: 999999
                            });

                            $('[data-toggle="money"]').maskMoney({
                                "prefix": "R$ ",
                                "thousands": ".",
                                "decimal": ",",
                                "precision": 2,
                                "allowZero": true,
                                "allowNegative": true,
                                "allowEmpty": true
                            });
                        },

                        allowOutsideClick: () => !Swal.isLoading(),
                        preConfirm: (test) => 
                        {
                            if (test == "") Swal.showValidationMessage("Selecione a forma");
                        },
                    })
                    .then((result) => 
                    {
                        if (result.value) 
                        {
                            let plan_expiration_date = $('#swal_input_plan_expiration_date').val();
                            let plan_value = $('#swal_input_plan_value').val();

                            let query_string = {};
                            if (plan_expiration_date) query_string['plan_expiration_date'] = plan_expiration_date;
                            if (plan_value) query_string['plan_value'] = plan_value;
                            
                            window.location.href = url + '?' + $.param(query_string);
                        }
                    });
                }
            });    
        });
    </script>
@endpush


