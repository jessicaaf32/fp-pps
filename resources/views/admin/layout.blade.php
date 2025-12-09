<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - GROWID Admin</title>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('admin/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/AdminLTE/dist/css/adminlte.min.css') }}">

    <style>
        /* Warna utama GROWID */
        :root {
            --growid-teal: #008080;
            --growid-light: #00a6a6;
        }

        .main-sidebar {
            background-color: var(--growid-teal) !important;
        }
        .brand-link {
            background-color: var(--growid-light) !important;
        }
        .nav-sidebar .nav-link.active {
            background-color: #006666 !important;
            color: white !important;
        }
        .nav-sidebar .nav-link:hover {
            background-color: #009999 !important;
            color: white !important;
        }
        /* Warna teks default menu sidebar */
        .nav-sidebar .nav-link {
            color: #ffffff !important;        /* putih */
            opacity: 0.85;                    /* sedikit pudar */
        }

        /* Saat link tidak aktif tetapi di-hover */
        .nav-sidebar .nav-link:hover {
            background-color: #009999 !important;
            color: #ffffff !important;
            opacity: 1;
        }

        /* Link aktif */
        .nav-sidebar .nav-link.active {
            background-color: #006666 !important;
            color: #ffffff !important;
            opacity: 1;
        }

        /* Icon warna dibuat putih */
        .nav-sidebar .nav-link i {
            color: #ffffff !important;
            opacity: 0.85;
        }

        /* Icon aktif */
        .nav-sidebar .nav-link.active i {
            opacity: 1;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- NAVBAR -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="/logout" class="nav-link text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </nav>

    <!-- SIDEBAR -->
    <aside class="main-sidebar elevation-4">
        <a href="/admin" class="brand-link text-center">
            <span class="brand-text font-weight-bold text-white">GROWID<span style="color:#ff6b00;">.</span></span>
        </a>

        <div class="sidebar">
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column">

                    <li class="nav-item">
                        <a href="/product" class="nav-link @yield('menu_product')">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Products</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/question" class="nav-link @yield('menu_question')">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>Questions</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/order" class="nav-link @yield('menu_order')">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Orders</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/user" class="nav-link @yield('menu_user')">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <!-- CONTENT -->
    <div class="content-wrapper p-4">
        @yield('content')
    </div>

</div>

<script src="{{ asset('admin/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/AdminLTE/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
