<?php

namespace App\Service;

use App\Models\Interfaces\ModelInterface;
use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
    public function getAll(): Collection;

    public function getById($id): ModelInterface|null;

    public function store(array $data): ModelInterface;

    public function update(array $data, ModelInterface $question): ModelInterface;

    public function destroy(ModelInterface $question): bool;
}
