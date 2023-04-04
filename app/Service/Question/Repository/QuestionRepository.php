<?php

namespace App\Service\Question\Repository;

use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;

interface QuestionRepository
{
    public function getAll(): Collection;

    public function getById($id): Question|null;

    public function store(array $data): Question;

    public function update(array $data, Question $question): Question;

    public function destroy(Question $question): bool;
}
