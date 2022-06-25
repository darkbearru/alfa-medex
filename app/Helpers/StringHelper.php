<?php

namespace App\Helpers;

class StringHelper
{
    /**
     * ucFirst
     * реализация ucfirst для русского языка
     * @param string $word
     * @return string
     */
    public static function ucFirst(string $word): string
    {
        return mb_strtoupper(mb_substr($word, 0, 1, 'utf-8'), 'utf-8') .
            mb_strtolower(mb_substr($word, 1, null, 'utf-8'), 'utf-8');
    }
}
