@extends('layouts.app')

@section('content')
    <div class="container">
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
            $('#question-list-' + id + ' .collapse').collapse('toggle');
            $('#question-list-' + id + ' .btn i').toggleClass('fa-angle-down fa-angle-up');
        }
    </script>
@endsection

