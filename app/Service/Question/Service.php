<?php

namespace App\Service\Question;

use App\Models\Interfaces\ModelInterface;
use App\Models\Question;
use App\Service\BaseService;

class Service extends BaseService
{
    public function __construct(EloquentQuestionRepository $eloquentQuestionRepository, Question $question)
    {
        parent::__construct($eloquentQuestionRepository, $question);
    }

    public function show(ModelInterface $model): string
    {
        return json_encode([
            'question' => $model,
            'answers' => $model->answers,
        ]);
    }
}
