<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    @include('header')
    @yield('content')
    @include('footer')
</body>
</html>
