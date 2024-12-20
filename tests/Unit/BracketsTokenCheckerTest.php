<?php


use App\Services\BracketsTokenChecker;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class BracketsTokenCheckerTest extends TestCase
{
    #[DataProvider("provideBracketsStrings")]
    public function test_it_checks_bracket_strings($expectedResult, $string): void
    {
        $checker = new BracketsTokenChecker($string);

        $this->assertSame($expectedResult, $checker->isValid());
    }

    public static function provideBracketsStrings(): array
    {
        return [
            [true,  ""],
            [true,  "()"],
            [true,  "([{}])"],
            [false, "a"],
            [false, "([{a}])"],
            [false, "([{]})"],
            [false, "}{"],
        ];
    }
}
