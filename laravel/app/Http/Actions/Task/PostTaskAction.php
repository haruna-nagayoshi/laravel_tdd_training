<?php

namespace App\Http\Actions\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\PostTaskRequest;
use App\Http\Responders\Task\PostTaskResponder;
use App\Usecase\Task\CreateUsecase;
use Symfony\Component\HttpFoundation\Response;

class PostTaskAction extends Controller
{
    private CreateUsecase $usecase;

    private PostTaskResponder $responder;

    public function __construct(CreateUsecase $usecase, PostTaskResponder $responder)
    {
        $this->usecase = $usecase;
        $this->responder = $responder;
    }

    public function __invoke(PostTaskRequest $request): Response
    {
        return $this->responder->handle($this->usecase->run($request->get('title')));
    }
}
