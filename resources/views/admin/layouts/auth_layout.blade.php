<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MultiAuthentication System</title>
    <style>
        .login-header {
            background: #0a0a20;
            background: linear-gradient(to top right, #0a0a20 40%, #1D47A0 72%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-color: rgb(10, 10, 32);" class="text-white">
    <div class="container my-5 d-flex justify-content-center align-items-center" style="height: 90vh">
        @yield('content')
    </div>
</body>

</html>
