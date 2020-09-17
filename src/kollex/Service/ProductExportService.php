<?php

/**
 *  The ProductExportService will handle all the behaviour of the application
 *  But it needs some other objects to help : 
 *  An Exporter which his going to fetch the file we need and then which will convert it's content into exploitable data
 *  A Mapper which will map this data to the different properties of the product object, following the specific representation of the data send by each wholesaler
 *  And a DataProvider which will return the list of products created into a specific format (here JSON)
 */ 

namespace kollex\Service;

use kollex\Exporter\AbstractExporter;
use kollex\Mapper\AbstractMapper;
use \kollex\Dataprovider\Assortment\DataProvider;
use kollex\Dataprovider\Assortment\BaseProduct;
use kollex\Service\ExportServiceInterface;


class ProductExportService implements ExportServiceInterface {

    private $source;
    private $mapper;
    private $provider;

    public function __construct(AbstractExporter $source, AbstractMapper $mapper, DataProvider $provider)
    {
        $this->source = $source;
        $this->mapper = $mapper;
        $this->provider = $provider;
    }

    public function setSource(AbstractExporter $source)
    {
        $this->source = $source;
        return $this;
    }

    public function setMapper(AbstractMapper $mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }

    public function setProvider(DataProvider $provider)
    {
        $this->provider = $provider;
        return $this;
    }

    // Exporting the data from the source requested to the DataProvider
    public function export()
    {
        
        $sourceContent =  $this->source->exportSource();

        $mappedData = $this->mapper->setData($sourceContent)->map();

        $arrProducts = array();

        foreach ($mappedData as $productData)
        {
            $product = new BaseProduct($productData);

            $this->provider->addProduct($product);
        }

        return $this;
    }

    // Returning the list of products the DataProvider has
    public function display()
    {
        return $this->provider->getEncodedProducts();
    }

}