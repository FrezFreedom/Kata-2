<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once( __DIR__ . '/../StringCalculator.php');

final class StringCalculatorTest extends TestCase
{
    /**
     * @dataProvider provideStringCalculatorData
     */
    public function test_string_calculator($expectedResult, $input): void
    {
        $stringCalculator = new StringCalculator();
        $answer = $stringCalculator->add($input);

        $this->assertSame($expectedResult, $answer);
    }

    public static function provideStringCalculatorData()
    {
        yield [
            5,
            '2,3',
        ];
    }
}