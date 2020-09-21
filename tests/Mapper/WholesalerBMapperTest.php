<?php

use PHPUnit\Framework\TestCase;

class WholesalerBMapperTest extends TestCase {

    public function testIfNoArraySentToMapper()
    {
        $this->expectException(Error::class);
        $mapper = new \kollex\Mapper\WholesalerBMapper;
        $mapper->map();
    }
}