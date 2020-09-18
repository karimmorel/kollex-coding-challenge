<?php

class WholesalerAMapperTest extends PHPUnit_Framework_TestCase {

    public function ifNoArraySentToMapper()
    {
        $mapper = new \kollex\Mapper\WholesalerAMapper;
        $mapper->map();
    }
}