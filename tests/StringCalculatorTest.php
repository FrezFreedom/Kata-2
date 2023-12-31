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

        yield [
            5,
            '5',
        ];

        yield [
            0,
            '0',
        ];

        yield [
            6,
            '1,2\n3',
        ];

        yield [
            4,
            '//;\n1;3',
        ];

        yield [
            6,
            '//|\n1|2|3',
        ];

        yield [
            7,
            '//sep\n2sep5',
        ];

        yield [
            'Negative number(s) not allowed: -2',
            '1,-2',
        ];

        yield [
            'Negative number(s) not allowed: -4, -9',
            '2,-4,-9',
        ];

        yield [
            2,
            '1001,2',
        ];
    }


    /**
     * @dataProvider provideStringCalculatorDataException
     */
    public function test_delimiter_at_the_end_of_string(string $input): void
    {
        $this->expectException(InvalidArgumentException::class);
        
        $stringCalculator = new StringCalculator();
        $answer = $stringCalculator->add($input);
    }

    public static function provideStringCalculatorDataException()
    {
        yield [
            '1,2,',
        ];

        yield [
            '2,\n3',
        ];

        yield [
            '//|\n1|2,3'
        ];
    }
}