@extends('index')
@section('title','Webinar')
@section('Webinar','active')

@section('content')

{{-- ======================= HERO BRAINLY STYLE ======================= --}}
<section class="py-5">
    <div class="container" data-aos="fade-up">

        <h1 class="fw-bold mb-3" style="font-size:32px;">
            Daftar Webinar Terkini
        </h1>

        <p class="text-dark mb-4" style="font-size:18px;">
            Temukan berbagai webinar nasional dan internasional yang dapat kamu ikuti secara gratis. 
            Pilih kategori atau cari webinar yang kamu inginkan.
        </p>

        <!-- Search bar seperti Brainly (optional) -->
        <form action="" method="GET" class="d-flex bg-white rounded-pill shadow-sm p-2"
              style="max-width:420px;">
            <input type="text" name="search" class="form-control border-0"
                   placeholder="Cari webinar…">
            <button class="btn btn-dark rounded-circle">
                <i class="bi bi-search"></i>
            </button>
        </form>

    </div>
</section>
{{-- ======================= END HERO SECTION ======================= --}}
<div class="row gy-4">
@foreach ($webinar as $w)
    <div class="col-12">

        <!-- CARD ala Brainly -->
        <div class="p-3 rounded shadow-sm bg-white">

            <!-- Header baris 1 -->
            <div class="d-flex justify-content-between align-items-start">

                <!-- Avatar -->
                <div class="d-flex align-items-center gap-2">
                    <img src="https://ui-avatars.com/api/?name=W&background=008080&color=fff"
                         class="rounded-circle" width="40" height="40">
                    <div>
                        <span class="fw-bold" style="color:#008080;">
                            {{ $w->title }}
                        </span>
                        <div class="text-muted small">
                            {{ $w->date }} • {{ $w->time_start }} - {{ $w->time_end }}
                        </div>
                    </div>
                </div>

                <!-- Badge Kategori -->
                <span class="badge px-3 py-2"
                      style="background:#ffe082; color:#6a4f00; font-size:13px;">
                    {{ $w->webinar_type }}
                </span>

            </div>

            <!-- Poster thumbnail -->
            <div class="mt-3">
                <img src="{{ asset('/img/webinar/'.$w->poster_url) }}"
                     class="img-fluid rounded"
                     style="width:100%; height:200px; object-fit:cover;">
            </div>

            <!-- Deskripsi -->
            <p class="mt-3 mb-2 text-dark">
                {{ Str::limit($w->description, 120) }}
            </p>

            <!-- Button -->
            <div class="text-end">
                <a href="/webinar_next/{{ $w->id }}"
                   class="btn border-dark rounded-pill px-4 py-2"
                   style="font-weight:600;">
                   Ikuti Webinar
                </a>
            </div>

        </div>

    </div>
@endforeach
</div>


<main id="main">
    <section class="sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Forum Diskusi Materi</h2>
                <p>Ajukan pertanyaanmu dan bantu menjawab pertanyaan dari pengguna lain.</p>
            </div>

            <!-- Tombol tambah pertanyaan -->
            <div class="text-end mb-4">
                <a href="/forum/create" class="btn btn-primary">Buat Pertanyaan</a>
            </div>

            <!-- List Pertanyaan -->
            <div class="row gy-4">
                @foreach ($webinar as $q)
                <div class="col-12">
                    <div class="p-4 bg-white shadow rounded-3">
                        <h4>
                            <a href="/forum/{{ $q->id }}">
                                {{$q->title}}
                            </a>
                        </h4>

                        <p class="text-muted mb-1">
                            <i class="bi bi-person"></i> {{$q->title}}
                            ·
                            <i class="bi bi-clock"></i> {{$q->date}}
                        </p>

                        <span class="badge bg-info text-dark">{{$q->webinar_type}}</span>
                        <span class="badge bg-secondary">{{ $q->subtitle }} Jawaban</span>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
</main>


@endsection
