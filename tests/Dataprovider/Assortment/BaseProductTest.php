<?php

class BaseProductTest extends PHPUnit_Framework_TestCase {

    public function testValidationIfProductNotValid()
    {
        $product = new \kollex\DataProvider\Assortment\BaseProduct;
        $product->isValid();
    }

    public function testConstructIfArrayEmpty()
    {
        $product = new \kollex\DataProvider\Assortment\BaseProduct(array('randomvalue'));
        $product->isValid();
    }
}