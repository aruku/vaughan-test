<?php

namespace App\Services;

interface TokenChecker
{
    public function __construct(string $token);

    public function isValid(): bool;
}
