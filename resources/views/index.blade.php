<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title','Beranda')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="{{asset('login/images/icons/favicon.ico')}}"/>
  <link href="{{ asset('/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact - v1.1.1
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="/beranda" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="asset/img/logo.png" alt=""> -->
        <h1>GROWID<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/beranda#hero" class="nav-link">Beranda</a></li>
          <li><a href="/beranda#about">Tentang</a></li>
          <li><a href="/kelas" class="nav-link @yield('Kelas')">Kelas</a></li>
          <li><a href="/quiz" class="nav-link @yield('Kuis')">Kuis</a></li>
          <li><a href="/diskusi" class="nav-link @yield('Diskusi')">Diskusi</a></li>
          <li><a href="/webinar" class="nav-link @yield('Webinar')">Webinar</a></li>
          <li><a href="/beranda#portfolio" class="nav-link @yield('Shop')">Penunjang Pembelajaran</a></li>
          <li><a href="/beranda#contact">Kontak</a></li>
          <li>
            <a href="/cart" class="nav-link @yield('Cart')"><i class="fa fa-shopping-cart" style="font-size:15px"></i>
              <span class="badge bg-info" style="font-size:7px; margin-left:-5px; margin-top:-5px;">
                {{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}}
              </span>
            </a>
          </li>
          <li class="dropdown">
            <a href="/account" class="nav-link @yield('Akun')">
              <img src="{{ asset('/img/team/'.Auth::user()->ava) }}"
                                                class="rounded-circle me-2"
                                                width="35" height="35">
              &nbsp; Hai, {{ Str::limit(Auth::user()->username, 6, '') }}

            </a>
            <ul>
              <li><a href="/logout">Keluar</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>GROWID<span style="color:#ff6b00;">.</span></span>
          </a>
          <p>GROWID sebuah website pembelajaran teknologi yang menjadi wadah bagi mahasiswa untuk belajar, berdiskusi, dan mengembangkan keterampilan digital secara mandiri. Pada pengembangan website ini, keberadaan fitur-fitur yang lengkap, mudah digunakan, dan dapat diakses secara gratis oleh seluruh pengguna menjadi hal yang sangat penting untuk menunjang proses belajar mengajar secara digital.</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Selengkapnya</h4>
          <ul>
            <li><a href="/beranda">Beranda</a></li>
            <li><a href="#about">Tentang kami</a></li>
            <li><a href="#">Layanan</a></li>
            <li><a href="#">Syarat Layanan</a></li>
            <li><a href="#">Kebijakan Pribadi</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Layanan Kami</h4>
          <ul>
            <li><a href="#">Manajemen Produk</a></li>
            <li><a href="#">Pemasaran</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Kontak kami</h4>
          <p>
            Jl. Raya ITS, Keputih, <br>
            Kec. Sukolilo, Surabaya, <br>
            Jawa Timur 60111 <br><br>
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> GROWID@gmail.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>GROWID</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/js/main.js') }}"></script>

</body>

</html>