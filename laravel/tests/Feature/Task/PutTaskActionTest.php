<?php

namespace Tests\Feature\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PutTaskActionTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Task $task;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->task = Task::create([
            'title' => 'テストタスク',
            'executed' => false,
        ]);
    }

    public function testPutTaskAction(): void
    {
        $data = [
            'title' => 'test title',
        ];

        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->actingAs($this->user)->put(sprintf('/tasks/%s', $this->task->id), $data);

        $response->assertStatus(302)
            ->assertRedirect(sprintf('/tasks/%s', $this->task->id));

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testPutTaskAction2(): void
    {
        $data = [
            'title' => 'テストタスク2',
            'executed' => true,
        ];

        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->actingAs($this->user)->put(sprintf('/tasks/%s', $this->task->id), $data);

        $response->assertStatus(302)
            ->assertRedirect(sprintf('/tasks/%s', $this->task->id));

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testNotAuthenticated(): void
    {
        $data = [
            'title' => 'テストタスク',
        ];

        $response = $this->put(sprintf('/tasks/%s', $this->task->id), $data);

        $response->assertRedirect('/login');
    }
}
