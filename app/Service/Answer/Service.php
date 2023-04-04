<?php

namespace App\Service\Answer;

use App\Models\Answer;
use App\Service\BaseService;

class Service extends BaseService
{
    public function __construct(EloquentAnswerRepository $eloquentAnswerRepository, Answer $answer)
    {
        parent::__construct($eloquentAnswerRepository, $answer);
    }
}
