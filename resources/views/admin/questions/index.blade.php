@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- create form -->
        <form method="post" action="{{ route('questions.store') }}">
            <div class="mb-3">
                <label for="question" class="form-label">Title:</label>
                <input type="text" class="form-control" name="question" id="question" placeholder="Title" maxlength="255" required>
            </div>
            <div class="mb-3">
                <label for="answer" class="form-label">Question:</label>
                <textarea class="form-control" name="answer" id="answer" rows="3" placeholder="Question"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="p_t">Padding top:</label>
                <select class="form-select" name="p_t" id="p_t">
                    <option value="0">0px</option>
                    <option value="1">1px</option>
                    <option value="2">2px</option>
                    <option value="3">3px</option>
                    <option value="4">4px</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="p_b">Padding bottom:</label>
                <select class="form-select" name="p_b" id="p_b">
                    <option value="0">0px</option>
                    <option value="1">1px</option>
                    <option value="2">2px</option>
                    <option value="3">3px</option>
                    <option value="4">4px</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
        <hr>
        <!-- List of questions -->
        <div>
            @foreach ($questions as $question)
                <div style="padding-bottom: {{ $question->p_b }}px; padding-top: {{ $question->p_t }}px;" class="mb-0">
                    <div class="accordion" id="question-list-{{ $question->id }}">
                        <div class="card">
                            <div class="card-header" id="heading-{{ $question->id }}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#question-details-{{ $question->id }}"
                                            aria-expanded="false" aria-controls="question-details-{{ $question->id }}"
                                            onclick="toggleQuestion({{ $question->id }})">
                                        <i class="fa fa-angle-down"></i>
                                        {{ $question->question }}
                                    </button>
                                </h5>
                                <div class="btn-group float-right">
                                    <a href="{{ route('questions.edit', $question->id) }}" type="button" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary" onclick="deleteQuestion({{ $question->question }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div id="question-details-{{ $question->id }}" class="collapse"
                                 aria-labelledby="heading-{{ $question->id }}"
                                 data-parent="#question-list-{{ $question->id }}">
                                <div class="card-body">
                                    <p>{{ $question->answer }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function toggleQuestion(id) {
            $(`#question-list-${id} .collapse`).collapse('toggle');
            $(`#question-list-${id} .btn i`).toggleClass('fa-angle-down fa-angle-up');
        }
        function deleteQuestion(question) {
            confirm(`Are you sure you want to delete this question ${question}?`)
        }
    </script>
@endsection

