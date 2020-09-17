<?php

namespace kollex;

require 'vendor/autoload.php';

Use \kollex\Services\ProductExportService;
Use \kollex\Exporter\InternalFileExporter;
Use \kollex\Mapper\WholesalerBMapper;
use \kollex\Dataprovider\Assortment\JSONDataProvider;

$exporter = new InternalFileExporter('wholesaler_b.json');
$mapper = new WholesalerBMapper;
$provider = new JSONDataProvider;

$service = new ProductExportService($exporter, $mapper, $provider);
var_dump($service->export());