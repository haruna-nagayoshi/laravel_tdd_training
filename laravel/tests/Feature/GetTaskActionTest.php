<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetTaskActionTest extends TestCase
{
    use RefreshDatabase;

    private $task;

    protected function setUp(): void
    {
        parent::setUp();
        $this->task = Task::create([
            'title' => 'テストタスク',
            'executed' => false,
        ]);
    }

    public function testGetTaskAction()
    {
        $response = $this->get(sprintf('/tasks/%s', $this->task->id));

        $response->assertStatus(200);
    }

    public function testNotExistsTask()
    {
        $response = $this->get('/tasks/0');

        $response->assertStatus(404);
    }
}
