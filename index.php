<?php

require 'vendor/autoload.php';


Use \kollex\Service\ProductExportService;
Use \kollex\Exporter\InternalFileExporter;
Use \kollex\Mapper\WholesalerAMapper;
Use \kollex\Mapper\WholesalerBMapper;
use \kollex\Dataprovider\Assortment\JSONDataProvider;


$exporter = new InternalFileExporter('wholesaler_a.csv');
$mapper = new WholesalerAMapper;
$provider = new JSONDataProvider;

$service = new ProductExportService($exporter, $mapper, $provider);
$service->export();

$service->setSource(new InternalFileExporter('wholesaler_b.json'))->setMapper(new WholesalerBMapper);
echo $service->export()->display();