<?php

namespace App\Service;

use App\Models\Interfaces\ModelInterface;
use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
    public function getAll(): Collection;

    public function getById($id): ModelInterface|null;

    public function store(array $data): ModelInterface;

    public function update(array $data, ModelInterface $model): ModelInterface;

    public function destroy(ModelInterface $model): bool;
}
