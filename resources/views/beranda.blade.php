@extends('index')
@section('title','Beranda')
@section('Beranda','active')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Welcome to GROWID<span style="color:#ff6b00;">.</span></h2>
          <p>GROWID adalah sebuah website pembelajaran teknologi yang menyediakan fitur lengkap, mudah digunakan, dan gratis sebagai wadah bagi mahasiswa untuk belajar, berdiskusi, dan mengembangkan keterampilan digital secara mandiri.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started">Get Started</a>
            <a href="https://youtu.be/qIBlIH7pI9c?si=rPcK9yGCHBPc3a2q" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
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
              <h4 class="title"><a href="" class="stretched-link">Mudah Dipahami</a></h4>
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
              <h4 class="title"><a href="" class="stretched-link">Gratis</a></h4>
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
          <p>GROWID  sebuah website pembelajaran teknologi yang menjadi wadah bagi mahasiswa untuk belajar, berdiskusi, dan mengembangkan keterampilan digital secara mandiri. Pada pengembangan website ini, keberadaan fitur-fitur yang lengkap, mudah digunakan, dan dapat diakses secara gratis oleh seluruh pengguna menjadi hal yang sangat penting untuk menunjang proses belajar mengajar secara digital.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-6">
            <h3>Sekilas tentang website</h3>
            <p>Website pembelajaran teknologi ini merupakan platform digital yang dirancang sebagai ruang belajar interaktif bagi mahasiswa. Melalui berbagai materi, fitur diskusi, dan latihan mandiri, pengguna dapat mengembangkan pemahaman serta keterampilan di bidang teknologi secara efektif.</p>
            <p>Aplikasi ini menyediakan beragam sumber belajar seperti modul, video, forum, dan proyek praktik yang dapat diakses secara gratis. Dengan fitur yang sederhana namun lengkap, platform ini bertujuan mendukung proses pembelajaran digital agar lebih mudah, fleksibel, dan terarah bagi seluruh mahasiswa.</p>
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> Materi Pembelajaran.</li>
                <li><i class="bi bi-check-circle-fill"></i> Kuis Pembelajaran.</li>
                <li><i class="bi bi-check-circle-fill"></i> Diskusi Komunitas.</li>
                <li><i class="bi bi-check-circle-fill"></i> Webinar.</li>
                <li><i class="bi bi-check-circle-fill"></i> Produk Penunjang Pembelajaran.</li>
              </ul>
              <div class="position-relative mt-4">
                <img src="{{asset('/img/materi1.jpg')}}" class="img-fluid rounded-4" alt="">
                <a href="https://youtu.be/qIBlIH7pI9c?si=rPcK9yGCHBPc3a2q" class="glightbox play-btn"></a>
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
              <h3>Seputar<br><strong>GROWID<span style="color:#ff6b00;">.</span></strong></h3>
            </div>
          </div>

          <div class="col-lg-8">
          @foreach ($questions as $question)
            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{$question->id}}">
                    <span class="num">{{$loop->iteration}}</span>
                    {{$question->questions}}
                  </button>
                </h3>
                <div id="faq-content-{{$question->id}}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    {{$question->answer}}
                  </div>
                </div>
              </div><!-- # Faq item-->
            @endforeach

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Produk Penunjang Pembelajaran</h2>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

          <div>
            <ul class="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-Pemrograman">Buku Pemrograman</li>
              <li data-filter=".filter-Security">Buku Security</li>
              <li data-filter=".filter-Praktikum">Penunjang Praktikum</li>
              <!-- <li data-filter=".filter-bunga">Bunga</li> -->
            </ul><!-- End Portfolio Filters -->
          </div>

          <div class="row gy-4 portfolio-container">
            @foreach ($product as $products)
              <div class="col-xl-4 col-md-6 portfolio-item filter-{{$products->category}}">
                <div class="portfolio-wrap">
                  <a href="{{ asset('/img/product/'.$products->gambar) }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('/img/product/'.$products->gambar) }}" class="img-fluid w-100"
     style="height: 250px; object-fit: cover; border-radius: 10px;" alt=""></a>
                  <div class="portfolio-info">              
                    <h4><a href="portfolio-details.html" title="More Details">{{ $products->product }}</a></h4>
                    <p>{{ $products->ket1 }}</p>
                    <p>{{ $products->height }}</p>
                    <p>{{ $products->ket3 }}</p><br>
                    <div class="text-center">
                      <form class="row" method="post" action="/add_to_cart">
					              @csrf
                        <div class="col-md-6 form-group">
                          <input type="hidden" class="form-control" name="id" value="{{ $products->id }}">
                          <input type="number" class="form-control"  name="quantity" value="1" id="" style="width:50px;">
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                          <button class="btn btn-buy" style="color: #008080;"><i class="fa fa-shopping-cart"></i>  Rp. {{ number_format($products->price /1000,3) }}</a></button>
                        </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
           
          @endforeach

          </div>
          <!-- End Portfolio Container -->

        </div>

      </div>
    </section><!-- End Portfolio Section -->
    

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
                    <!-- Jl. Semarang No.5 Sumbersari  -->
                    Kota Surabaya Jawa Timur 65145
                  </p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>GROWID@gmail.com</p>
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
            <form action="#" method="get" role="form" class="php-email-form">
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