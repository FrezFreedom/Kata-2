<?php


class StringParser
{
    public function giveNumbers(string $str): array
    {
        $str = str_replace('\n', ',', $str);
        $str_number_list = explode(',', $str);
        echo implode('-', $str_number_list) . PHP_EOL;
        $number_list = array_map('intval', $str_number_list);
        return $number_list;
    }
}