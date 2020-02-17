<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta name="description" content="@yield('meta_description', 'Masterblade.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masterblade University | @yield('meta-title', 'Enrolment App')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <style>
        
        .fade-enter-active, .fade-leave-active {
            transition: opacity .5s;
        }
        .fade-enter, .fade-leave-to {
            opacity: 0;
        }
    </style>
    
</head>
<body>




@yield('content')






<script type="application/javascript" src="{{ mix('/js/app.js') }}"></script>




</body>

</html>