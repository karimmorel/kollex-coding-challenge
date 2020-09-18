<?php

class JSONDataProviderTest extends PHPUnit_Framework_TestCase {

    public function testGetProductsIfNoProducts()
    {
        $provider = new \kollex\DataProvider\Assortment\JSONDataProvider;
        $provider->getProducts();
    }

    public function testGetEncodedProductsIfNoProducts()
    {
        $provider = new \kollex\DataProvider\Assortment\JSONDataProvider;
        $provider->getEncodedProducts();
    }
}