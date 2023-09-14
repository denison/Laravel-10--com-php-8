@extends("layouts.app")
@push('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@endpush

@section("content")
    <div class="container-fluid">
        {{-- @include("flash::message") --}}
        {{-- @include("adminlte-templates::common.errors") --}}

        <div class="box box-primary">
            <section class="content-header">
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-sm-6">
                        <h1 class="title-header" style="margin: 0; font-family: Comfortaa, Cursive; color: #d42330;">{!! mb_strtoupper(\Lang::choice("tables.companies", "p"), "UTF-8") !!}</h1>
                    </div>

                    <div class="col-sm-6">
                        <a class="table-header-button float-right" style="margin: 0; font-family: Comfortaa, Cursive; color: #d42330;" href="{{ route('companies.create') }}"><i class="fas fa-plus table-header-icon"></i> <span class="table-header-text">{!! mb_strtoupper(\Lang::get("text.add"), "UTF-8") !!}<span></a>
                    </div>
                </div>
            </section>

            <div class="box-body edit-box-body">
                {{-- @include("companies.table") --}}

                <table class="table table-bordered data-table table-hover">
                    <thead>
                        <th>{{ Lang::get("attributes.name") }}</th>
                        <th>Qtd de Turmas</th>
                        <th>{{ Lang::get("attributes.full_address") }}</th>
                        {{-- <th>{{ Lang::get("attributes.owner") }}</th> --}}
                        <th>{{ Lang::get("attributes.phone") }}</th>
                        <th>AÇão</th>
                    </thead>
                </table>
            </div>

            {{-- <a href="{{ route('home') }}" class="btn btn-success mt-2"><i class="fas fa-arrow-circle-left"></i> Voltar</a> --}}

        </div>
    </div>

    @if (request()->get("current-holding"))
        {{-- Documents Modal --}}
        <div class="modal fade" id="documents-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <img id="img_company_owner_selfie" style="display: block; width: 100%;" src="#"/>
                        </div>
                        <div class="col-sm-6">
                            <img id="img_company_owner_document" style="display: block; width: 100%;" src="#"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @push('scripts')
        {{-- @include('layouts.datatables_js') --}}
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

        <script type="text/javascript">
            $(function(){
                let table = $('.data-table').dataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('companies.my-companies') }}",
                    columns: [
                        {data: 'name', name: "name"},
                        {data: 'count_subscriptions', name: "count_subscriptions", orderable: false, searchable: false},
                        {data: 'full_address', name: "full_address", orderable: false, searchable: false},
                        {data: 'phone', name: "phone"},
                        {data: 'action', name: "action", orderable: false, searchable: false}
                    ]
                })
            })
        </script>
    @endpush
@endsection
