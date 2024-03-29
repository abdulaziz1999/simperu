<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.meta')
    <title>DASHBOARD SIMPERU</title>
    @include('admin.link')
</head>

<body>
    @include('sweetalert::alert')

    <!--*******************
        Preloader start
    ********************-->
    @include('admin.preload')
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav and Header start
        ***********************************-->
        @include('admin.header')
        <!--**********************************
            Nav and Header end ti-comment-alt
        ***********************************-->
        <!--**********************************
            Sidebar
        ***********************************-->
        @include('admin.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin.footer')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    @include('admin.script')
</body>

</html>