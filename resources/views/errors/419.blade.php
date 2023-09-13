{{-- @extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired')) --}}

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MAZ') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">     
    <link rel="stylesheet" href="{!! url(mix('assets/front/css/other.css')) !!}" />
    <script src="{!! url(mix('assets/front/js/other.js')) !!}" type="text/javascript"></script>
</head>
<body>
    <section class="maz__error-page">
        <div class="maz__error-bg-image">
            <div class="maz__error-content">
                <span class="maz__error-text">419</span>
                <h3 class="maz__error-info">Oops! Page Expired</h3>
                <h5 class="maz__error-msg">Page Expired</h5>
                <a href="{{ Route('welcome') }}" class="btn btn-primary btn-error-home">Back to Home</a>
            </div>
        </div>
    </section>
</body>
</html>