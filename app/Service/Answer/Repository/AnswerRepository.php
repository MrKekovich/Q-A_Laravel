<?php

namespace App\Service\Answer\Repository;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Collection;

interface AnswerRepository
{
    public function getAll(): Collection;

    public function getById($id): Answer|null;

    public function store(array $data): Answer;

    public function update(array $data, Answer $answer): Answer;

    public function destroy(Answer $answer): bool;
}
