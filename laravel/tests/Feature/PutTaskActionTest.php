<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PutTaskActionTest extends TestCase
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

    public function testPutTaskPath()
    {
        $data = [
            'title' => 'test title',
        ];

        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->put(sprintf('/tasks/%s', $this->task->id), $data);

        $response->assertStatus(302)
            ->assertRedirect(sprintf('/tasks/%s', $this->task->id));

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testPutTaskPath2()
    {
        $data = [
            'title' => 'テストタスク2',
            'executed' => true,
        ];

        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->put(sprintf('/tasks/%s', $this->task->id), $data);

        $response->assertStatus(302)
            ->assertRedirect(sprintf('/tasks/%s', $this->task->id));

        $this->assertDatabaseHas('tasks', $data);
    }
}
