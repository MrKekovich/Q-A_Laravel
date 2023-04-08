<?php

namespace App\Service\Answer;

use App\Models\Answer;
use App\Models\Interfaces\ModelInterface;
use App\Models\Question;
use App\Service\BaseService;

class Service extends BaseService
{
    public function __construct(EloquentAnswerRepository $eloquentAnswerRepository, Answer $answer)
    {
        parent::__construct($eloquentAnswerRepository, $answer);
    }
}
