<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Models\Task;

class GetTasksAction extends Controller
{
    public function __invoke()
    {
        $tasks = Task::all();

        return view('tasks.index', ['tasks' => $tasks]);
    }
}
