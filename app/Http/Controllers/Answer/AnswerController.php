<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\BaseController;
use App\Service\Answer\Service;

class AnswerController extends BaseController
{
    public function __construct(Service $service)
    {
        parent::__construct($service);
    }

    public function index()
    {
        return $this->service->index();
    }
}
