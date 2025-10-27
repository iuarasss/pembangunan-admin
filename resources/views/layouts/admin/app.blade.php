<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Proyek - Data Proyek</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!--Start CSS-->
    @include('layouts.admin.css')
    <!--End css-->
</head>

<body>


    <!--Start layout-->
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Sidebar -->
        @include('layouts.admin.sidebar')
        <!--End sidebar-->

        <!-- start main content -->
        @yield('content')
        <!--End main content-->

    </div>
    </div>
    </div>
    <!--End layout-->

    <!--Start js-->
    @include('layouts.admin.js')
    <!--End js-->

</a>
</body>

</html>
