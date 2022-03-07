<?php

namespace App\Http\Actions\Task;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Responders\Task\DeleteTaskResponder;
use App\Models\Task;
use Symfony\Component\HttpFoundation\Response;

class DeleteTaskAction extends Controller
{
    private DeleteTaskResponder $responder;

    public function __construct(DeleteTaskResponder $responder)
    {
        $this->responder = $responder;
    }

    public function __invoke(int $taskId): Response
    {
        Task::destroy($taskId);

        $payload = (new Payload())
            ->setStatus(Payload::DELETED);

        return $this->responder->handle($payload);
    }
}
