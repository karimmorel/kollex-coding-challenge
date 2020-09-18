<?php

class JSONConverterTest extends PHPUnit_Framework_TestCase {

    public function testIfFileNotResourceType()
    {
        $converter = new \kollex\Converter\JSONConverter('data/wholesaler_a.csv');
        $converter->convert();
    }

    public function testIfNoFileSent()
    {
        $converter = new \kollex\Converter\JSONConverter();
        $converter->convert();
    }
}