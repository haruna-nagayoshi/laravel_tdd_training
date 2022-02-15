<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseTransactions;

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

    public function testGetTaskDetail()
    {
        $task = Task::find(2);
        $this->assertEquals('テストタスク', $task->title);
    }

    public function testGetTaskDetailNotExists()
    {
        $task = Task::find(0);
        $this->assertNull($task);
    }

    public function testPutTask()
    {
        $task = Task::create([
            'title' => 'test',
            'executed' => false,
        ]);

        $this->assertEquals('test', $task->title);
        $this->assertFalse($task->executed);

        $task->fill(['title' => 'テスト']);
        $task->save();

        $updatedTask = Task::find($task->id);
        $this->assertEquals('テスト', $updatedTask->title);
    }
}
