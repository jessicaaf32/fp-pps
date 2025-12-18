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
            @if($timeBonus > 0)
                <span class="badge bg-warning text-dark">⚡ {{ $timeBonus }} Speed Bonus!</span>
            @endif
        </p>
    @endif

    @if ($hasNext)
        <a href="{{ route('questions', [$slug, $index + 1]) }}"
           class="btn btn-quiz">
            Next Question
        </a>
    @else
        <a href="{{ route('quiz_score', [$slug]) }}" class="btn btn-success">
            View My Final Score
        </a>
    @endif

</div>
@endsection
