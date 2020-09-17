<?php

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