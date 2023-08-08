<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once( __DIR__ . '/../StringCalculater.php');

final class StringCalculatorTest extends TestCase
{
    /**
     * @dataProvider provideStringCalculaterData
     */
    public function test_string_calculator($expectedResult, $input): void
    {
        $stringCalculater = new StringCalculater();
        $answer = $stringCalculater->add($input);

        $this->assertSame($expectedResult, $answer);
    }

    public static function provideStringCalculaterData()
    {
        yield [
            5,
            '2,3',
        ];
    }
}