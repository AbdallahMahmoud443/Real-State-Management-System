<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MultiAuthentication System</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-color: rgb(10, 10, 32);" class="text-white">
    @include('admin.layouts.navbar')
    <div class="container my-5">
        @yield('content')
    </div>

</body>

</html>
