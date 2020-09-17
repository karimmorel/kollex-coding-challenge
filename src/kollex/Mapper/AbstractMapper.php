<?php

namespace kollex\Mapper;

abstract class AbstractMapper {
    protected $productUnits = array(
        'liter' => 'LT',
        'gram' => 'GR'
    );

    protected $baseProductPackaging = array(
        'bottle' => 'BO',
        'can' => 'CN'
    );

    protected $productPackaging = array(
        'bottle' => 'BO',
        'box' => 'BX',
        'case' => 'CA'
    );

    abstract public function map() : iterable;
}