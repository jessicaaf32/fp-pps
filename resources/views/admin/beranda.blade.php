@extends('index')
@section('title','Beranda')
@section('Beranda','active')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Welcome to <span>Hibiscus</span></h2>
          <p>Hibiscus adalah akun resmi dari Hibiscus Store. Hibiscus adalah salah satu toko online yang mengedepankan kualitas dan bermanfaat baik untuk dilihat dan juga kesehatan. Hibiscus bergerak dibidang jual beli tumbuhan hias, tumbuhan sehat, dan tumbuhan berkualitas.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started">Get Started</a>
            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="{{ asset('/img/hero-img.svg') }}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-easel"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Terjangkau</a></h4>
            </div>
          </div>
          <!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-gem"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Berkualitas</a></h4>
            </div>
          </div>
          <!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-geo-alt"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Bermanfaat</a></h4>
            </div>
          </div>
          <!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-command"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Terjamin</a></h4>
            </div>
          </div>
          <!--End Icon Box -->

        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= Tentang kami Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Tentang kami</h2>
          <p>Hibiscus adalah akun resmi dari Hibiscus Store. Hibiscus adalah salah satu toko online yang mengedepankan kualitas dan bermanfaat baik untuk dilihat dan juga kesehatan. Hibiscus bergerak dibidang jual beli tumbuhan hias, tumbuhan sehat, dan tumbuhan berkualitas.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-6">
            <h3>Sekilas tentang tumbuhan</h3>
            <p>Tumbuhan merupakan salah satu mahkluk hidup yang terdapat di alam semesta. Selain itu tumbuhan adalah mahkluk hidup yang memiliki daun, batang, dan akar sehingga mampu menghasilkan makanan sendiri dengan menggunakan klorofil untuk menjalani proses fotosintesis.</p>
            <p>Tumbuhan memiliki banyak manfaat bagi kehidupan. Manfaat yang paling mendasar adalah sebagai penyuplai oksigen untuk kehidupan seluruh makhluk hidup di bumi. Setiap bagian-bagian tumbuhan memiliki fungsi dan manfaat bagi kehidupan. Misalnya, untuk sumber bahan makanan, bahan baku industri, kesehatan, dan sebagainya.</p>
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> Sekilas Tentang Tumbuhan.</li>
                <li><i class="bi bi-check-circle-fill"></i> Cara Merawat Tumbuhan.</li>
                <li><i class="bi bi-check-circle-fill"></i> Manfaat Tumbuhan.</li>
                <li><i class="bi bi-check-circle-fill"></i> Tips dan Saran.</li>
                <li><i class="bi bi-check-circle-fill"></i> Ulasan Pengguna.</li>
              </ul>
              <div class="position-relative mt-4">
                <img src="{{asset('/img/bunga3.jpg')}}" class="img-fluid rounded-4" alt="">
                <a href="https://youtu.be/MB80ZuIJATI" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="content px-xl-5">
              <h3>Seputar<br><strong>Tips dan Trik</strong></h3>
            </div>
          </div>

          <div class="col-lg-8">

            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <span class="num">1.</span>
                    Bagaimana cara merawat tumbuhan yang baik dan benar?
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Merawat Tanaman Agar Tumbuh Subur: <br>
                    Memilih dengan tepat media tanam. <br>
                    Memilih tempat untuk menanam. <br>
                    Memilih tanaman yang tepat. <br>
                    Memberi sinar matahari yang cukup. <br>
                    Menyiram tanaman dengan teknik yang tepat. <br>
                    Mengatur suhu dan kelembaban. <br>
                    Memastikan tanaman bebas dari hama. <br>
                    Memotong bagian yang kering atau mati. <br>
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <span class="num">2.</span>
                    Bagaimana cara membudidayakan tanaman?
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Cara Melakukan Budidaya Tanaman <br>

                    1. Memilih Jenis Tanaman Hias. Pilihlah tanaman hias yang kamu sukai dan cocok untuk diletakkan di pekarangan rumah. <br>
                    2. Menyiapkan Media Tanam dan Peralatannya. <br>
                    3. Pemberian Pupuk Sesuai Kebutuhan. <br>
                    4. Lakukan Penyiraman Secara Rutin. <br>
                    5. Merawat Kebersihan Tanaman. <br>
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <span class="num">3.</span>
                    Perlukah tanaman di siram setiap hari?
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Menyiram tanaman bertujuan untuk memastikan akarnya memiliki banyak air. Meskipun penyiraman pagi hari biasanya merupakan cara terbaik, sirami juga tanaman pada malam hari sebelum cuaca panas tiba. Sirami tanaman dalam sekali atau dua kali setiap minggu.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <span class="num">4.</span>
                    Pupuk yang baik untuk tanaman itu seperti apa?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  Ada 5 pupuk yang baik untuk tanaman yaitu : <br>

                  1. Pupuk Kotoran Kambing <br>
                  Pupuk dari kotoran kambing adalah salah satu pupuk tanaman hias yang terbaik. Ini karena kotoran kambing punya kandungan kalium lebih tinggi dari pupuk lainya. Sehingga, pupuk kotoran kambing dapat merangsang tumbuhnya tanaman bunga dan buah jadi lebih baik.
                  Karena teksturnya berbentuk butiran bulat dan sulit dipecah secara fisik, pupuk kotoran kambing perlu dikomposkan dahulu sebelum digunakan hingga pupuk menjadi matang.
                  <br>
                  2. Pupuk PLP <br>
                  Pupuk PLP juga disebut dengan pupuk langsung pakai. Pupuk ini tidak hanya sangat baik untuk tanaman hias, tetapi juga mempermudah perawatan tanaman hias dengan bentuk pupuk yang cair.
                  Pupuk PLP tak hanya dapat menutrisi tanaman hias, tetapi juga untuk membuat penampilan daun pada tanaman hias lebih mengilap.
                  <br>
                  3.Pupuk NPK Mutiara 16-16-16 <br>
                  pupuk NPK Mutiara mengandung 16% N (Nitrogen), 16% P2O5 (Phospate), 16% K2O (Kalium), 0.5% MgO (Magnesium), dan 6% CaO (Kalsium). Pupuk ini juga termasuk dalam jenis pupuk tanaman hias yang terbaik. Dengan kandungan ini, pupuk NPK Mutiara punya banyak manfaat, seperti:
                  <br>
                  - Membuat daun tanaman lebih segar dan hijau sehingga mempermudah proses fotosintesis <br>
                  - Meningkatkan perkembangan akar, sehingga akar lebih sehat, kuat, lebat, dan tanaman jadi lebih cepat tinggi <br>
                  - Menambah jumlah anakan akar jadi lebih banyak, sehingga tanaman jadi lebih kokoh <br>

                  4. Pupuk Vitamin B1 Liquinox Start <br>
                  Pupuk Vitamin B1 Liquinox Start punya kandungan utama P2O5 2.0%, Iron (Fe) 0.10% sebagai Fe-EDTA, Vitamin B1 (thiamine mononitrate) 0.10%, dan NAA 0.04% lho, Moms.
                  Kandungan ini sangat bagus dipakai pada saat repotting tanaman (pemindahan ke pot), ataupun di fase pertumbuhan tanaman.
                  Pupuk tanaman hias ini dapat merangsang metabolisme tanaman, sehingga tanaman yang stres karena kondisi bare root (pengiriman tanpa media) ataupun karena pemindahan ke media baru, bisa melakukan metabolisme untuk beradaptasi dengan lingkungan ataupun media barunya.
                  <br>
                  5. Herbafarm Pupuk Cair Bio Organik <br>
                  Herbafarm adalah pupuk cair bio-organik yang diperkaya mikrobia (cair). Pupuk ini diproses melalui proses biological complex process (BCP).
                  Pupuk Herbafarm mengandung unsur hara makro dan mikro yang sangat dibutuhkan tanaman hias, ada juga asam humat, asam fulvat, dan hormon tanaman.
                  Tak hanya itu, produk pupuk tanaman hias ini juga mengandung mikroba biofertilizer yang sangat berperan untuk penyerapan hara oleh tanaman.
                                   
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <span class="num">5.</span>
                    Apakah media tanam mempengaruhi pertumbuhan?
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  Faktor eksternal merupakan faktor yang terdapat di luar benih, bibit atau tanaman, salah satu yang mempengaruhi pertumbuhan yaitu media tanam. Media tanam yang baik adalah media yang mampu menyediakan air dan unsur hara dalam jumlah cukup bagi pertumbuhan tanaman.
                  </div>
                </div>
              </div><!-- # Faq item-->

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>List Harga</h2>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

          <div>
            <ul class="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-hias">Hias</li>
              <li data-filter=".filter-obat">Obat</li>
              <li data-filter=".filter-pangan">Pangan</li>
              <li data-filter=".filter-bunga">Bunga</li>
            </ul><!-- End Portfolio Filters -->
          </div>

          <div class="row gy-4 portfolio-container">

            <div class="col-xl-4 col-md-6 portfolio-item filter-hias">
              <div class="portfolio-wrap">
                <a href="{{asset('/img/gelombang.jpg')}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{asset('/img/gelombang.jpg')}}" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">App 1</a></h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p> <br>
                  <div class="text-center"><a href="#" class="buy-btn"><i class="fa fa-shopping-cart"></i>  Buy</a></div>
                  
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-hias">
              <div class="portfolio-wrap">
                <a href="{{asset('/img/lidah_mertua.jpg')}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{asset('/img/lidah_mertua.jpg')}}" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">App 1</a></h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p><br>
                  <div class="text-center"><a href="#" class="buy-btn"><i class="fa fa-shopping-cart"></i>  Buy</a></div>
                </div>
                
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-hias">
              <div class="portfolio-wrap">
                <a href="{{asset('/img/pilodendron.jpg')}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{asset('/img/pilodendron.jpg')}}" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">App 1</a></h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p><br>
                  <div class="text-center"><a href="#" class="buy-btn"><i class="fa fa-shopping-cart"></i>  Buy</a></div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-obat">
              <div class="portfolio-wrap">
                <a href="{{asset('/img/belimbing.jpg')}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{asset('/img/belimbing.jpg')}}" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Product 1</a></h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p><br>
                  <div class="text-center"><a href="#" class="buy-btn"><i class="fa fa-shopping-cart"></i>  Buy</a></div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-obat">
              <div class="portfolio-wrap">
                <a href="{{asset('/img/kayu_manis.jpg')}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{asset('/img/kayu.jpg')}}" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Product 1</a></h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p><br>
                  <div class="text-center"><a href="#" class="buy-btn"><i class="fa fa-shopping-cart"></i>  Buy</a></div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-obat">
              <div class="portfolio-wrap">
                <a href="{{asset('/img/mengkudu.jpg')}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{asset('/img/mengkudu.jpg')}}" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Product 1</a></h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p><br>
                  <div class="text-center"><a href="#" class="buy-btn"><i class="fa fa-shopping-cart"></i>  Buy</a></div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-pangan">
              <div class="portfolio-wrap">
                <a href="{{asset('/img/anggur.jpg')}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{asset('/img/anggur.jpg')}}" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Branding 1</a></h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p><br>
                  <div class="text-center"><a href="#" class="buy-btn"><i class="fa fa-shopping-cart"></i>  Buy</a></div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->
            <div class="col-xl-4 col-md-6 portfolio-item filter-pangan">
              <div class="portfolio-wrap">
                <a href="{{asset('/img/cerry_vietnam.png')}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{asset('/img/cerry_vietnam.png')}}" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Branding 1</a></h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p><br>
                  <div class="text-center"><a href="#" class="buy-btn"><i class="fa fa-shopping-cart"></i>  Buy</a></div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->
            <div class="col-xl-4 col-md-6 portfolio-item filter-pangan">
              <div class="portfolio-wrap">
                <a href="{{asset('/img/pisang_kipas.jpg')}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{asset('/img/pisang_kipas.jpg')}}" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Branding 1</a></h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p><br>
                  <div class="text-center"><a href="#" class="buy-btn"><i class="fa fa-shopping-cart"></i>  Buy</a></div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-bunga">
              <div class="portfolio-wrap">
                <a href="{{asset('/img/mawar_orange.jpg')}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{asset('/img/mawar_orange.jpg')}}" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Books 1</a></h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p><br>
                  <div class="text-center"><a href="#" class="buy-btn"><i class="fa fa-shopping-cart"></i>  Buy</a></div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-bunga">
              <div class="portfolio-wrap">
                <a href="{{asset('/img/anggrek.png')}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{asset('/img/anggrek.png')}}" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Books 1</a></h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p><br>
                  <div class="text-center"><a href="#" class="buy-btn"><i class="fa fa-shopping-cart"></i>  Buy</a></div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-bunga">
              <div class="portfolio-wrap">
                <a href="{{asset('/img/kamboja_jepang.jpg')}}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{asset('/img/kamboja_jepang.jpg')}}" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Books 1</a></h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p><br>
                  <div class="text-center"><a href="#" class="buy-btn"><i class="fa fa-shopping-cart"></i>  Buy</a></div>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>
    </section><!-- End Portfolio Section -->
    
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-out">

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="{{asset('/img/clients/client-1.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('/img/clients/client-2.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('/img/clients/client-3.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('/img/clients/client-4.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('/img/clients/client-5.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('/img/clients/client-6.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('/img/clients/client-7.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('/img/clients/client-8.png')}}" class="img-fluid" alt=""></div>
          </div>
        </div>

      </div>
    </section><!-- End Clients Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Kontak</h2>
        </div>

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-4">

            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Lokasi:</h4>
                  <p>
                    Jl. Semarang No.5 Sumbersari 
                    Kota Malang Jawa Timur 65145
                  </p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>hibiscus@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Telepon:</h4>
                  <p>+1 5589 55488 55</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h4>Jam buka:</h4>
                  <p>Senin-Jum'at: 10AM - 18PM</p>
                </div>
              </div><!-- End Info Item -->
            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Pesan anda akan dikirim, Terima Kasih!</div>
              </div>
              <div class="text-center"><button type="submit">Kirim Pesan</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  @endsection