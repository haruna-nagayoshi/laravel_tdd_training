<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Models\Task;

class GetTaskAction extends Controller
{
    public function __invoke(int $id)
    {
        $task = Task::find($id);

        abort_if($task === null, 404);

        return view('tasks.detail', ['task' => $task]);
    }
}
