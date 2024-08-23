<?php
declare(strict_types=1);

namespace ArtMksh\LaravelFileParser\Parsers;

class Xlsx implements ParserInterface
{
    /**
     * @return array[]
     */
    public static function parse($documentPath, $config = [])
    {
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');

        $reader->setReadDataOnly(true);
        $reader->setReadEmptyCells(false);

        $spreadsheet = $reader->load($documentPath);

        $worksheet = isset($config['sheetName'])
            ?
            $spreadsheet->getSheetByName($config['sheetName'])
            :
            $spreadsheet->getActiveSheet();

        $data = $worksheet->toArray('');

        $headers = array_shift($data);
        $nameArray = [];

        foreach ($data as $row) {
            $nameArray[] = array_combine($headers, $row);
        }

        return $nameArray;
    }
}