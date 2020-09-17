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
    public function getProducts()
    {
        $products = $this->products;
        return json_encode($products);
    }
}