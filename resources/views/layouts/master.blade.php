<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta name="description" content="@yield('meta_description', 'El Coche.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masterblade University | @yield('meta-title', 'Enrolment App')</title>

    <link rel="stylesheet" href="https://www.jsdelivr.com/package/npm/bulma">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" type="text/css">
    
</head>
<body>




@yield('content')






<script type="application/javascript" src="{{ mix('/js/app.js') }}"></script>




</body>

</html>