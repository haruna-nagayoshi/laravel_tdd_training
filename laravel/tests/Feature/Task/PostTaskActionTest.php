<?php

namespace Tests\Feature\Task;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTaskActionTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testPostTaskAction(): void
    {
        $data = [
            'title' => '皿洗い',
        ];

        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->actingAs($this->user)->post('/tasks', $data);

        $response->assertStatus(302)
            ->assertRedirect('/tasks');

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testNotAuthenticated(): void
    {
        $data = [
            'title' => '皿洗い',
        ];

        $response = $this->post('/tasks', $data);
        $response->assertRedirect('/login');
    }
}
