@extends("layouts.app")

@section("content")
    <div class="content">
        @include("flash::message")
        @include("adminlte-templates::common.errors")

        <div class="box box-primary">
            <section class="content-header">
                @if (request()->get("current-company"))
                    <a class="table-header-button pull-right" href="{{ route('companies.users.create', request()->get('current-company')->id) }}"><i class="fas fa-plus table-header-icon"></i><span class="table-header-text">{!! mb_strtoupper(\Lang::get("text.add"), "UTF-8") !!}<span></a>
                    <h1 class="title-header">{!! mb_strtoupper(\Lang::choice("tables.employees", "p"), "UTF-8") !!}</h1>
                @elseif (request()->get("current-holding"))
                    <a class="table-header-button pull-right" href="{{ route('holding.users.create', request()->get('current-holding')->id) }}"><i class="fas fa-plus table-header-icon"></i><span class="table-header-text">{!! mb_strtoupper(\Lang::get("text.add"), "UTF-8") !!}<span></a>
                @else
                    <a class="table-header-button pull-right" href="{{ route('users.create') }}"><i class="fas fa-plus table-header-icon"></i><span class="table-header-text">{!! mb_strtoupper(\Lang::get("text.add"), "UTF-8") !!}<span></a>
                @endif
                @if (is_null(request()->get("current-company")))
                    <h1 class="title-header">{!! mb_strtoupper(\Lang::choice("tables.users", "p"), "UTF-8") !!}</h1>
                @endif
            </section>

            <div class="box-body">
                @include("users.table")
            </div>
        </div>
    </div>
@endsection
