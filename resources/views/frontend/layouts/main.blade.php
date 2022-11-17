<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@stack('title') - CV Builder</title>
    @include('frontend.layouts.links')
    @stack('links')
</head>

<body>

    @include('frontend.layouts.navbar')

    <div class="loader-back">
        <div class="loader"></div>
    </div>

    @yield('content')

    @stack('scripts')
</body>

</html>