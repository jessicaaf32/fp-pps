@extends('index')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">🏆 {{ strtoupper($slug) }} Leaderboard</h2>

    <div class="card shadow-sm border-0 mb-5 p-4" style="border-radius: 15px; border-left: 5px solid #198754 !important;">
        <h5 class="text-muted small fw-bold text-uppercase">Your Personal Best</h5>
        @if($personalBest)
            <div class="d-flex gap-5 mt-2">
                <div>
                    <span class="text-muted d-block small">Score</span>
                    <h3 class="fw-bold text-success mb-0">{{ $personalBest->score }}</h3>
                </div>
                <div>
                    <span class="text-muted d-block small">Time</span>
                    <h3 class="fw-bold text-dark mb-0">{{ $personalBest->time_spent }}s</h3>
                </div>
            </div>
        @else
            <p class="text-muted mb-0 mt-2">No attempts yet!</p>
        @endif
    </div>

    <div class="card shadow-sm border-0 overflow-hidden" style="border-radius: 15px;">
        <div class="card-header bg-dark text-white py-3">
            <h5 class="mb-0 fw-bold">Global Top 10</h5>
        </div>
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4">Rank</th>
                    <th>Player</th>
                    <th>Score</th>
                    <th>Time</th>
                    <th class="pe-4 text-end">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($globalScores as $index => $score)
                <tr>
                    <td class="ps-4 fw-bold">#{{ $index + 1 }}</td>
                    <td>
                        {{ $score->user_name }}
                        @if($index === 0) 🥇 @elseif($index === 1) 🥈 @elseif($index === 2) 🥉 @endif
                    </td>
                    <td><span class="badge bg-primary px-3">{{ $score->score }}</span></td>
                    <td>{{ $score->time_spent }}s</td>
                    <td class="pe-4 text-end text-muted small">
                        {{ \Carbon\Carbon::parse($score->created_at)->diffForHumans() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-start gap-3 mt-5">
        <a href="{{ route('questions', [$slug, 1]) }}" class="quiz-btn-nav btn-answer">
            Try to Beat It
        </a>
        <a href="{{ route('quiz') }}" class="quiz-btn-nav btn-next-step">
            Other Quizzes
        </a>
    </div>
</div>
@endsection

<style>
    /* Global Quiz Button Styles */
    .quiz-btn-nav {
        display: inline-block;
        padding: 10px 30px;
        font-weight: bold;
        letter-spacing: 1px;
        border-radius: 5px;
        text-decoration: none !important;
        transition: all 0.3s ease;
        line-height: 1.5;
        font-size: 1rem;
        border: 2px solid transparent;
    }

    /* Green Button */
    .btn-answer {
        background-color: #198754 !important;
        color: white !important;
        border-color: #198754 !important;
    }

    /* White button with Black Border */
    .btn-next-step {
        background-color: #ffffff !important;
        color: #000000 !important;
        border: 2px solid #000000 !important;
    }

    .btn-next-step:hover {
        background-color: #000000 !important;
        color: #ffffff !important;
    }
</style>