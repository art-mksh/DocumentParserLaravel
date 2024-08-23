<?php

return [
    'parsers' => [
        'csv' => \Christopheredjohnson\LaravelFileParser\Parsers\CsvParser::class,
        'xlsx' => \Christopheredjohnson\LaravelFileParser\Parsers\XlsxParser::class,
    ],
];