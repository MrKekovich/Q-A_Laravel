@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('questions.update', $question->id) }}">
            @method('PATCH')
            <div class="mb-3">
                <label for="question" class="form-label">Question:</label>
                <input type="text" class="form-control" name="question" id="question" placeholder="Title"
                       maxlength="255" required value="{{ $question->question }}">
            </div>
            <div class="mb-3">
                <label for="answer" class="form-label">Answer:</label>
                <textarea class="form-control" name="answer" id="answer" rows="3" placeholder="Question">{{ $question->answer }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="p_t">Padding top:</label>
                <select class="form-select" name="p_t" id="p_t">
                    <option value="0" {{ $question->p_t === 0 ? 'selected' : '' }}>0px</option>
                    <option value="1" {{ $question->p_t === 1 ? 'selected' : '' }}>1px</option>
                    <option value="2" {{ $question->p_t === 2 ? 'selected' : '' }}>2px</option>
                    <option value="3" {{ $question->p_t === 3 ? 'selected' : '' }}>3px</option>
                    <option value="4" {{ $question->p_t === 4 ? 'selected' : '' }}>4px</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="p_b">Padding bottom:</label>
                <select class="form-select" name="p_b" id="p_b">
                    <option value="0" {{ $question->p_b === 0 ? 'selected' : '' }}>0px</option>
                    <option value="1" {{ $question->p_b === 1 ? 'selected' : '' }}>1px</option>
                    <option value="2" {{ $question->p_b === 2 ? 'selected' : '' }}>2px</option>
                    <option value="3" {{ $question->p_b === 3 ? 'selected' : '' }}>3px</option>
                    <option value="4" {{ $question->p_b === 4 ? 'selected' : '' }}>4px</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
@endsection
