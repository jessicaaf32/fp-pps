@extends('index')
@section('title','Materi')
@section('Materi','active')

@section('content')
    

  <!-- End Hero Section -->

<main id="main">
  
  <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Materi Kelas <br>  {{ $kelas->nama }}</h2>
        </div>
        @foreach ($materi as $subject)
        <div class="row gy-4 shadow p-3 mb-5 bg-body-tertiary rounded">
          <div class="col-lg-6">
            <p>Materi {{ $loop->iteration }}</p>
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

