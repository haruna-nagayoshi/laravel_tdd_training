<?php

namespace Tests\Feature\Task;

use App\Models\User;
use Tests\TestCase;

class GetTasksActionTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testGetTasksAction(): void
    {
        $response = $this->actingAs($this->user)->get('/tasks');

        $response->assertStatus(200);
    }

    public function testNotAuthenticated(): void
    {
        $response = $this->get('/tasks');

        $response->assertRedirect('/login');
    }
}
