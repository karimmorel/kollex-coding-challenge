<?php


namespace kollex\Dataprovider\Assortment;


interface DataProviderInterface
{
    /**
     * @return Product[]
     */
    public function getProducts() : array;
}
