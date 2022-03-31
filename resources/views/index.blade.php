<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('img/logo.png')}}">
    <title>
        {{$title}}
    </title>
    <link href="{{asset('css/main.css?t='.time())}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{asset('css/material-dashboard.css')}}" rel="stylesheet" />
</head>
<body class="g-sidenav-show  bg-gray-200">

@yield('body')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
<!--   Core JS Files   -->
<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('js/plugins/chartjs.min.js')}}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{asset('js/material-dashboard.min.js')}}"></script>
</html>
