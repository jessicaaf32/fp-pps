@extends('index')
@section('title','Materi')
@section('Materi','active')

@section('content')
    

  <!-- End Hero Section -->

<main id="main">
  <section id="faq" class="faq">
    
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Materi Kelas</h2>
      </div>
      <div class="row gy-4">
        @foreach ($kelas as $class)
        <div class="col-lg-4 col-md-6 col-sm-12">

          <div class="accordion accordion-flush" id="faqlist-{{$class->id}}" data-aos="fade-up" data-aos-delay="100">

            <div class="accordion-item">
              <a href="{{ asset('/img/kelas/'.$class->gambar) }}" 
                  data-gallery="portfolio-gallery-app" 
                  class="glightbox">
                  <img src="{{ asset('/img/kelas/'.$class->gambar) }}" 
                      class="img-fluid" alt="">
              </a>

              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#faq-content-{{$class->id}}">
                  {{$class->nama}}
                </button>
              </h3>

              <div id="faq-content-{{$class->id}}" class="accordion-collapse collapse" 
                    data-bs-parent="#faqlist-{{$class->id}}">
                <div class="accordion-body">
                  {{$class->keterangan}}
                </div>
              </div>
              <div class="text-center">
                <div class="col-md-12 form-group mt-3 mt-md-0">
                  <button class="btn btn-buy btn-info-outline" style="color: #008080;">  Masuk ke materi</a></button>
                </div>
              </div>
            </div>

          </div>

        </div>
        @endforeach

      </div>

    </div>
  </section>
  
  <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Materi Kelas</h2>
          <p>GROWID  sebuah website pembelajaran teknologi yang menjadi wadah bagi mahasiswa untuk belajar, berdiskusi, dan mengembangkan keterampilan digital secara mandiri. Pada pengembangan website ini, keberadaan fitur-fitur yang lengkap, mudah digunakan, dan dapat diakses secara gratis oleh seluruh pengguna menjadi hal yang sangat penting untuk menunjang proses belajar mengajar secara digital.</p>
        </div>
        @foreach ($materi as $subject)
        <div class="row gy-4">
          <div class="col-lg-6">
            <h3>{{$subject->judul_materi}}</h3>
            <p>{{$subject->keterangan}}</p>
            <!-- <p>Aplikasi ini menyediakan beragam sumber belajar seperti modul, video, forum, dan proyek praktik yang dapat diakses secara gratis. Dengan fitur yang sederhana namun lengkap, platform ini bertujuan mendukung proses pembelajaran digital agar lebih mudah, fleksibel, dan terarah bagi seluruh mahasiswa.</p> -->
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
              <!-- <ul>
                <li><i class="bi bi-check-circle-fill"></i> Sekilas Tentang Website.</li>
                <li><i class="bi bi-check-circle-fill"></i> Materi Pembelajaran.</li>
                <li><i class="bi bi-check-circle-fill"></i> Kuis Pembelajaran.</li>
                <li><i class="bi bi-check-circle-fill"></i> Diskusi Komunitas.</li>
                <li><i class="bi bi-check-circle-fill"></i> Webinar.</li>
                <li><i class="bi bi-check-circle-fill"></i> Produk Penunjang Pembelajaran.</li>
              </ul> -->
              @php
                $url = $subject->link;
                // Default ID kosong
                $videoId = null;
                // 1. Format youtu.be/xxxxxxxx
                if (preg_match('/youtu\.be\/([^\?]+)/', $url, $m)) {
                    $videoId = $m[1];
                }
                // 2. Format youtube.com/watch?v=xxxxxxxx
                elseif (preg_match('/v=([^\&]+)/', $url, $m)) {
                    $videoId = $m[1];
                }
                // 3. Format youtube.com/shorts/xxxxxxxx
                elseif (preg_match('/shorts\/([^\?]+)/', $url, $m)) {
                    $videoId = $m[1];
                }
                // Thumbnail otomatis
                $thumbnail = "https://img.youtube.com/vi/$videoId/maxresdefault.jpg";
                // Link embed untuk glightbox
                $embed = "https://www.youtube.com/embed/$videoId";
              @endphp
              <div class="position-relative mt-4">
                  <!-- Thumbnail YouTube otomatis -->
                  <img src="{{ $thumbnail }}" class="img-fluid rounded-4" alt="">
                  <!-- Play button dengan embed YouTube -->
                  <a href="{{ $embed }}" class="glightbox play-btn"></a>
              </div>

            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section><!-- End About Us Section -->
</main>

      
@endsection

