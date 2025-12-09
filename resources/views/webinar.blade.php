<style>
  .text-limit-1 {
      display: -webkit-box;
      -webkit-line-clamp: 1;
      -webkit-box-orient: vertical;
      overflow: hidden;
  }


  .portfolio-wrap {
      height: 100%;
      display: flex;
      flex-direction: column;
  }

  .portfolio-info {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
  }

  .portfolio-info p {
      margin-bottom: 6px;
  }
  .product-action {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      gap: 10px;
  }

  .qty-input {
      width: 55px;
      padding: 6px;
      border-radius: 8px;
      border: 1px solid #ccc;
      text-align: center;
  }

  .btn-buy-modern {
      background: #008080;
      color: #fff;
      border: none;
      padding: 8px 15px;
      border-radius: 8px;
      font-weight: 600;
      display: flex;
      align-items: center;
  }
</style>

@extends('index')
@section('title','Webinar')
@section('Webinar','active')

@section('content')
    

  <!-- End Hero Section -->

<main id="main">
    <section id="#" class="portfolio sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Daftar Webinar</h2>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

          <div>
            <ul class="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-Nasional">Webinar Nasional</li>
              <li data-filter=".filter-Internasional">Webinar Internasional</li>
              <!-- <li data-filter=".filter-bunga">Bunga</li> -->
            </ul><!-- End Portfolio Filters -->
          </div>

          <div class="row gy-4 portfolio-container">
            @foreach ($webinar as $webinars)
              <div class="col-xl-4 col-md-6 portfolio-item filter-{{$webinars->webinar_type}}">
                <div class="portfolio-wrap">
                  <a href="{{ asset('/img/webinar/'.$webinars->poster_url) }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('/img/webinar/'.$webinars->poster_url) }}" class="img-fluid w-100" style="height: 250px; object-fit: cover; border-radius: 10px;" alt=""></a>
                  <div class="portfolio-info">   
                    <h4 class="text-limit-1 mb-3"><a href="#" title="More Details">{{ $webinars->title }}</a></h4>
                    <p><i class="bi bi-calendar2-week"></i>    {{ $webinars->date }}</p>
                    <p><i class="bi bi-alarm"></i>   {{ $webinars->time_start }} - {{ $webinars->time_end }}</p>  
                    <div class="text-center mt-3">
                      <div class="col-md-12 form-group mt-3 mt-md-0">
                        <button class="btn btn-buy btn-info-outline " style="color: #008080;"><a href="/webinar_next/{{ $webinars->id }}">Klik untuk mengikuti webinar</a></button>
                      </div>
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
</main>

      
@endsection

