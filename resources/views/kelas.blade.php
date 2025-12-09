<style>
  .btn-buy:hover {
      opacity: 0.85;
      transform: translateY(-2px);
      transition: 0.2s;
  }
</style>


@extends('index')
@section('title','Kelas')
@section('Kelas','active')

@section('content')
    

  <!-- End Hero Section -->

<main id="main">
  <section id="faq" class="faq">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Daftar Kelas</h2>
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
                      class="img-fluid w-100"
     style="height: 250px; object-fit: cover; border-radius: 10px;" alt="">
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
                <div class="accordion-body" style="padding-left: 20px;">
                  {{$class->keterangan}}
                </div>
              </div>
              <div class="text-center" style="margin-top: 0px; padding-top: 0px;">
                <div class="col-md-12 form-group mt-md-0">
                  <a href="/materi/{{ $class->id }}" 
                    class="btn btn-buy"
                    style="
                        color:#008080;
                        background:transparent;
                        width:100%;
                        display:block;
                        border-radius:6px;
                        padding-bottom: 30px;
                    ">
                    Masuk ke materi
                  </a>

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

