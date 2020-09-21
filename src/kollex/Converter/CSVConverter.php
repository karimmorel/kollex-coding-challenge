<?php

/**
 * Converting data from CSV files to exploitable array
 */

namespace kollex\Converter;

use \kollex\Converter\ConverterInterface;
use \kollex\Exception\WrongFileToConverterException;

class CSVConverter implements ConverterInterface {

    private $filecontent;
    private $separator = ";";

    public function __construct($filecontent)
    {
        if(is_resource($filecontent))
        {
            $this->filecontent = $filecontent;
        }
        else
        {
            throw new WrongFileToConverterException;
        }
    }

    public function convert(): iterable
    {
        $convertedData = array();
        $row = 0;
        
        if (($handle = $this->filecontent) !== FALSE) {

            if (!file_exists($handle))
            {
                throw new WrongFileToConverterException;
            }

            while (($data = fgetcsv($handle, 1000, $this->separator)) !== FALSE) {
                $convertedData[$row] = $data;
                $row++;
            }
            fclose($handle);
        }

        return $convertedData;
    }
}