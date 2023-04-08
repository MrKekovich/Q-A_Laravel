<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\StoreRequest;
use App\Http\Requests\Question\UpdateRequest;
use App\Models\Answer;
use App\Models\Question;
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

    public function store(StoreRequest $request)
    {
        return $this->service->store($request);
    }

    public function show(Answer $answer)
    {
        return $this->service->show($answer);
    }

    public function update(UpdateRequest $request, Answer $answer)
    {
        return $this->service->update($request, $answer);
    }

    public function destroy(Answer $answer)
    {
        return $this->service->destroy($answer);
    }
}
