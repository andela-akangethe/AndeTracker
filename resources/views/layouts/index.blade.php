<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/sweetalert.css">
</head>
<body class="{{ ! Auth::check() ? 'background' : '' }} ">
    
    @include('layouts.navigation')
    @if (! Auth::check())
        <div class="title">
            <h3><a href="/">AndeTracker</a></h3>
        </div>
    @endif
    @yield('admin-panel')
    <div class="container">
        @yield('content')
    </div>
    
    <script src="/js/sweetalert.min.js"></script>
    @if (Session::has('sweet_alert.alert'))
        <script>
            swal({
                text: "{!! Session::get('sweet_alert.text') !!}",
                title: "{!! Session::get('sweet_alert.title') !!}",
                timer: 4000,
                type: "{!! Session::get('sweet_alert.type') !!}",
                showConfirmButton: "{!! Session::get('sweet_alert.showConfirmButton') !!}",
                confirmButtonText: "{!! Session::get('sweet_alert.confirmButtonText') !!}",
                confirmButtonColor: "#AEDEF4"

                // more options
            });
        </script>
    @endif
    @yield('footer')
    <script src="/js/jquery-1.12.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
