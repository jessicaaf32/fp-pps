@extends('index')

@section('content')
<div class="container py-5" style="max-width: 700px">

    <h4 class="fw-bold mb-3">
        {{ $question['question'] }}
    </h4>

    @if ($isCorrect)
        <div class="alert alert-success">
            ✅ Correct!
        </div>
    @else
        <div class="alert alert-danger">
            ❌ Incorrect
        </div>
    @endif

    <div class="mb-3">
        <strong>Correct Answer:</strong>
        <ul>
            @foreach ($question['correct'] as $key)
                <li>{{ $question['options'][$key] }}</li>
            @endforeach
        </ul>
    </div>

    @if ($timeSpent !== null)
        <p class="text-muted">
            ⏱️ Time spent: {{ $timeSpent }} seconds
            @if(isset($timeBonus) && $timeBonus > 0)
                <span class="badge bg-warning text-dark">⚡ {{ $timeBonus }} Speed Bonus!</span>
            @endif
        </p>
    @endif

    {{-- Container to push buttons to the bottom right --}}
    <div class="d-flex justify-content-end mt-5">
        @if ($hasNext)
            <a href="{{ route('questions', [$slug, $index + 1]) }}" class="quiz-btn-nav btn-next-step">
                Next Question
            </a>
        @else
            <a href="{{ route('quiz_score', [$slug]) }}" class="quiz-btn-nav btn-next-step">
                View My Final Score
            </a>
        @endif
    </div>
</div>
@endsection

<style>
    .btn-quiz-next {
        /* Permanent Border */
        border: 2px solid #000000 !important; 
        background-color: #ffffff !important;
        color: #000000 !important;
        
        /* Spacing & Typography */
        padding: 10px 30px;
        font-weight: bold;
        letter-spacing: 1px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        
        /* Smooth transition for hover effect */
        transition: all 0.3s ease;
    }

    .btn-quiz-next:hover {
        /* Inverting colors on hover while keeping the black border */
        background-color: #000000 !important;
        color: #ffffff !important;
        border-color: #000000 !important;
    }
    /* Base class to ensure both buttons have the exact same height and feel */
    .quiz-btn-nav {
        display: inline-block;
        padding: 10px 30px; /* Same vertical and horizontal padding */
        font-weight: bold;
        letter-spacing: 1px;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1rem;      /* Ensure font size is identical */
        line-height: 1.5;     /* Standardize line height */
    }

    /* Green Answer Button Style (questions.blade.php) */
    .btn-answer {
        background-color: #198754;
        color: #ffffff;
        border: 2px solid #198754;
    }

    /* White/Black Next Button Style (quiz_answer.blade.php) */
    .btn-next-step {
        background-color: #ffffff;
        color: #000000;
        border: 2px solid #000000;
    }
    
    .btn-next-step:hover {
        background-color: #000000;
        color: #ffffff;
    }
</style>