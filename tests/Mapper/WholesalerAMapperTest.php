<?php

use PHPUnit\Framework\TestCase;

class WholesalerAMapperTest extends TestCase {

    public function testIfNoArraySentToMapper()
    {
        $this->expectException(Error::class);
        $mapper = new \kollex\Mapper\WholesalerAMapper;
        $mapper->map();
    }
}