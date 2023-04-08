<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\StoreRequest;
use App\Http\Requests\Question\UpdateRequest;
use App\Models\Question;
use App\Service\Question\Service;

class QuestionController extends BaseController
{
    public function __construct(Service $service)
    {
        parent::__construct($service);
    }

    public function index()
    {
        $questions = $this->service->index();
        return view('questions.index', compact('questions'));
    }
}
