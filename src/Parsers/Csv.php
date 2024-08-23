<?php
declare(strict_types=1);

namespace ArtMksh\LaravelFileParser\Parsers;

use League\Csv\Reader;

class Csv implements ParserInterface
{
    public static function parse($documentPath, $config = [])
    {
        $csv = Reader::createFromPath($documentPath, 'r');
        $csv->setHeaderOffset(0);

        return iterator_to_array($csv->getRecords());
    }
}