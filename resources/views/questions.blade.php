@extends('index')

@section('content')
<div class="container py-5" style="max-width: 700px">
    <div class="mb-3 text-muted">
        Question {{ $index }} of {{ $total }}
    </div>

    <h4 class="fw-bold mb-4">
        {{ $question['question'] }}
    </h4>

    <form method="POST" action="{{ route('questions', [$slug, $index]) }}">
        @csrf

        @foreach ($question['options'] as $key => $option)
            <div class="form-check mb-2">
                <input
                    class="form-check-input"
                    type="{{ $question['type'] === 'multiple' ? 'checkbox' : 'radio' }}"
                    name="answer[]"
                    value="{{ $key }}"
                    id="opt{{ $key }}"
                >
                <label class="form-check-label" for="opt{{ $key }}">
                    {{ $option }}
                </label>
            </div>
        @endforeach
        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-success px-4 py-2 fw-bold shadow-sm">
                Answer
            </button>
        </div>     
    </form>
</div>
@endsection
