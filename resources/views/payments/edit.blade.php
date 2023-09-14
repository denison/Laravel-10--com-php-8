@extends('layouts.app')

@section("content")
    <div class="content">
        {{-- @include("flash::message")
        @include("adminlte-templates::common.errors") --}}
        @include('toastr')
        <div class="box box-primary">
            <section class="content-header">
                <h1 class="title-header color-secondary">{!! mb_strtoupper(\Lang::get("text.edit"), "UTF-8") !!} {!! mb_strtoupper(\Lang::choice("tables.payments", "s"), "UTF-8") !!}</h1>
            </section>

            <div class="box-body edit-box-body">
                {!! Form::model($payment, ["route" => ["payments.update", $payment->id], "method" => "patch", "files" => true, 'id' => 'payment_form']) !!}
                    @include("payments.fields")
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection