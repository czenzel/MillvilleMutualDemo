<?php

namespace Project1\Database;
use League\Csv\Writer;
use League\Csv\Reader;

class LeadDatabase
{
    public function __construct()
    {
        $this->csv_file = '/app/leads.csv';
    }

    public function write_lead($lead)
    {
        if (!file_exists($this->csv_file))
        {
            $csv = Writer::createFromPath($this->csv_file, 'w');
            $csv->insertOne($this->get_headers());
        }

        if (!isset($csv)) 
        {
            $csv = Writer::createFromPath($this->csv_file, 'a+');
        }

        $csv->insertOne($lead->to_array());
    }

    public function get_headers()
    {
        $headers = [
            'First Name',
            'Last Name',
            'Street Address',
            'City',
            'State',
            'Zip Code',
            'E-mail Address',
            'Phone Number',
            'Appraised Value of Home'
        ];

        return $headers;
    }

    public function get_records()
    {
        if (!file_exists($this->csv_file))
        {
            return [];
        }

        $csv = Reader::createFromPath($this->csv_file, 'r');
        $csv->setHeaderOffset(0);
        $records = array();

        foreach ($csv->getRecords() as $offset => $record) 
        {
            array_push($records, $record);
        }

        $headers = $this->get_headers();

        usort($records, function ($a, $b) {
            return $a['Last Name'] <=> $b['City'];
        });
        
        return $records;
    }

    public function sum()
    {
        $records = $this->get_records();
        $sum = 0;

        foreach ($records as $record)
        {
            $sum += $record['Appraised Value of Home'];
        }

        return $sum;
    }

    public function count()
    {
        $records = $this->get_records();
        return count($records);
    }
}