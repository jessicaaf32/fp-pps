@extends('index')
@section('title','Diskusi')
@section('Diskusi','active')

@section('content')

<main id="main">

    {{-- HERO SECTION --}}
    <section class="py-5" style="background-color: #e6f4f1;">
        <div class="container">
            <h2 class="fw-bold mb-3 text-center" style="color:#006666;">Forum Diskusi</h2>
            <p class="mb-4 text-center">Tempat bertanya, berdiskusi, dan memahami materi teknologi bersama komunitas.</p>

            {{-- SEARCH BAR --}}
            <form action="/diskusi" method="GET">
                <div class="input-group mb-3 shadow-sm">
                    <input type="text" name="search" class="form-control form-control-lg" placeholder="Cari pertanyaan...">
                    <button class="btn btn-lg" style="background:#008080; color:white;">Cari</button>
                </div>
            </form>

            <a href="/diskusi/ask" class="btn btn-lg" style="background:#008080; color:white;">+ Tanyakan Pertanyaanmu</a>
        </div>
    </section>

    <section class="py-4">
        <div class="container">

            <div class="d-flex align-items-center mb-3">

                <h5 class="fw-bold me-2 mb-0 mt-0" style="cursor:pointer; color:#008080;">
                    Semua Hasil
                </h5>

                <span class="badge rounded-pill"
                    style="background:#c8f3ec; color:#008080; font-size:15px; padding:8px 14px;">
                    {{ $questions->count() }}
                </span>

            </div>

            <hr>


            <hr>


            <div class="accordion" id="forumAccordion">

                @if($questions->isEmpty())
                    <p class="text-center text-muted">Tidak ada pertanyaan yang cocok.</p>
                @endif

                @foreach ($questions as $q)
                <div class="accordion-item mb-4 border-0">

                    {{-- CARD ATAS (Gaya Brainly) --}}
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-white shadow-sm rounded"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#q-{{ $q->id }}"
                            style="border-radius: 10px;">

                            <div class="text-start">

                                {{-- Header: Avatar + User + Waktu --}}
                                <div class="d-flex align-items-center mb-2">
                                    <img src="{{ asset('/img/team/'.$q->user->ava) }}"
                                        class="rounded-circle me-3"
                                        width="45" height="45">

                                    <div>
                                        <span class="badge"
                                            style="background:#ffc107; color:#000;">
                                            {{ $q->kelas->nama }}
                                        </span>

                                        <div class="small text-muted">
                                            {{ $q->user->username }} · {{ $q->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>

                                {{-- Isi pertanyaan (limit 150) --}}
                                <p class="mb-1 fw-semibold" style="font-size:18px;">
                                    {{ Str::limit($q->questions_detail, 150) }}
                                </p>

                                {{-- Footer kecil --}}
                                <small class="text-muted">
                                    {{ $q->answers->count() }} jawaban • klik untuk lihat detail
                                </small>


                            </div>

                        </button>
                    </h2>
                    {{-- DROPDOWN BAGIAN BAWAH --}}
                    <div id="q-{{ $q->id }}" class="accordion-collapse collapse"
                        data-bs-parent="#forumAccordion">

                        <div class="accordion-body bg-white shadow-sm rounded mt-2">

                            {{-- DAFTAR JAWABAN --}}
                            <h6 class="fw-bold mb-3">Jawaban:</h6>

                            <div class="answers-list" id="answers-{{ $q->id }}">
                                @foreach ($q->answers as $a)
                                    <div class="p-3 mb-3 bg-light rounded">
                                        <div class="d-flex align-items-center mb-2">
                                            <img src="{{ asset('/img/team/'.$a->user->ava) }}"
                                                class="rounded-circle me-2"
                                                width="35" height="35">
                                            <strong>{{ $a->user->username }}</strong>
                                        </div>
                                        {{ $a->answer_detail }} <br>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <small class="text-muted">
                                                {{ $a->created_at->diffForHumans() }}
                                            </small>
                                            <button class="btn btn-sm like-answer"
                                                data-id="{{ $a->id }}"
                                                style="border:none; background:none; color:#ff6b6b;">
                                                ❤️ <span id="a-like-{{ $a->id }}">{{ $a->likes }}</span>
                                            </button>

                                        </div>

                                    </div>


                                @endforeach
                            </div>

                            <hr>

                            {{-- FORM JAWAB --}}
                            <form class="answer-form" data-id="{{ $q->id }}">
                                @csrf
                                <textarea class="form-control mb-2" name="answer_detail"
                                        placeholder="Tulis jawaban kamu..." required></textarea>
                                <button class="btn btn-info" style="background:#008080; color:white;">Kirim Jawaban</button>
                            </form>

                        </div>
                    </div>


                </div>
                @endforeach

            </div>

        </div>
    </section>
</main>

<script>
    document.querySelectorAll('.answer-form').forEach(form => {

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // jangan submit biasa

            let id = this.dataset.id;
            let textarea = this.querySelector('textarea');
            let answer = textarea.value;

            fetch(`/diskusi/jawab/${id}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ answer_detail: answer })
            })
            .then(res => res.json())
            .then(data => {

                // Tambahkan jawaban baru ke list
                let html = `
                    <div class="p-3 mb-3 bg-light rounded">
                        <div class="d-flex align-items-center mb-2">
                            <img src="${data.avatar}" width="35" height="35" class="rounded-circle me-2">
                            <strong>${data.username}</strong>
                        </div>
                        ${data.answer}
                        <br>
                        <small class="text-muted">${data.time}</small>
                    </div>
                `;

                document.querySelector(`#answers-${id}`).innerHTML += html;

                // Kosongkan textarea setelah dikirim
                textarea.value = "";

            })
            .catch(err => console.log(err));
        });

    });

        // Like Question
    document.querySelectorAll('.like-question').forEach(btn => {
        btn.addEventListener('click', function() {
            let id = this.dataset.id;

            fetch(`/diskusi/like-question/${id}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                }
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById(`q-like-${id}`).innerText = data.likes;
            });
        });
    });

    // Like Answer
    document.querySelectorAll('.like-answer').forEach(btn => {
        btn.addEventListener('click', function() {
            let id = this.dataset.id;

            fetch(`/diskusi/like-answer/${id}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                }
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById(`a-like-${id}`).innerText = data.likes;
            });
        });
    });

</script>

@endsection


