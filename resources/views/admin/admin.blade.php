<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>@yield('title','Beranda')</title>
    
  <!-- theme meta -->
  <meta name="theme-name" content="mono" />

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
<!-- MATERIAL ICONS -->
  <link href="{{ asset('admin/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />

  <!-- SIMPLEBAR -->
  <link href="{{ asset('admin/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

  <!-- PLUGINS CSS -->
  <link href="{{ asset('admin/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

  <!-- QUILL (CDN, BIARKAN) -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  <!-- TOASTR -->
  <link href="{{ asset('admin/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />

  <!-- MONO MAIN CSS -->
  <link id="main-css-href" rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />

  <!-- FAVICON -->
  <link rel="icon" type="image/png" href="{{asset('login/images/icons/favicon.ico')}}"/>

  <!-- NPROGRESS JS (HEAD) -->
  <script src="{{ asset('admin/plugins/nprogress/nprogress.js') }}"></script>

</head>


  <body class="navbar-fixed sidebar-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    
    <div id="toaster"></div>
    

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
      
      
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/beranda">
                <span class="brand-name"><h1 style="color: white;">GROWID<span style="color: orangered;">.</span></h1></span>
                
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-left" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">

                  <li class="{{ request()->is('dashboard_admin') ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="/dashboard_admin">
                      <i class="mdi mdi-briefcase-account-outline"></i>
                      <span class="nav-text">Business Dashboard</span>
                    </a>
                  </li>
                
                  <li class="section-title">
                    Apps
                  </li>
               
                  <li class="{{ request()->is('users_admin') ? 'active' : '' }}">
                    <a class="sidenav-item-link @yield('Users')" href="/users_admin">
                      <i class="mdi mdi-account-multiple-outline"></i>
                      <span class="nav-text">User</span>
                    </a>
                  </li>

                  <li class="{{ request()->is('kelas_admin') || request()->is('materi_admin*') ? 'active' : '' }}">
                    <a class="sidenav-item-link @yield('Kelas')" href="/kelas_admin">
                      <i class="mdi mdi-school"></i>
                      <span class="nav-text">Kelas</span>
                    </a>
                  </li>

                  <li class="{{ request()->is(['kuis_admin']) ? 'active' : '' }}">
                    <a class="sidenav-item-link @yield('Kuis')" href="/kuis_admin">
                      <i class="mdi mdi-help-circle"></i>
                      <span class="nav-text">Quiz</span>
                    </a>
                  </li>

                  <li class="{{ request()->is(['webinar_admin']) ? 'active' : '' }}">
                    <a class="sidenav-item-link @yield('Webinar')" href="/webinar_admin">
                      <i class="mdi mdi-video-outline"></i>
                      <span class="nav-text">Webinar</span>
                    </a>
                  </li>

                  <li class="{{ request()->is('diskusi_admin') || request()->is('answer_admin*') ? 'active' : '' }}">
                    <a class="sidenav-item-link @yield('Diskusi')" href="/diskusi_admin">
                      <i class="mdi mdi-forum-outline"></i>
                      <span class="nav-text">Diskusi</span>
                    </a>
                  </li>
                  <!-- 
                  <li class="{{ request()->is(['marketplace_admin']) ? 'active' : '' }}">
                    <a class="sidenav-item-link @yield('Marketplace')" href="/marketplace_admin">
                      <i class="mdi mdi-store"></i>
                      <span class="nav-text">Marketplace</span>
                    </a>
                  </li> -->

                  <li class="has-sub {{ request()->is('marketplace_admin*', 'order_admin*') ? 'active' : '' }}">                   
                    <a class="sidenav-item-link"
                      href="javascript:void(0)"
                      data-toggle="collapse"
                      data-target="#marketplace"
                      aria-expanded="{{ request()->is('marketplace_admin*', 'order_admin*') ? 'true' : 'false' }}"
                      aria-controls="marketplace">
                      
                      <i class="mdi mdi-store"></i>
                      <span class="nav-text">Marketplace</span>
                      <b class="caret"></b>
                    </a>

                    <ul class="collapse
                        {{ request()->is('marketplace_admin*', 'order_admin*') ? 'show' : '' }}"
                        id="marketplace"
                        data-parent="#sidebar-menu">

                      <div class="sub-menu">

                        {{-- Data Produk --}}
                        <li class="{{ request()->is('marketplace_admin*') ? 'active' : '' }}">
                          <a class="sidenav-item-link" href="{{ url('/marketplace_admin') }}">
                            <span class="nav-text">Data Produk</span>
                          </a>
                        </li>

                        {{-- Order --}}
                        <li class="{{ request()->is('order_admin*') ? 'active' : '' }}">
                          <a class="sidenav-item-link" href="{{ url('/order_admin') }}">
                            <span class="nav-text">Data Order</span>
                          </a>
                        </li>

                      </div>
                    </ul>
                  </li>

                  <!-- <li class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#email"
                      aria-expanded="false" aria-controls="email">
                      <i class="mdi mdi-email"></i>
                      <span class="nav-text">email</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="email" data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        <li>
                          <a class="sidenav-item-link" href="email-inbox.html">
                            <span class="nav-text">Email Inbox</span>
                            
                          </a>
                        </li>
                        <li>
                          <a class="sidenav-item-link" href="email-details.html">
                            <span class="nav-text">Email Details</span>  
                          </a>
                        </li>
                      </div>
                    </ul>
                  </li> -->

              </ul>
            </div>
          </div>
        </aside>

      <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
      <div class="page-wrapper">
        
          <!-- Header -->
          <header class="main-header" id="header">
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>

              <span class="page-title">dashboard</span>

              <div class="navbar-right ">

                <!-- search form -->
                <div class="search-form">
                  <form action="index.html" method="get">
                    <div class="input-group input-group-sm" id="input-group-search">
                      <input type="text" autocomplete="off" name="query" id="search-input" class="form-control" placeholder="Search..." />
                      <div class="input-group-append">
                        <button class="btn" type="button">/</button>
                      </div>
                    </div>
                  </form>
                </div>

                <ul class="nav navbar-nav">
                  <!-- Offcanvas -->
                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <img src="{{ asset('img/team/Default.png') }}" class="user-image rounded-circle" alt="User Image" />
                      <span class="d-none d-lg-inline-block">Admin</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li>
                        <a class="dropdown-link-item" href="#">
                          <i class="mdi mdi-settings"></i>
                          <span class="nav-text">Account Setting</span>
                        </a>
                      </li>
                      <li class="dropdown-footer">
                        <a class="dropdown-link-item" href="sign-in.html"> <i class="mdi mdi-logout"></i> Log Out </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>


          </header>

          @yield('content')
        
          <!-- Footer -->
          <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p>
                &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap.
              </p>
            </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
          </footer>

      </div>
    </div>
    
                    <!-- JQUERY -->
                    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

                    <!-- BOOTSTRAP -->
                    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

                    <!-- SIMPLEBAR -->
                    <script src="{{ asset('admin/plugins/simplebar/simplebar.min.js') }}"></script>

                    <!-- HOTKEYS (CDN, BIARKAN) -->
                    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

                    <!-- APEXCHARTS -->
                    <script src="{{ asset('admin/plugins/apexcharts/apexcharts.js') }}"></script>

                    <!-- DATATABLES -->
                    <script src="{{ asset('admin/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>

                    <!-- JVECTORMAP -->
                    <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
                    <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
                    <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>

                    <!-- DATERANGEPICKER -->
                    <script src="{{ asset('admin/plugins/daterangepicker/moment.min.js') }}"></script>
                    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

                    <script>
                      jQuery(document).ready(function() {
                        jQuery('input[name="dateRange"]').daterangepicker({
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                          cancelLabel: 'Clear'
                        }
                      });
                        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
                          jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                        });
                        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
                          jQuery(this).val('');
                        });
                      });
                    </script>
                    
                    
                    
                    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>         
                    <!-- TOASTR -->
                    <script src="{{ asset('admin/plugins/toaster/toastr.min.js') }}"></script>

                    <!-- MONO CORE JS -->
                    <script src="{{ asset('admin/js/mono.js') }}"></script>

                    <!-- CHART -->
                    <script src="{{ asset('admin/js/chart.js') }}"></script>

                    <!-- MAP -->
                    <script src="{{ asset('admin/js/map.js') }}"></script>

                    <!-- CUSTOM -->
                    <script src="{{ asset('admin/js/custom.js') }}"></script>

                    <!-- <script>
                      $(document).ready(function () {
                        $('#productsTable').DataTable({
                          "pageLength": 10,
                          "lengthChange": false,
                          "searching": true,
                          "ordering": true,
                          "info": true,
                          "autoWidth": false
                        });
                      });
                    </script> -->

  </body>
</html>
