<?php

/**
 * Converting data from JSON files to exploitable array
 */

namespace kollex\Converter;

use \kollex\Converter\ConverterInterface;

class JSONConverter implements ConverterInterface {

    private $filecontent;

    public function __construct($filecontent)
    {
        if(is_resource($filecontent))
        {
            $this->filecontent = $filecontent;
        }
    }

    public function convert() : iterable
    {
        $file = stream_get_contents($this->filecontent);
    
        return json_decode($file, true);
    }
}