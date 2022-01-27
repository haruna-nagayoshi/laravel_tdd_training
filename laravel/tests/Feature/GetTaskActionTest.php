<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetTaskActionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetTaskAction()
    {
        $response = $this->get('/tasks/1');

        $response->assertStatus(200);
    }

    public function testNotExistsTask()
    {
        $response = $this->get('/tasks/0');

        $response->assertStatus(404);
    }
}
