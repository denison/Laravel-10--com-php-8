@extends("layouts.app")

@section("content")
    <div class="content">
        {{-- @include("flash::message") --}}
        {{-- @include("adminlte-templates::common.errors") --}}
        @include('toastr')
        <div class="box box-primary">
            <section class="content-header">
                <h1 class="title-header color-secondary">{!! mb_strtoupper(\Lang::get("text.add"), "UTF-8") !!} {!! mb_strtoupper(\Lang::choice("tables.subscriptions", "s"), "UTF-8") !!}</h1>
            </section>

            <div class="box-body edit-box-body">
                {!! Form::model($subscription, ["route" => ["companies.update-subscription", [request()->company_id, request()->subscription_id]], "method" => "patch", "files" => true, 'id' => 'company_form']) !!}
                    @include("companies.fields_subscription")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection