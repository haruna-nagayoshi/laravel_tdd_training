<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PutTaskActionTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPutTaskPath()
    {
        $data = [
            'title' => 'test title',
        ];

        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->put('/tasks/1', $data);

        $response->assertStatus(302)
            ->assertRedirect('/tasks/1');

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testPutTaskPath2()
    {
        $data = [
            'title' => 'テストタスク2',
            'executed' => true,
        ];

        $this->assertDatabaseMissing('tasks', $data);

        $response = $this->put('/tasks/2', $data);

        $response->assertStatus(302)
            ->assertRedirect('/tasks/2');

        $this->assertDatabaseHas('tasks', $data);
    }
}
