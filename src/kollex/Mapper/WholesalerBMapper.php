<?php

namespace kollex\Mapper;

Use \kollex\Mapper\Mapper;

class WholesalerBMapper extends Mapper {

    private $data;

    public function setData(iterable $data)
    {
        $this->data = $data;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function map() : iterable
    {
        $mappedData = array();
    
        foreach ($this->data['data'] as $wholesalerProduct)
        {
            $product = array();
            $product['id'] = $wholesalerProduct['PRODUCT_IDENTIFIER'];
            $product['gtin'] = $wholesalerProduct['EAN_CODE_GTIN'];
            $product['manufacturer'] = $wholesalerProduct['BRAND'];
            $product['name'] = $wholesalerProduct['NAME'];
            $product['packaging'] = $this->productPackaging[strtolower($wholesalerProduct['PACKAGE'])];
            $product['baseProductPackaging'] = $this->baseProductPackaging[strtolower($wholesalerProduct['VESSEL'])];
            $product['baseProductAmount'] = (float) $wholesalerProduct['LITERS_PER_BOTTLE'];
            $product['baseProductQuantity'] = (int) $wholesalerProduct['BOTTLE_AMOUNT'];
            $product['baseProductUnit'] = $this->productUnits['liter'];

            // $product['ADDITIONAL_INFO'] = $wholesalerProduct['ADDITIONAL_INFO'];

            $mappedData[] = $product;
        }

        return $mappedData;
    }
}