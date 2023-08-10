<?php


class StringParser
{
    public function giveNumbers(string $str): array
    {
        $this->checkExsitanceDelimiterAtEnd($str);
        $str = str_replace('\n', ',', $str);
        $str_number_list = explode(',', $str);
        $number_list = array_map('intval', $str_number_list);
        return $number_list;
    }

    public function checkExsitanceDelimiterAtEnd(string $str)
    {
        if(strlen($str)!=0 && !ctype_digit($str[-1]))
        {
            throw new InvalidArgumentException('Invalid String');
        }
    }
}