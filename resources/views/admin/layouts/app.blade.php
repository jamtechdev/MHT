<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{config('app.name')}}</title>
    
    @include('admin.include.styles')
    @stack('styles')

    <style>
        .toggle-class {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 55px;
        height: 25px;
        display: inline-block;
        position: relative;
        border-radius: 50px;
        overflow: hidden;
        outline: none;
        border: none;
        cursor: pointer;
        background-color: #707070;
        transition: background-color ease 0.3s;
        }

        .toggle-class:before {
        content: "";
        display: block;
        position: absolute;
        z-index: 2;
        width: 21px;
        height: 20px;
        background: #fff;
        left: 2px;
        top: 3px;
        border-radius: 50%;
        font: 10px/28px Helvetica;
        text-transform: uppercase;
        font-weight: bold;
        text-indent: -22px;
        word-spacing: 9px;
        color: #fff;
        text-shadow: -1px -1px rgba(0,0,0,0.15);
        white-space: nowrap;
        box-shadow: 0 1px 2px rgba(0,0,0,0.2);
        transition: all cubic-bezier(0.3, 1.5, 0.7, 1) 0.3s;
        }

        .toggle-class:checked {
        background-color: #1667a5;
        }

        .toggle-class:checked:before {
        left: 32px;
        }
    </style>
   
   <link rel="stylesheet" href="https:////fast.wistia.com/assets/external/uploader.css" />
</head>

<body class="fixed-sidebar">

    <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.include.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('admin.include.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('admin.include.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

    <form id="logout-form" action="{{ route('admin::logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @include('admin.include.scripts')
    @stack('scripts')

</body>

</html>
