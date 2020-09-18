<?php

class ProductExportServiceTest extends PHPUnit_Framework_TestCase {

    public function testExportIfExporterNull()
    {
        $exporter = null;
        $mapper = new \kollex\Mapper\WholesalerAMapper;
        $provider = new \kollex\DataProvider\Assortment\JSONDataProvider;
        $service = new \kollex\Service\ProductExportService($exporter, $mapper, $provider);

        $service->export();
    }

    public function testExportIfMapperNull()
    {
        $exporter = new \kollex\Exporter\InternalFileExporter('wholesaler_a.csv');
        $mapper = null;
        $provider = new \kollex\DataProvider\Assortment\JSONDataProvider;
        $service = new \kollex\Service\ProductExportService($exporter, $mapper, $provider);

        $service->export();
    }

    public function testExportIfProviderNull()
    {
        $exporter = new \kollex\Exporter\InternalFileExporter('wholesaler_a.csv');
        $mapper = new \kollex\Mapper\WholesalerAMapper;
        $provider = null;
        $service = new \kollex\Service\ProductExportService($exporter, $mapper, $provider);

        $service->export();
    }

    public function testDisplayIfNeverExportedBefore()
    {
        $exporter = new \kollex\Exporter\InternalFileExporter('wholesaler_a.csv');
        $mapper = new \kollex\Mapper\WholesalerAMapper;
        $provider = new \kollex\DataProvider\Assortment\JSONDataProvider;
        $service = new \kollex\Service\ProductExportService($exporter, $mapper, $provider);

        $service->display();
    }
}