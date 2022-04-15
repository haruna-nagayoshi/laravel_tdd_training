<?php

namespace Tests\Feature\Task;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;

class DeleteTaskActionTest extends TestCase
{
    private User $user;
    private Task $task;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->task = Task::create([
            'title' => '洗濯',
            'executed' => true,
        ]);
    }

    public function testDeleteTaskAction(): void
    {
        $this->assertModelExists($this->task);

        $response = $this->actingAs($this->user)->delete(sprintf('/tasks/%s', $this->task->id));

        $response->assertStatus(302)
            ->assertRedirect('/tasks');

        $this->assertDatabaseMissing('tasks', $this->task->toArray());
    }

    public function testNotAuthenticated(): void
    {
        $response = $this->delete(sprintf('/tasks/%s', $this->task->id));

        $response->assertRedirect('/login');
    }
}
