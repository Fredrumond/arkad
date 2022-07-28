<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivesTest extends TestCase
{
    public function testReturnInfosActives()
    {
        $response = $this->get('/api/actives');

        $response->assertStatus(200);
    }
}
