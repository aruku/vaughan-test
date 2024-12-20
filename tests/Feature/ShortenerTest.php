<?php

use Illuminate\Foundation\Testing\TestCase;
use Tests\CreatesApplication;

class ShortenerTest extends TestCase
{
    use CreatesApplication;

    public function test_the_application_shortens_a_url(): void
    {
        $response = $this->postJson("/api/v1/short-urls", [
            "url" => "https://www.example.com/my-really-long-link-that-I-need-to-shorten/84378949"
        ], [
            "Authorization" => "Bearer []{}"
        ]);

        // Don"t assert the status because it can be 200 or 304
        $response->assertJson([
            "url" => "https://tinyurl.com/y4j6gh6w",
        ]);
    }

    public function test_the_authentication_fails(): void
    {
        $response = $this->postJson("/api/v1/short-urls", [
            "url" => "https://www.example.com/my-really-long-link-that-I-need-to-shorten/84378949"
        ], [
            "Authorization" => "Bearer lololo"
        ]);

        $response->assertStatus(401);
    }
}
