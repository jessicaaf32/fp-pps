@extends('index')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-4">Available Quizzes</h2>

    <div class="row g-4">
        @foreach ($quizzes as $quiz)
            <div class="col-md-4">
                <div class="quiz-card h-100">
                    <div class="quiz-image-wrapper">
                        <img src="{{ asset($quiz['image']) }}"
                            alt="{{ $quiz['title'] }}">
                    </div>

                    <div class="quiz-body">
                        <h5 class="fw-bold">{{ $quiz['title'] }}</h5>

                        <p class="text-muted small">
                            {{ $quiz['description'] }}
                        </p>
                        
                        <a href="{{ route('questions', [$quiz['slug'], 1]) }}"
                           class="btn btn-quiz w-100">
                            Start Quiz
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection

<style>
.quiz-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    cursor: pointer;
}

.quiz-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 16px 32px rgba(0,0,0,0.15);
}

.quiz-image-wrapper {
    height: 70px;              /* HARD LIMIT */
    max-height: 70px;
    width: 100%;
    overflow: hidden;          /* CRITICAL */
    display: flex;             /* CENTERING */
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
}

.quiz-image-wrapper img {
    max-height: 45px;          /* IMAGE CLAMP */
    max-width: 100%;
    width: auto !important;
    height: auto !important;
    object-fit: contain;
    display: block;
}

.quiz-body {
    padding: 1rem;
}

.btn-quiz {
    background: linear-gradient(135deg, #0d6efd, #20c997);
    border: none;
    color: #fff;
    font-weight: 600;
    padding: 0.6rem 1rem;
    border-radius: 8px;
    transition: all 0.25s ease;
}

.btn-quiz:hover {
    background: linear-gradient(135deg, #0b5ed7, #198754);
    transform: translateY(-1px);
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
    color: #fff;
}

.btn-quiz:focus {
    box-shadow: 0 0 0 0.25rem rgba(32, 201, 151, 0.35);
}
</style>