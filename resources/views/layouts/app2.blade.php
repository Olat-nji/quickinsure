<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QuickInsure - Admin dashboard</title>
  <script src="{{asset('public/main/js/main.js')}}"></script>
  <link rel="stylesheet" href="{{asset('public/main/cdn/tailwind.min.css')}}">
  
  <script src="{{ asset('public/js/app.js') }}" defer></script>
  <script src="{{ asset('public/js/alpine.js') }}" defer></script>
  </head>
<body class="bg-gray-100 px-7">
  {{$slot}}
</body>

</html>