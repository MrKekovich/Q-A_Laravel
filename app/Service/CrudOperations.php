<?php

namespace App\Service;

use App\Models\Interfaces\ModelInterface;
use Illuminate\Foundation\Http\FormRequest;

trait CrudOperations
{
    abstract protected function getEloquent(): RepositoryInterface;

    public function index(): string
    {
        return $this
            ->getEloquent()
            ->getAll()
            ->toJson();
    }

    public function show(ModelInterface $model): string
    {
        return $model->toJson();
    }

    public function store(FormRequest $request): string
    {
        return $this
            ->getEloquent()
            ->store($request->validated())
            ->toJson();
    }

    public function update(FormRequest $request, ModelInterface $model): string
    {
        return $this
            ->getEloquent()
            ->update($request->validated(), $model)
            ->toJson();
    }

    public function destroy(ModelInterface $model): bool
    {
        return $this
            ->getEloquent()
            ->destroy($model);
    }
}
