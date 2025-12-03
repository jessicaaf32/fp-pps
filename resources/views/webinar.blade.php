@extends('index')
@section('title','Webinar')
@section('Webinar','active')

@section('content')
    

  <!-- End Hero Section -->

<main id="main">
  <section id="faq" class="faq">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Daftar Webinar</h2>
      </div>
      <div class="row gy-4">
        @foreach ($webinar as $seminar)
        <div class="col-lg-4 col-md-6 col-sm-12">

          <div class="accordion accordion-flush" id="faqlist-{{$seminar->id}}" data-aos="fade-up" data-aos-delay="100">

            <div class="accordion-item">
              <a href="{{ asset('/img/seminar/'.$seminar->gambar) }}" 
                  data-gallery="portfolio-gallery-app" 
                  class="glightbox">
                  <img src="{{ asset('/img/seminar/'.$seminar->gambar) }}" 
                      class="img-fluid" alt="">
              </a>

              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#faq-content-{{$seminar->id}}">
                  {{$class->nama}}
                </button>
              </h3>

              <div id="faq-content-{{$seminar->id}}" class="accordion-collapse collapse" 
                    data-bs-parent="#faqlist-{{$class->id}}">
                <div class="accordion-body">
                  {{$seminar->keterangan}}
                </div>
              </div>
              <div class="text-center">
                <div class="col-md-12 form-group mt-3 mt-md-0">
                  <button class="btn btn-buy btn-info-outline" style="color: #008080;"><a href="/materi/{{ $seminar->id }}">Masuk ke materi</a></button>
                </div>
              </div>
            </div>

          </div>

        </div>
        @endforeach

      </div>

    </div>
  </section>
</main>

      
@endsection

