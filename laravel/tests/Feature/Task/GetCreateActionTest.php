<?php

namespace Tests\Feature\Task;

use App\Models\User;
use Tests\TestCase;

class GetCreateActionTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testGetCreateAction(): void
    {
        $response = $this->actingAs($this->user)->get('/tasks/create');

        $response->assertStatus(200);
    }

    public function testNotAuthenticated(): void
    {
        $response = $this->get('/tasks/create');

        $response->assertRedirect('/login');
    }
}
