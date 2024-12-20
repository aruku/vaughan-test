<?php

namespace App\Services;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;

interface UrlShortener
{
    public function requestShortUrl(string $urlToShorten): PromiseInterface|Response;
}
