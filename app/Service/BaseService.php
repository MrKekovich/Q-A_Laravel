<?php

namespace App\Service;

use App\Models\Interfaces\ModelInterface;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseService
{
    use CrudOperations;

    protected RepositoryInterface $eloquent;

    protected ModelInterface $model;

    public function __construct(RepositoryInterface $eloquent, ModelInterface $model)
    {
        $this->eloquent = $eloquent;
        $this->model = $model;
    }

    protected function getEloquent(): RepositoryInterface
    {
        return $this->eloquent;
    }
}
