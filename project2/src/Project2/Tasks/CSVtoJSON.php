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
        $this->__write($json);
        return $this->__json($csv);
    }

    private function __json($csv)
    {
        $json = json_encode($csv, JSON_PRETTY_PRINT);
        $this->__write($json);
        return $json;
    }

    private function __write($json)
    {
        file_put_contents($this->written_file($json), $json);
    }

    public function written_file($json)
    {
        $filename = $this->file_name($json);
        return "/app/queue/$filename.txt";
    }

    public function written_url($json)
    {
        $filename = $this->file_name($json);
        return "/queue/$filename.txt";
    }

    private function file_name($json) 
    {
        $filename = hash('sha256', $json);
        return $filename;
    }
}