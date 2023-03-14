<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaginationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_that_results_page_one_there_is_a_link_to_page_two(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200)->assertSee('?page=2');
    }
}
