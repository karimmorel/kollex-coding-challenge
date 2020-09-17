<?php

namespace kollex\Dataprovider\Assortment;

use \kollex\Dataprovider\Assortment\DataProvider;
use \kollex\Dataprovider\Assortment\Product;

class JSONDataProvider implements DataProvider {


    private $products = array();

    public function addProduct(Product $product)
    {
        if ($product->isValid())
        {
            $this->products[] = $product;
        }
    }

    /**
     * @return Product[]
     */
    public function getProducts() : array
    {
        $products = $this->products;
        return $products;
    }

    public function getEncodedProducts()
    {
        return json_encode($this->getProducts());
    }
}