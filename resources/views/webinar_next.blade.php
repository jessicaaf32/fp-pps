@extends('index')
@section('title','Webinar')
@section('Webinar','active')

@section('content')
    

<main id="main"> 
  <section id="#" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Webinar {{ $webinar->webinar_type }}<br>  {{ $webinar->title }}</h2>
        </div>
        @foreach ($webinar2 as $webinars)
        <div class="row gy-4 shadow p-3 pb-5 bg-body-tertiary rounded">
          <div class="col-lg-8">
            <h3 class="mb-0">{{$webinars->title}}</h3>
            <h5 class="font-weight-bold mt-0 pt-0 mb-3">{{$webinars->subtitle}}</h5>
            <p class="mb-0"><i class="bi bi-calendar2-week"></i>    {{ $webinars->date }}</p>
            <p class="mb-0"><i class="bi bi-alarm"></i>   {{ $webinars->time_start }} - {{ $webinars->time_end }}</p>  
            <p class="mb-0"><i class="bi bi-tag"></i>   Free</p>  
            <p class="mb-3"><i class="bi bi-link-45deg"></i>    <a href="{{ $webinars->link }}" class="">{{ $webinars->link }}</a></p>  
            <p>{{$webinars->description}}</p>
            <!-- <p>Aplikasi ini menyediakan beragam sumber belajar seperti modul, video, forum, dan proyek praktik yang dapat diakses secara gratis. Dengan fitur yang sederhana namun lengkap, platform ini bertujuan mendukung proses pembelajaran digital agar lebih mudah, fleksibel, dan terarah bagi seluruh mahasiswa.</p> -->
          </div>
          <div class="col-lg-4">
            <div class="content ps-0 ps-lg-5">
              <div class="position-relative">
                  <!-- Thumbnail YouTube otomatis -->
                  <img src="{{ asset('/img/webinar/'.$webinars->poster_url) }}"  class="img-fluid rounded shadow" alt="">
                  <!-- Play button dengan embed YouTube -->
                  <a href="{{ $webinars->link }}" class=""></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
  </section><!-- End About Us Section -->
</main>

      
@endsection

