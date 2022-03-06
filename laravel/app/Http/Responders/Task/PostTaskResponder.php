<?php

namespace App\Http\Responders\Task;

use App\Exceptions\UndefinedStatusException;
use App\Http\Payload;
use Illuminate\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response;

class PostTaskResponder
{
    private ResponseFactory $responseFactory;

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function handle(Payload $payload): Response
    {
        if ($payload->getStatus() === Payload::CREATED) {

            return $this->responseFactory->redirectToRoute('tasks.get');
        }

        throw UndefinedStatusException::fromStatus($payload->getStatus());
    }
}
