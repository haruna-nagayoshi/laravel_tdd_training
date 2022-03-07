<?php

namespace Tests\Feature\Task;

use App\Models\Task;
use Tests\TestCase;

class DeleteTaskActionTest extends TestCase
{
    private Task $task;

    protected function setUp(): void
    {
        parent::setUp();

        $this->task = Task::create([
            'title' => '洗濯',
            'executed' => true,
        ]);
    }

    public function testDeleteTaskAction(): void
    {
        $this->assertDatabaseHas('tasks', $this->task->toArray());

        $response = $this->delete(sprintf('/tasks/%s', $this->task->id));

        $response->assertStatus(302)
            ->assertRedirect('/tasks');

        $this->assertDatabaseMissing('tasks', $this->task->toArray());
    }
}
