<?php

namespace App\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseService
{
    protected $eloquent;

    protected Model $model;

    public function __construct($eloquent, Model $model)
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

    public function show($model)
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

    public function update(FormRequest $request, Model $model): string
    {
        return $this
            ->eloquent
            ->update($request->validated(), $model)
            ->toJson();
    }

    public function destroy(Model $model): bool
    {
        return $this
            ->eloquent
            ->destroy($model);
    }
}
