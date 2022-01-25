<?php

namespace Tests\Unit;

use App\Models\Task;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetSeederTasks()
    {
        $tasks = Task::all();
        $this->assertCount(3, $tasks);

        $tasksNotFinished = Task::where('executed', false)->get();
        $this->assertCount(2, $tasksNotFinished);

        $tasksFinished = Task::where('executed', true)->get();
        $this->assertCount(1, $tasksFinished);

        $task1 = Task::where('title', 'テストタスク')->first();
        $this->assertFalse((bool) $task1->executed);

        $task2 = Task::where('title', '終了したタスク')->first();
        $this->assertTrue((bool) $task2->executed);
    }
}
