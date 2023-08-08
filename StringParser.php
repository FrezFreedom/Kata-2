<?php


class StringParser
{
    public function giveNumbers(string $str): array
    {
        $str_number_list = explode(',', $str);
        $number_list = array_map('intval', $str_number_list);
        return $number_list;
    }
}