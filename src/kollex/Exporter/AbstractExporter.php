<?php

/**
 * In order to make the application maintainable and extendable, I try to make every component loosely coupled
 * Here is the component which will get the file we are looking for and return a resource to the Converter object
 * 
 * We can imagine that, later we would need to get some files from webservices outside (or an ERP system), or we would need to get all resources from a folder
 * For that we would only need to add a new Exporter class which will return a resource or will call exporters at multiple time if we have several files to export.
 * 
 * That's why I choosed to design it this way.
 */

namespace kollex\Exporter;

Use \kollex\Converter\ConverterInterface;

abstract class AbstractExporter {

    // Here there is the different types of files supported by the application
    // If we want to add a new type of file, we will only need to add a new converter, and to add it in this list
    private $converters = [
        'text/plain' => 'CSVConverter', 
        'application/json' => 'JSONConverter'
    ];

    public function getConverter($file) : ? ConverterInterface
    {
        $filename = $this->getPath() . $this->getSource();
        $mimetype = mime_content_type($filename);

        $converterName = '\kollex\Converter\\'.$this->converters[$mimetype];

        return $mimetype ? new $converterName($file) : false;
    }

    abstract public function fetchSource();
    abstract public function exportSource();
}