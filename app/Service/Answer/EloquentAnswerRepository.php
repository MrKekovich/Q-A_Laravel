<?php

namespace App\Service\Answer;

use App\Models\Answer;
use App\Models\Interfaces\ModelInterface;
use App\Service\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentAnswerRepository implements RepositoryInterface
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

    public function update(array $data, ModelInterface $model): Answer
    {
        return tap($model)->update($data);
    }

    public function destroy(ModelInterface $model): bool
    {
        return $model->delete();
    }
}
