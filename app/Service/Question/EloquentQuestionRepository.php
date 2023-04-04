<?php

namespace App\Service\Question;

use App\Models\Interfaces\ModelInterface;
use App\Models\Question;
use App\Service\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentQuestionRepository implements RepositoryInterface
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

    public function update(array $data, ModelInterface $model): Question
    {
        return tap($model)->update($data);
    }

    public function destroy(ModelInterface $model): bool
    {
        return $model->delete();
    }
}
