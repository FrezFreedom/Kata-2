<?php


class StringParser
{
    public function giveNumbers(string $str): array
    {
        if($this->hasSpecificDelimiter($str))
        {
            $specificDelimiter = $this->getSpecificDelimiter($str);
            $str = $this->cutDelimiter($str);
            $str = str_replace($specificDelimiter, ',', $str);
        }
        
        $this->checkExsitanceDelimiterAtEnd($str);
        $str = str_replace('\n', ',', $str);

        $this->checkContinuousDelimiter($str);

        $str_number_list = explode(',', $str);
        $number_list = array_map('intval', $str_number_list);

        return $number_list;
    }

    private function cutDelimiter($str)
    {
        $firstOccurrenceOfNewLine = strpos($str, '\n');
        return substr($str, $firstOccurrenceOfNewLine + 2);
    }

    private function getSpecificDelimiter(string $str)
    {
        $firstOccurrenceOfNewLine = strpos($str, '\n');
        return substr($str, 2, $firstOccurrenceOfNewLine - 2);
    }

    private function hasSpecificDelimiter(string $str): bool
    {
        return str_starts_with($str, '//');
    }

    public function checkContinuousDelimiter($str)
    {
        if(strpos($str, ',,') !== false)
            $this->throwException();
    }

    public function checkExsitanceDelimiterAtEnd(string $str)
    {
        if(strlen($str)!=0 && !ctype_digit($str[-1]))
        {
            $this->throwException();
        }
    }

    public function throwException()
    {
        throw new InvalidArgumentException('Invalid String');
    }
}