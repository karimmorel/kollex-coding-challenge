<?php

/**
 * DataProviders will return the data in a specific format
 * For this exercise, I added a JSONDataProvider to list the products into a JSON format
 * But we can imagine returning them into other formats (xml, string, array) or even directly in a file by adding some new DataProviders
 */

namespace kollex\Dataprovider\Assortment;

use \kollex\Dataprovider\Assortment\Product;


interface DataProvider
{
    /**
     * @return Product[]
     */
    public function getProducts() : array;
    public function getEncodedProducts();

    public function addProduct(Product $product);
}
