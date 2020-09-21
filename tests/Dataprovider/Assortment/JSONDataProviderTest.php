<?php

use PHPUnit\Framework\TestCase;

class JSONDataProviderTest extends TestCase {

    public function testGetProductsIfNoProducts()
    {
        $provider = new \kollex\DataProvider\Assortment\JSONDataProvider;
        $data = $provider->getProducts();
        $this->assertEquals($data, array());
    }

    public function testGetEncodedProductsIfNoProducts()
    {
        $provider = new \kollex\DataProvider\Assortment\JSONDataProvider;
        $data = $provider->getEncodedProducts();
        $this->assertEquals($data, array());
    }
}