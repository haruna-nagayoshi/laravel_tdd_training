<?php

namespace Tests\Feature\Task;

use Tests\TestCase;

class GetCreateActionTest extends TestCase
{
    public function testGetCreateAction()
    {
        $response = $this->get('/tasks/create');

        $response->assertStatus(200);
    }
}
