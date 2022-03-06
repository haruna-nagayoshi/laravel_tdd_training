<?php

namespace App\Http\Responders\Task;

use Illuminate\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response;

class GetCreateResponder
{
    private ResponseFactory $responseFactory;

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function handle(): Response
    {
        return $this->responseFactory->view('tasks.create');
    }
}
