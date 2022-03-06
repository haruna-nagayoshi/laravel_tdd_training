<?php

namespace App\Usecase\Task;

use App\Http\Payload;
use App\Models\Task;

class CreateUsecase
{
    public function run(string $title)
    {
        Task::create([
            'title' => $title,
            'executed' => false,
        ]);

        return (new Payload())
            ->setStatus(Payload::CREATED);
    }
}
