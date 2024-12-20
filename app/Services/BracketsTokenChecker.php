<?php

namespace App\Services;

use App\Services\BracketsTokenChecker\ClosingPairElement;
use App\Services\BracketsTokenChecker\OpeningPairElement;

class BracketsTokenChecker implements TokenChecker
{
    public function __construct(private readonly string $token) {}

    private array $stack = [];

    private const classes = [
        "{" => OpeningPairElement::class,
        "[" => OpeningPairElement::class,
        "(" => OpeningPairElement::class,
        ")" => ClosingPairElement::class,
        "]" => ClosingPairElement::class,
        "}" => ClosingPairElement::class,
    ];

    public function isValid(): bool
    {
        if (preg_match("~[^()\[\]{}]+~", $this->token)) {
            return false;
        }

        foreach (str_split($this->token) as $char) {
            $class = self::classes[$char];
            /** @var OpeningPairElement|ClosingPairElement $class */
            $element = new $class($char);
            if (OpeningPairElement::class === get_class($element)) {
                $element->operateOnStack($this->stack);
            } else {
                if ($element->isElementValid(end($this->stack)) && !empty($this->stack)) {
                    $element->operateOnStack($this->stack);
                } else {
                    return false;
                }
            }
        }

        if (empty($this->stack)) {
            return true;
        }

        return false;
    }
}
