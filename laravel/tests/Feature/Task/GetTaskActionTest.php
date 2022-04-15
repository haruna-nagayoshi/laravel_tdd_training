<?php

namespace Tests\Feature\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetTaskActionTest extends TestCase
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

    public function testGetTaskAction(): void
    {
        $response = $this->actingAs($this->user)->get(sprintf('/tasks/%s', $this->task->id));

        $response->assertStatus(200);
    }

    public function testNotExistsTask(): void
    {
        $response = $this->actingAs($this->user)->get('/tasks/0');

        $response->assertStatus(404);
    }

    public function testNotAuthenticated(): void
    {
        $response = $this->get('/tasks/0');

        $response->assertRedirect('/login');
    }
}
