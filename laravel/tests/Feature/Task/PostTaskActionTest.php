<?php

namespace Tests\Feature\Task;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTaskActionTest extends TestCase
{
    use RefreshDatabase;

    public function testPostTaskAction()
    {
        $data = [
            'title' => '皿洗い',
        ];

        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->post('/tasks', $data);

        $response->assertStatus(302)
            ->assertRedirect('/tasks');

        $this->assertDatabaseHas('tasks', $data);
    }
}
