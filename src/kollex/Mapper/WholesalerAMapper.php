<?php

namespace kollex\Mapper;

Use \kollex\Mapper\Mapper;

class WholesalerAMapper extends Mapper {

    private $data;

    // Using a different mapping than the mapping set in the abstract class for the products using
    protected $productUnits = array(
        'l' => 'LT',
        'g' => 'GR'
    );

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
        unset($this->data[0]);

        foreach ($this->data as $wholesalerProduct)
        {
            // Exploding the "packaging product" case
            $packagingProduct = explode(' ', $wholesalerProduct[5]);
            $unit = substr($wholesalerProduct[8], -1);

            $product = array();
            $product['id'] = $wholesalerProduct[0];
            $product['gtin'] = $wholesalerProduct[1];
            $product['manufacturer'] = $wholesalerProduct[2];
            $product['name'] = $wholesalerProduct[3];
            $product['baseProductPackaging'] = $this->baseProductPackaging[strtolower($wholesalerProduct[7])];
            $product['baseProductAmount'] = (float) substr($wholesalerProduct[8], 0, -1);
            $product['baseProductUnit'] = $this->productUnits[strtolower($unit)];


            if($wholesalerProduct[5] == 'single')
            {
                $product['packaging'] = $this->productPackaging['bottle'];
                $product['baseProductQuantity'] = 1;
            }
            else
            {
                $product['packaging'] = $this->productPackaging[strtolower($packagingProduct[0])];
                $product['baseProductQuantity'] = (int) $packagingProduct[1];
            }

            $mappedData[] = $product;
        }

        return $mappedData;
    }
}