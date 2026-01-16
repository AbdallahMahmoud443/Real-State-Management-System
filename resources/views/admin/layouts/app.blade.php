<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="icon" type="image/png" href="uploads/favicon.png">
    <title>Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    @include('admin.layouts.assets_files.top-asset-files')

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('admin.layouts.navbar')
            @include('admin.layouts.sidebar')
        
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>
    @include('admin.layouts.assets_files.bottom-asset-files')
</body>

</html>
