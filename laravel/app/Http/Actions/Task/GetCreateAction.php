<?php

namespace App\Http\Actions\Task;

use App\Http\Controllers\Controller;
use App\Http\Responders\Task\GetCreateResponder;
use Symfony\Component\HttpFoundation\Response;

class GetCreateAction extends Controller
{
    private GetCreateResponder $responder;

    public function __construct(GetCreateResponder $responder)
    {
        $this->responder = $responder;
    }

    public function __invoke(): Response
    {
        return $this->responder->handle();
    }
}
