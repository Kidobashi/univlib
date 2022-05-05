<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!--Style-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
    @yield('content')
    
    <div id="coverimg">
        <!--<img src="/images/libbg.jpg" alt="Cover Image">-->
    </div>
    <!--Script-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>        <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!--Script-->
</body>
</html>