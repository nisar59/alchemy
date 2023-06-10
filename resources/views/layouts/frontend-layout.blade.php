<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <title>App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        
        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('assets/izitoast/css/iziToast.min.css')}}">
        <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />


        <!-- Icons Css -->        
    </head>
    <body >
        @yield('content')
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/izitoast/js/iziToast.min.js')}}"></script>
        <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="{{asset('assets/js/functions.js')}}"></script>

            <script type="text/javascript">

        @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        error("{{$error}}", 'Input error');
        @endforeach
        @elseif (Session::has('warning'))
        warning("{{ Session::get('warning') }}");
        @elseif (Session::has('success'))
        success("{{ Session::get('success') }}");
        @elseif (Session::has('error'))
        error("{{ Session::get('error') }}");
        @elseif (Session::has('info'))
        info(`{{ Session::get('info') }}`);


        @elseif (isset($warning))
        warning("{{ $warning }}");
        @elseif (isset($success))
        success("{{ $success }}");
        @elseif (isset($error))
        error("{{ $error }}");
        @elseif (isset($info))
        info("{{ $info }}");

        @else
        @endif


        </script>
        @yield('js')
    </body>
</html>