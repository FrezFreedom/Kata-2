<?php

require_once('StringParser.php');

class StringCalculator
{
    const NEGETIVE_NUMBER_ERROR = 'Negative number(s) not allowed: ';
    public function add(string $str): int|string
    {
        $stringParser = new StringParser();
        $number_list = $stringParser->giveNumbers($str);

        if($this->hasNegetiveNumber($number_list))
        {
            return $this->negetiveNumberError($number_list);
        }

        $answer = 0;
        foreach($number_list as $number)
        {
            if($number <= 1000)
            {
                $answer += $number;
            }
        }
        return $answer;
    }

    private function negetiveNumberError(array $number_list): string
    {
        $error = self::NEGETIVE_NUMBER_ERROR;
        $first = true;
        foreach($number_list as $number)
        {
            if($number < 0)
            {
                if($first)
                {
                    $error .= strval($number);
                    $first = false;
                }
                else
                {
                    $error .= ', ' . strval($number);
                }
            }
        }
        return $error;
    }

    private function hasNegetiveNumber(array $number_list): bool
    {
        foreach($number_list as $number)
        {
            if($number < 0)
                return true;
        }
        return false;
    }
}