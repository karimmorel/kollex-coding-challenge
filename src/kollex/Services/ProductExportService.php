<?php

namespace kollex\Services;

use kollex\Exporter\AbstractExporter;
use kollex\Mapper\AbstractMapper;
use \kollex\Dataprovider\Assortment\DataProvider;
use kollex\Dataprovider\Assortment\Product;

class ProductExportService {

    private $source;
    private $mapper;
    private $provider;

    public function __construct(AbstractExporter $source, AbstractMapper $mapper, DataProvider $provider)
    {
        $this->source = $source;
        $this->mapper = $mapper;
        $this->provider = $provider;
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

        $arrProducts = array();

        foreach ($mappedData as $productData)
        {
            $product = new Product($productData);

            $this->provider->addProduct($product);
        }

        return $this->provider->getProducts();

    }

}