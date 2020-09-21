<?php

use PHPUnit\Framework\TestCase;
use kollex\Exception\WrongFileToConverterException;

class CSVConverterTest extends TestCase {

    public function testIfFileNotResourceType()
    {
        $this->expectException(WrongFileToConverterException::class);
        $converter = new \kollex\Converter\CSVConverter('data/wholesaler_a.csv');
        $converter->convert();
    }

}