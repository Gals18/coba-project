<!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
    @include('header')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">

            @include('navbar')
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body bg-light">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('../dash/src') }}/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('../dash/src') }}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('../dash/src') }}/assets/js/sidebarmenu.js"></script>
    <script src="{{ asset('../dash/src') }}/assets/js/app.min.js"></script>
    <script src="{{ asset('../dash/src') }}/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="{{ asset('../dash/src') }}/assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="{{ asset('../dash/src') }}/assets/js/dashboard.js"></script>
</body>

</html>
