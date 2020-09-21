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

        var_dump($data);

        $this->assertEquals($data);

    }
}