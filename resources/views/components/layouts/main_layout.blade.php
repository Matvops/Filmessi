<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home.css')}} ">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
</head>
<body class="bg-black kantumruy">
    {{ $content }}
</body>
</html>