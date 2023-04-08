<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
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
        return view('admin.questions.index', compact('questions'));
    }

    public function store(StoreRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.questions.index');
    }

    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    public function update(UpdateRequest $request, Question $question)
    {
        $this->service->update($request, $question);
        return redirect()->route('admin.questions.index');
    }

    public function destroy(Question $question)
    {
        $this->service->destroy($question);
        return redirect()->route('admin.questions.index');
    }
}
