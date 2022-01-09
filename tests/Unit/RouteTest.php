<?php

namespace Tests\Unit;

use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_success()
    {
        $response = $this->get("/movies");
        $response->assertStatus(200);
    }

    public function test_failure()
    {
        $response = $this->get("/movies/moviedetails");
        $response->assertStatus(404);
    }
}
