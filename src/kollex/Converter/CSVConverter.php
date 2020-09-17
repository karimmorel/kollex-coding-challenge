<?php

namespace kollex\Converter;

Use \kollex\Converter\Converter;

class CSVConverter implements Converter {

    private $filecontent;
    private $separator = ";";

    public function __construct($filecontent)
    {
        $this->filecontent = $filecontent;
    }

    public function convert(): iterable
    {
        $convertedData = array();
        $row = 0;
        
        if (($handle = fopen($this->filecontent, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, $this->separator)) !== FALSE) {
                $convertedData[$row] = $data;
                $row++;
            }
            fclose($handle);
        }

        return $convertedData;
    }
}