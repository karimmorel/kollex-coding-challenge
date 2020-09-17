<?php

/**
 * Mappers are here to convert the wholesaler's data representation into our's
 * 
 * If we have a new wholesaler with a specific data representation for it's products, we will only have to add a new mapper
 * 
 * To keep it simple, they are all in the Mapper folder, 
 * but I think an improvement we can add would be to specify a little more the path of Mappers related to product (Product/WholesalerAMapper.php)
 * Later, there must be other types of mappers for users or anything else.
 */

namespace kollex\Mapper;

abstract class AbstractMapper {
    static public $productUnits = array(
        'liter' => 'LT',
        'gram' => 'GR'
    );

    static public $baseProductPackaging = array(
        'bottle' => 'BO',
        'can' => 'CN'
    );

    static public $productPackaging = array(
        'bottle' => 'BO',
        'box' => 'BX',
        'case' => 'CA'
    );

    abstract public function map() : iterable;
}