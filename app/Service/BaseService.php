<?php

namespace App\Service;

use App\Models\Interfaces\ModelInterface;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseService
{
    protected RepositoryInterface $eloquent;

    protected ModelInterface $model;

    public function __construct(RepositoryInterface $eloquent, ModelInterface $model)
    {
        $this->eloquent = $eloquent;
        $this->model = $model;
    }

    public function index(): string
    {
        return $this
            ->eloquent
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
            ->eloquent
            ->store($request->validated())
            ->toJson();
    }

    public function update(FormRequest $request, ModelInterface $model): string
    {
        return $this
            ->eloquent
            ->update($request->validated(), $model)
            ->toJson();
    }

    public function destroy(ModelInterface $model): bool
    {
        return $this
            ->eloquent
            ->destroy($model);
    }
}
