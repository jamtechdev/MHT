@if (isOtherLoad())
    <link rel="stylesheet" href="{!! url(mix('assets/front/css/other.css')) !!}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.css"/>
@else
    <link rel="stylesheet" href="{!! url(mix('assets/front/css/home.css')) !!}">
@endif
