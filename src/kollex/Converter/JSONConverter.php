<?php

namespace kollex\Converter;

Use \kollex\Converter\Converter;

class JSONConverter implements Converter {

    private $filecontent;

    public function __construct($filecontent)
    {
        $this->filecontent = $filecontent;
    }

    public function convert() : iterable
    {
        return json_decode(file_get_contents($this->filecontent), true);
    }
}