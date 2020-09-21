<?php

use PHPUnit\Framework\TestCase;
use kollex\Exception\ProductNotValidException;


class BaseProductTest extends TestCase {

    public function testValidationIfProductNotValid()
    {
        $this->expectException(Error::class);
        $product = new \kollex\Dataprovider\Assortment\BaseProduct;
        $product->isValid();
    }

    public function testConstructIfArrayEmpty()
    {
        $this->expectException(ProductNotValidException::class);
        $product = new \kollex\Dataprovider\Assortment\BaseProduct(array('randomvalue'));
        $product->isValid();
    }
}