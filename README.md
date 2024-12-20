# Vaughan - Full-Stack technical test

## Installation

**Note**: Docker and Composer v2 (or Laravel Sail) are required.

```
composer install
```

## Usage

```
vendor/bin/sail up
curl -H "Authorization: Bearer ([]{})" -d '{"url": "https://www.example.com/my-really-long-link-that-I-need-to-shorten/84378949"}' localhost/api/v1/short-urls
curl -H "Authorization: Bearer lololo" -d '{"url": "https://www.example.com/my-really-long-link-that-I-need-to-shorten/84378949"}' localhost/api/v1/short-urls
```
**Note**: on Windows/WSL2, you need escape the existing double quotes and use them unquoted instead of the simple ones. Like this:
```
curl -H "Authorization: Bearer ([]{})" -d "{\"url\": \"https://www.example.com/my-really-long-link-that-I-need-to-shorten/84378949\"}" localhost/api/v1/short-urls
```

## Tests

```
./vendor/bin/sail phpunit
```
