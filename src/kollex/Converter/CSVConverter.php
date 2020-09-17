<?php

/**
 * Converting data from CSV files to exploitable array
 */

namespace kollex\Converter;

use \kollex\Converter\ConverterInterface;

class CSVConverter implements ConverterInterface {

    private $filecontent;
    private $separator = ";";

    public function __construct($filecontent)
    {
        if(is_resource($filecontent))
        {
            $this->filecontent = $filecontent;
        }
    }

    public function convert(): iterable
    {
        $convertedData = array();
        $row = 0;
        
        if (($handle = $this->filecontent) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, $this->separator)) !== FALSE) {
                $convertedData[$row] = $data;
                $row++;
            }
            fclose($handle);
        }

        return $convertedData;
    }
}