<?php

class CSVConverterTest extends PHPUnit_Framework_TestCase {

    public function testIfFileNotResourceType()
    {
        $converter = new \kollex\Converter\CSVConverter('data/wholesaler_a.csv');
        $converter->convert();
    }

    public function testIfNoFileSent()
    {
        $converter = new \kollex\Converter\CSVConverter();
        $converter->convert();
    }
}