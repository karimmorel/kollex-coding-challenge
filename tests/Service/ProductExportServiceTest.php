<?php

use PHPUnit\Framework\TestCase;

class ProductExportServiceTest extends TestCase {

    public function testDisplayIfNeverExportedBefore()
    {
        $exporter = new \kollex\Exporter\InternalFileExporter('wholesaler_a.csv');
        $mapper = new \kollex\Mapper\WholesalerAMapper;
        $provider = new \kollex\DataProvider\Assortment\JSONDataProvider;
        $service = new \kollex\Service\ProductExportService($exporter, $mapper, $provider);

        $data = $service->display();

        $this->assertEquals($data, '[]');

    }

    // Testing when everything is going the right way
    public function testWorkingCase()
    {
        $mockedExporter = $this->getMockBuilder(\kollex\Exporter\InternalFileExporter::class)
        ->setMethods(['exportSource'])
        ->setConstructorArgs(array('wholesaler_a.csv'))
        ->getMock();

        $returnedArray = array(
            0 => array(
                'id',
                'ean',
                'manufacturer',
                'product',
                'description',
                'packaging product',
                'foo',
                'packaging unit',
                'amount per unit',
                'items on stock',
                'warehouse'
            ),
            1 => array(
                '18219821092',
                '309828029082908',
                'Drink Corp.',
                'Soda Drink, 12 * 1,01',
                'Lorem ipsum....',
                'case 12',
                'bar',
                'bottle',
                '1.0l',
                '123',
                'north'
            )
        );
 
        $mockedExporter->method('exportSource')->willReturn($returnedArray);

        $mapper = new \kollex\Mapper\WholesalerAMapper;
        $provider = new \kollex\DataProvider\Assortment\JSONDataProvider;
        $service = new \kollex\Service\ProductExportService($mockedExporter, $mapper, $provider);

        $data = $service->export()->display();

        // If the components are working the right way, I am expecting this result.
        $testedData = '[{"id":"18219821092","gtin":"309828029082908","manufacturer":"Drink Corp.","name":"Soda Drink, 12 * 1,01","baseProductPackaging":"BO","baseProductAmount":1,"baseProductUnit":"LT","packaging":"CA","baseProductQuantity":12}]';

        $this->assertEquals($data, $testedData);
    }
}