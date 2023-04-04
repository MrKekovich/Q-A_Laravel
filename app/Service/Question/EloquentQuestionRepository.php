<?php

namespace App\Service\Question;

use App\Models\Question;
use App\Service\Question\Repository\QuestionRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentQuestionRepository implements QuestionRepository
{
    public function getAll(): Collection
    {
        return Question::orderBy('id')->get();
    }

    public function getById($id): Question|null
    {
        return Question::find($id);
    }

    public function store(array $data): Question
    {
        return Question::create($data);
    }

    public function update(array $data, Question $question): Question
    {
        return tap($question)->update($data);
    }

    public function destroy(Question $question): bool
    {
        return $question->delete();
    }
}
