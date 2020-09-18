<?php

class WholesalerBMapperTest extends PHPUnit_Framework_TestCase {

    public function ifNoArraySentToMapper()
    {
        $mapper = new \kollex\Mapper\WholesalerBMapper;
        $mapper->map();
    }
}