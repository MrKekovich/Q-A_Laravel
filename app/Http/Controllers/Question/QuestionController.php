<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Service\Question\Service;

class QuestionController extends BaseController
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
