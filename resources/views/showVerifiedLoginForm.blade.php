<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MAZ') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/mailimages/favicon.ico') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('front.include.styles')
    @stack('styles')
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TTGP534');</script>
    <!-- End Google Tag Manager -->
    <!-- <style>
    #wistia_simple_video_123{
        height: auto !important;
        max-width: 40% !important;
        margin: 0px auto !important;
    }
    </style> -->

</head>

<body class="container my-5">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TTGP534"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="app" class="maz__app__content">
        @include('front.include.alert')

        <!-- Begin page content -->
        <main class="maz__main__webcontent">
            <div class="custom-form my-5 p-5 shadow rounded">
                <form action="{{ route('post.login.form') }}" method="POST">
                    @csrf
                    {{-- @dd(url('') + Request::segment(1))
                    @if() --}}
                    <input type="hidden" name="intended_url" value="{{ url()->previous() }}">
                    <div class="form-group my-2">
                        <label for="">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                        @error('username')
                            <div class="small">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-2">
                        <label for="">Password <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            {{-- <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"> --}}
                            <button class="btn btn-outline-secondary" type="button" id="change-password-btn"><i class="fa fa-eye"></i></button>
                          </div>
                        @error('password')
                            <div class="small">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button class="btn btn-primary mt-3">SignIn</button>

                </form>
            </div>
        </main>
        @include('front.include.scripts')
        @stack('scripts')

        <script>
            $(document).ready(function(){
                $('button#change-password-btn').click(function(){
                    var $this = $(this);
                    var $password = $("input#password");
                    if($password.attr('type') == 'password'){
                        $password.attr('type','text');
                        $this.html('<i class="fa fa-eye-slash"></i>');
                    }
                    else{
                        $password.attr('type','password');
                        $this.html('<i class="fa fa-eye"></i>');
                    }
                });
            });
        </script>
    </div>
</body>

</html>
