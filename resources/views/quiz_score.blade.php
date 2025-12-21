@extends('index')
@section('title','Kuis')
@section('Kuis','active')

@section('content')
<div class="container py-5 text-center" style="max-width: 700px">
    <div class="card shadow-lg border-0 p-5" style="border-radius: 20px;">
        <h1 class="fw-bold mb-2">Quiz Completed!</h1>
        <p class="text-muted mb-4">{{ $quiz['title'] }}</p>

        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="p-4 bg-light rounded-3">
                    <h5 class="text-uppercase small fw-bold text-muted">Final Score</h5>
                    <p class="display-4 fw-bold text-primary mb-0">{{ $results['total_score'] }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 bg-light rounded-3">
                    <h5 class="text-uppercase small fw-bold text-muted">Total Time</h5>
                    <p class="display-4 fw-bold text-secondary mb-0">{{ $results['total_time'] }}s</p>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <h5 class="fw-bold mb-3">Performance Breakdown</h5>
            <div class="list-group">
                @foreach($results['answers'] as $idx => $data)
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 bg-light mb-2 rounded">
                        <span>Question {{ $idx }}</span>
                        <div>
                            @if($data['is_correct'])
                                <span class="badge bg-success me-2">Correct</span>
                                <small class="text-warning fw-bold">+{{ $data['bonus'] }} Bonus</small>
                            @else
                                <span class="badge bg-danger">Incorrect</span>
                            @endif
                            <small class="ms-3 text-muted">{{ $data['time'] }}s</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="d-grid gap-2">
            {{-- We use d-inline-block instead of d-grid if you want it to not stretch full width, 
                or keep the d-grid but use the btn-answer class --}}
            <div class="d-flex justify-content-center mt-3">
                <a href="{{ route('quiz') }}" class="quiz-btn-nav btn-answer text-decoration-none">
                    Take Another Quiz
                </a>
                <a href="{{ route('quiz_highscores', $slug) }}" class="quiz-btn-nav btn-next-step text-decoration-none">
                    View Leaderboard
                </a>
            </div>
            <a href="/beranda" class="btn btn-link text-muted mt-2">Back to Home</a>
        </div>
    </div>
</div>
@endsection

<style>
    /* This class ensures the height and internal spacing match exactly */
    .quiz-btn-nav {
        display: inline-block;
        padding: 10px 30px;    /* Vertical and Horizontal padding */
        font-weight: bold;
        letter-spacing: 1px;
        border-radius: 5px;
        font-size: 1rem;       /* Constant font size */
        line-height: 1.5;      /* Constant line height */
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent; /* Keeps height same as bordered buttons */
    }

    /* The Green Color (Matches your Answer button) */
    .btn-answer {
        background-color: #198754 !important; /* Bootstrap Green */
        color: #ffffff !important;
        border-color: #198754 !important;
    }

    .btn-answer:hover {
        background-color: #157347 !important;
        color: #ffffff !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>