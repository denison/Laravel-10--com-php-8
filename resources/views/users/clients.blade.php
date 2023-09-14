@extends("layouts.app")
@push('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@section("content")
    <div class="container-fluid">
        <div class="box box-primary">
            <section class="content-header">
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-sm-6">
                        <h1 class="title-header" style="margin: 0;">{!! mb_strtoupper(\Lang::choice("tables.students", "p"), "UTF-8") !!}</h1>
                    </div>

                    {{-- <div class="col-sm-6">
                        <a class="table-header-button float-right" style="margin: 0;" href="{{ route('users.create') }}"><i class="fas fa-plus table-header-icon"></i> <span class="table-header-text">{!! mb_strtoupper(\Lang::get("text.add"), "UTF-8") !!}<span></a>
                    </div> --}}
                </div>
            </section>

            <div class="box-body edit-box-body">
                <table class="table table-bordered data-table table-hover">
                    <thead>
                        <th>{{ Lang::get("attributes.name") }}</th>
                        <th>{{ Lang::get("attributes.email") }}</th>
                        <th>{{ Lang::get("attributes.phone") }}</th>
                        <th>{{ Lang::get("attributes.is_active") }}</th>
                        <th>{{ Lang::get("attributes.birth_date") }}</th>
                        {{-- <th>AÇão</th> --}}
                    </thead>
                </table>
            </div>
        </div>
    </div>

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
                    ajax: "{{ route('users.get-clients') }}",
                    columns: [
                        {data: 'name', name: "name"},
                        {data: 'email', name: "email"},
                        {data: 'phone', name: "phone"},
                        {data: 'readable_is_active', name: "readable_is_active"},
                        {data: 'readable_birth_date', name: "readable_birth_date"}
                    ]
                })
            })
        </script>
    @endpush
@endsection
