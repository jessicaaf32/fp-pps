@extends('index')
@section('title', 'Tanyakan Pertanyaan')
@section('Diskusi', 'active')

@section('content')
<main id="main">

<section class="py-5" style="background:#e6f4f1;">
    <div class="container">
        <h2 class="fw-bold text-center mb-3">Tanyakan Pertanyaanmu</h2>
        <p class="text-center mb-4">Buat pertanyaan baru agar teman-teman bisa membantu menjawab.</p>

        <div class="bg-white shadow p-4 rounded" style="max-width:700px; margin:auto;">

            <form action="/diskusi/ask" method="POST">
                @csrf

                {{-- PILIH KELAS / KATEGORI --}}
                <div class="mb-3">
                    <label class="fw-semibold">Pilih Kelas</label>
                    <select name="kelas_id" class="form-control" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- ISI PERTANYAAN --}}
                <div class="mb-3">
                    <label class="fw-semibold">Detail Pertanyaan</label>
                    <textarea name="questions_detail" class="form-control"
                        rows="5" placeholder="Tulis pertanyaanmu..." required></textarea>
                </div>

                <button class="btn btn-lg" style="background:#008080; color:white;">
                    Kirim Pertanyaan
                </button>
            </form>

        </div>
    </div>
</section>

</main>
@endsection
