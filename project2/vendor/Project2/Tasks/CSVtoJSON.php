<?php

namespace Project2\Tasks;
use League\Csv\Reader;

class CSVtoJSON
{
    public function __construct()
    {
    }

    public function file($file)
    {
        $contents = file_get_contents($file);
        $csv = Reader::createFromString($contents);
        return $this->__json($csv);
    }

    public function string($data)
    {
        $csv = Reader::createFromString($data);
        return $this->__json($csv);
    }

    private function __json($csv)
    {
        $json = json_encode($csv, JSON_PRETTY_PRINT);
        return $json;
    }
}