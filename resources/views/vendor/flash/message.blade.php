@php
    $message = (session('middleware_flash_notification', null));
@endphp

@if ($message)
    @if (isset($message['overlay']) && $message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => isset($message['title']) ? $message['title'] : null,
            'body'       => isset($message['message']) ? $message['message'] : null
        ])
    @else
        <div class="alert alert-{{ isset($message['level']) ? $message['level'] : null }} {{ (isset($message['important']) && $message['important']) ? 'alert-important' : null }}" role="alert">
            @if (isset($message['important']) && $message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            {!! isset($message['message']) ? $message['message'] : null !!}
        </div>
    @endif

    {{ session()->forget('middleware_flash_notification') }}
@endif

@foreach (session('flash_notification', collect())->toArray() as $message)
    @if (isset($message['overlay']) && $message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => isset($message['title']) ? $message['title'] : null,
            'body'       => isset($message['message']) ? $message['message'] : null
        ])
    @else
        <div class="alert alert-{{ isset($message['level']) ? $message['level'] : null }} {{ (isset($message['important']) && $message['important']) ? 'alert-important' : null }}" role="alert">
            @if (isset($message['important']) && $message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            {!! isset($message['message']) ? $message['message'] : null !!}
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}