<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ asset('public/css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/style.css') }}" rel="tylesheet" type="text/css">
    <link href="{{ asset('public/css/custom.css') }}" rel='stylesheet' type="text/css">
</head>

<body class="fixed-left">
    <!-- Loader -->
    {{-- <div id="preloader"><div id="status"><div class="spinner"></div></div></div> --}}

    @if (Auth::user())
        @include('layouts.side_nav')
    @endif
    @if (Auth::user())
        @include('layouts.header')
    @endif

    @yield('content')


    {{-- <ul class="navbar-nav mr-auto">

    </ul> --}}

    {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> --}}
    {{-- <div class="container"> --}}
    {{--  <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}

                </a> --}}
    {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}


    {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
    <!-- Left Side Of Navbar -->


    <!-- Right Side Of Navbar -->

    {{-- </div> --}}
    {{-- </div> --}}



    {{-- </nav> --}}
    @if (Auth::user())
        @include('layouts.footer')
    @endif


    <script src="{{ asset('public/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <script src="{{ asset('public/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('public/plugins/select2/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/js/bootbox.js') }}"></script>
    <script src="{{ asset('public/js/common.js') }}"></script>




</body>

</html>
<script>
    $(".select2").select2({
        width: '100%'
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });

    $(".select2").select2({
        width: '100%'
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#date-range-2').datepicker({
        toggleActive: true
    });
    jQuery('#date-range-3').datepicker({
        toggleActive: true
    });

    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 4000); // <-- time in milliseconds

    $(document).ready(function() {
        $(".btn-add").click(function() {
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click", ".delete-attachment", function() {
            if ($(".btn-danger").length > 1) {
                $(this).parents(".control-group").remove();
            }
        });
    });

    var delete_file_url = "{{ url('delete/file') }}"
</script>
