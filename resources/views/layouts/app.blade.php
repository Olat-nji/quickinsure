<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickInsure - Home page</title>
    <script src="{{asset('public/main/js/main.js')}}"></script>
    <link rel="stylesheet" href="{{asset('public/main/cdn/tailwind.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/main/cdn/css/all.css')}}">
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <script src="{{ asset('public/js/alpine.js') }}" defer></script>
    @livewireStyles
    @livewireScripts
</head>
<body class="bg-gray-100" >


    @include('main.includes.header')


    <div class=" p-4  md:grid md:grid-cols-1  items-center mt-9 mb-9" >

        {{$slot}}
    </div>
    
    <div class=" footer p-2 shadow-sm bottom-0 w-full bg-white" style="position:fixed">
        <p class="text-gray-600 text-center relative">Copyright Fashina Timothy 2020</p>
    </div>
</body>
</html>
