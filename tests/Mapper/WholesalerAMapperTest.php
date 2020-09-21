<?php

use PHPUnit\Framework\TestCase;

class WholesalerAMapperTest extends TestCase {

    public function testIfNoArraySentToMapper()
    {
        $this->expectException(Exception::class);
        $mapper = new \kollex\Mapper\WholesalerAMapper;
        $mapper->map();
    }
}