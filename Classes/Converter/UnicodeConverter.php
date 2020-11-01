<?php
declare(strict_types=1);

namespace Ayacoo\Flaschenpost\Converter;

/**
 * Class UnicodeConverter
 * @package Ayacoo\Flaschenpost\Converter
 * @see https://gist.github.com/aeurielesn/1116358
 */
class UnicodeConverter
{

    /**
     * @param array $match
     * @return string
     */
    public function replaceUnicodeEscapeSequence(array $match): string
    {
        return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
    }

    /**
     * @param string $value
     * @return string|string[]|null
     */
    public function unicodeDecode(string $value)
    {
        return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', [$this, 'replaceUnicodeEscapeSequence'], $value);
    }
}