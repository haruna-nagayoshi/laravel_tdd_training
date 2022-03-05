<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

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
