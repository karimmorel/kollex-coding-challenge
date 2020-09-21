<?php

/**
 * This class will handle a unique file, which is within the application (by default in the data/ folder)
 */

namespace kollex\Exporter;

use kollex\Exporter\AbstractExporter;
use kollex\Exception\FileDoesntExistsWhileExportingException;
 

class InternalFileExporter extends AbstractExporter {

    private $source;
    private $path = 'data/';

    public function __construct(String $source)
    {
        $this->source = $source;
    }

    public function exportSource()
    {
        $file = $this->fetchSource();

        if ($file)
        {
            $converter = $this->getConverter(fopen($file, 'r'));

            return $converter->convert();
        }

        return false;
    }

    public function fetchSource()
    {
        $filename = $this->path . $this->source;

        if(file_exists($filename))
        {
            return $filename;
        }
        else
        {
            throw new FileDoesntExistsWhileExportingException;
        }
    }

    public function getSource()
    {
        return $this->source;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setSource(String $source)
    {
        $this->source = $source;
        return $this;
    }

    public function setPath(String $path)
    {
        $this->path = $path;
        return $this;
    }
}