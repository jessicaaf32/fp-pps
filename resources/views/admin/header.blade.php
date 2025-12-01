<header id="header" class="header d-flex align-items-center">

<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <!-- <img src="asset/img/logo.png" alt=""> -->
    <h1>Hibiscus<span>.</span></h1>
  </a>
  <nav id="navbar" class="navbar">
    <ul>
      <li><a href="#hero" class="nav-link @yield('Beranda')">Beranda</a></li>
      <li><a href="#about">Tentang</a></li>
      <li><a href="#portfolio">List Harga</a></li>
      <li><a href="#contact">Kontak</a></li>
      <li class="dropdown"><a href="#"><span>Pengaturan</span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
        <ul>
          <li><a href="#">Edit Password</a></li>
          <li><a href="#">Selengkapnya</a></li>
          <li><a href="/masuk">Keluar</a></li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-shopping-cart" style="font-size:15px"></i></a></li>
      <li><a href="#"><i class="fa fa-user-circle"></i>&nbsp; Hai, nama!!</a></li>
    </ul>
  </nav><!-- .navbar -->

  <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
  <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

</div>
</header><!-- End Header -->