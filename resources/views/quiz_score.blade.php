@extends('index')

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
            <a href="{{ route('quiz') }}" class="btn btn-quiz py-3">Take Another Quiz</a>
            <a href="/beranda" class="btn btn-link text-muted">Back to Home</a>
        </div>
    </div>
</div>
@endsection