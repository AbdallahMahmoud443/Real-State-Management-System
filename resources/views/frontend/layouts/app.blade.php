<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Home</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/uploads/favicon.png') }}">
    @include('frontend.layouts.assets_files.top_assets')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>
    @include('frontend.layouts.navbar')
    @yield('content')
    @include('frontend.layouts.assets_files.bottom_assets')
</body>

</html>
