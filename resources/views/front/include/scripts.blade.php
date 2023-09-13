@if (isOtherLoad())
    <script src="{!! url(mix('assets/front/js/other.js')) !!}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.js" ></script>
@else
    <script src="{{ url(mix('assets/front/js/home.js')) }}"></script>
@endif
