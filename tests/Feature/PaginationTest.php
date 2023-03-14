<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\DomCrawler\Crawler;
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

    public function test_that_results_page_two_has_a_link_to_page_one_and_that_the_link_does_not_have_page_parameter(): void{
        $response = $this->get('/?page=2');
        $crawler = new Crawler($response->getContent());
        $link = $crawler->filter('nav[aria-label="Pagination"] a:contains("1"):not(:contains("~[0-9]")):not(:contains("~[a-z]")):not(:contains("~[A-Z]"))')->first();
        $this->assertNotNull($link, 'Link not found');
        $url = $link->attr('href');
        $this->assertStringNotContainsString('page=1', $url, 'Link contains "page" parameter');
    }
}
