<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIMPERU</title>
    @include('layouts.meta')
    @include('layouts.link')
</head>

<body class="bg-white">
    
    @include('layouts.menu')
    <div class="container-xxl bg-white p-0">
        @yield('content')
    </div>
    @include('layouts.footer')
    @include('layouts.script')
</body>

</html>