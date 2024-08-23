<?php
declare(strict_types=1);

namespace ArtMksh\LaravelFileParser\Parsers;

interface ParserInterface
{
    public static function parse($source, $config = []);
}