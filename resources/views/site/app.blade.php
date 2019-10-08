<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - ANUC | HALL TICKETS</title>
    @include('site.partials.styles')
</head>
<body>
        @include('site.partials.header')
            @yield('content')
        @include('site.partials.footer')
        @include('site.partials.scripts')
</body>
</html>
 