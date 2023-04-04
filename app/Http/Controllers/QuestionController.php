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
        return $this->service->index();
    }

    public function store(StoreRequest $request)
    {
        return $this->service->store($request);
    }

    public function show(Question $question)
    {
        return $this->service->show($question);
    }

    public function update(UpdateRequest $request, Question $question)
    {
        return $this->service->update($request, $question);
    }

    public function destroy(Question $question)
    {
        return $this->service->destroy($question);
    }
}
