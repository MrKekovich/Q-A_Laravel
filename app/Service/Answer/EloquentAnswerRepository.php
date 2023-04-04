<?php

namespace App\Service\Answer;

use App\Models\Answer;
use App\Service\Answer\Repository\AnswerRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentAnswerRepository implements AnswerRepository
{

    public function getAll(): Collection
    {
        return Answer::orderBy('id')->get();
    }

    public function getById($id): Answer|null
    {
        return Answer::find($id);
    }

    public function store(array $data): Answer
    {
        return Answer::create($data);
    }

    public function update(array $data, Answer $answer): Answer
    {
        return tap($answer)->update($data);
    }

    public function destroy(Answer $answer): bool
    {
        return $answer->delete();
    }
}
