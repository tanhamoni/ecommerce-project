<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce Website</title>
    @include('frontend.includes.style')
    @stack('css')
</head>
<body>

    @include('frontend.includes.header')

    @yield('content')

    @include('frontend.includes.footer')


    @include('frontend.includes.script')
    @stack('script')
</body>
</html>




















