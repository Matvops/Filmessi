<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <style>
        html, body {
            height: 100vh;
        }

        .bg-dark-blue {
            background-color: #070919;
        }

        .bg-light-blue {
            background-color: #4B4971;
        }

        .text-dark-blue {
            color: #4B4971;
        }

        .cursor-pointer {
            cursor: pointer;
        }

    </style>
</head>
<body class="bg-black">
    
    {{ $content }}
</body>
</html>