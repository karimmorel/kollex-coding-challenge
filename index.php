<?php

namespace kollex;

require 'vendor/autoload.php';

Use \kollex\Services\ProductExportService;
Use \kollex\Exporter\InternalFileExporter;
Use \kollex\Mapper\WholesalerAMapper;
Use \kollex\Mapper\WholesalerBMapper;
use \kollex\Dataprovider\Assortment\JSONDataProvider;

$exporter = new InternalFileExporter('wholesaler_b.json');
$mapper = new WholesalerBMapper;
$provider = new JSONDataProvider;

$service = new ProductExportService($exporter, $mapper, $provider);
$service->export();

$service->setSource(new InternalFileExporter('wholesaler_a.csv'))->setMapper(new WholesalerAMapper);
echo $service->export()->display();