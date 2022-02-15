<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class PutTaskAction extends Controller
{
    public function __invoke(int $taskId, Request $request)
    {
        $task = Task::find($taskId);
        abort_if($task === null, 404);

        $fillData = [];
        if (isset($request->title)) {
            $fillData['title'] = $request->title;
        }

        if (isset($request->executed)) {
            $fillData['executed'] = $request->executed;
        }

        if (count($fillData) > 0) {
            $task->fill($fillData);
            $task->save();
        }

        return redirect(sprintf('/tasks/%s', $taskId));
    }
}
