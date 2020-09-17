<?php

namespace kollex\Exporter;

Use \kollex\Converter\Converter;

abstract class Exporter {

    private $converters = [
        'text/plain' => 'CSVConverter', 
        'application/json' => 'JSONConverter'
    ];

    public function getConverter($file) : ? Converter
    {
        $filename = $this->getPath() . $this->getSource();
        $mimetype = mime_content_type($filename);

        $converterName = '\kollex\Converter\\'.$this->converters[$mimetype];

        return $mimetype ? new $converterName($file) : false;
    }

    abstract public function fetchSource();
    abstract public function exportSource();
}