<?php

namespace kollex\Services;

Use kollex\Exporter\AbstractExporter;
Use kollex\Mapper\AbstractMapper;

class ProductExportService {

    private $source;
    private $mapper;

    public function __construct(AbstractExporter $source, AbstractMapper $mapper)
    {
        $this->source = $source;
        $this->mapper = $mapper;
    }

    /**
     * 
     *  The export method is decoupled in several steps, all handled by different objects
     *  The exporter will fetch the source we are looking for --> Internal file / External File (Webservice) / A whole folder and return an array with the content of the source
     *  Then we will map the content to convert the data send by a specific wholesaler into an exploitable data
     */ 
    public function export()
    {
        
        $sourceContent =  $this->source->exportSource();

        $mappedData = $this->mapper->setData($sourceContent)->map();

        return $mappedData;

    }

}