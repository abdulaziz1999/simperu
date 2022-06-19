<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIMPERU</title>
    @include('layouts.meta')
    @include('layouts.link')
</head>

<body class="bg-white">
    <div class="container-xxl bg-white p-0">
        @include('layouts.menu')
        @yield('content')
        @include('layouts.footer')
    </div>
    @include('layouts.script')
</body>

</html>