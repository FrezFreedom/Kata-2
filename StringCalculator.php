<?php

require_once('StringParser.php');

class StringCalculator
{
    public function add(string $str): int
    {
        $stringParser = new StringParser();
        $stringParser->checkExsitanceDelimiterAtEnd($str);
        $number_list = $stringParser->giveNumbers($str);
        $answer = 0;
        foreach($number_list as $number)
        {
            $answer += $number;
        }
        return $answer;
    }
}