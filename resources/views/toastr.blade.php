
@php
    $text = '';
@endphp
@if(Session::has('errors'))
    @php
        $session_bags = Session::get('errors');
        if($session_bags){
            $aux = $session_bags->getBags();
            $messages = $aux['default']->getMessages();
            // dd($messages, $text);
            foreach ($messages as $key => $msg) {
                $text = $text . "<i class='fas fa-circle' style='font-size: 9px;'></i> ". $msg[0]. "</br>";
                // dd($msg, $key, $text);
            }
        }
    @endphp

@endif

@push('scripts')

<script>
    let textMessage = "{!! $text !!}";
    // success message popup notification
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    // info message popup notification
    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif

    // warning message popup notification
    @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif

    // error message popup notification
    @if(Session::has('errors'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.error(textMessage);
    @endif
</script>

@endpush