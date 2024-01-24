<!doctype html>
<html lang="en">

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
                        <div class="card-body bg-dark">
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
