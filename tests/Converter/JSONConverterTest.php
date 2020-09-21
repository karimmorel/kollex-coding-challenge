<?php

use PHPUnit\Framework\TestCase;
use kollex\Exception\WrongFileToConverterException;

class JSONConverterTest extends TestCase {

    public function testIfFileNotResourceType()
    {
        $this->expectException(WrongFileToConverterException::class);
        $converter = new \kollex\Converter\JSONConverter('data/wholesaler_a.csv');
        $converter->convert();
    }

}