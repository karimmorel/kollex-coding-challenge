<?php

namespace kollex\Converter;

Use \kollex\Converter\ConverterInterface;

class JSONConverter implements ConverterInterface {

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