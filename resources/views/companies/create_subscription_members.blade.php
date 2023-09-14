@extends("layouts.app")

@section("content")
    <div class="content">
        {{-- @include("flash::message") --}}
        {{-- @include("adminlte-templates::common.errors") --}}
        @include('toastr')
        <div class="box box-primary">
            <section class="content-header">
                <h1 class="title-header color-secondary">{!! mb_strtoupper(\Lang::get("text.add"), "UTF-8") !!} {!! mb_strtoupper(\Lang::choice("tables.members", "s"), "UTF-8") !!}</h1>
            </section>

            <div class="box-body edit-box-body">
                {!! Form::open(["route" => ["companies.store-subscription_members", [request()->company_id, request()->subscription_id]], "files" => true]) !!}
                    @include("companies.fields_subscription_members")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection