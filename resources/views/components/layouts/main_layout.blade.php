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
        @import url('https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
        html, body {
            height: 120vh;
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

        .bg-top-header {
            background-color: #05051F;
        }

        .bg-bottom-header {
            background-color: #04001B;
        }

        .kantumruy {
            font-family: 'Kantumruy Pro';
        }

        .nav-hover:hover {
            color: #4B4971 !important;
            transition-property: color;
            transition-duration: 0.2s;
            transition-timing-function: ease;
        }

        .main_image {
            height: 600px;
            max-height: 700px;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            width: 60% !important;
            margin: auto;
            box-shadow: inset 0px 0px 10px 12px black;
            border-radius: 4px;
        }

        .main_image:hover {
            width: 100% !important;
            transition: width, box-shadow;
            transition-duration: 1s;
            transition-timing-function: ease-in-out;
            box-shadow: inset 0px 0px 15px 12px black;
        }
    </style>
</head>
<body class="bg-black kantumruy">
    
    {{ $content }}
</body>
</html>