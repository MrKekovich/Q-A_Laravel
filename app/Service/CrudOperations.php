<?php

namespace App\Service;

use App\Models\Interfaces\ModelInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Http\FormRequest;

trait CrudOperations
{
    abstract protected function getEloquent(): RepositoryInterface;

    public function index(): Collection
    {
        return $this->getEloquent()->getAll();
    }

    public function show(ModelInterface $model): ModelInterface
    {
        return $model;
    }

    public function store(FormRequest $request): ModelInterface
    {
        return $this
            ->getEloquent()
            ->store($request->validated());
    }

    public function update(FormRequest $request, ModelInterface $model): string
    {
        return $this
            ->getEloquent()
            ->update($request->validated(), $model);
    }

    public function destroy(ModelInterface $model): bool
    {
        return $this
            ->getEloquent()
            ->destroy($model);
    }
}
