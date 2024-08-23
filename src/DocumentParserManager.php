<?php

declare(strict_types=1);

namespace ArtMoksh\DocumentParserLaravel;

use ArtMoksh\DocumentParserLaravel\Parsers\ParserInterface;

class DocumentParserManager
{
    protected $parsers = [];

    public function registerParser($type, ParserInterface $parser)
    {
        $this->parsers[strtolower($type)] = $parser;
    }

    public function parse($source, $type, $config = [])
    {
        $type = strtolower($type);

        if (! isset($this->parsers[$type])) {
            throw new \Exception("Unsupported source type: $type");
        }

        return $this->parsers[$type]::parse($source, $config);
    }

    public function getRegisteredParsers()
    {
        return array_keys($this->parsers);
    }
}