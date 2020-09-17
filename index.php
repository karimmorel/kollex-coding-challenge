<?php

namespace kollex;

require 'vendor/autoload.php';

Use \kollex\Services\ProductExportService;
Use \kollex\Exporter\InternalFileExporter;
Use \kollex\Mapper\WholesalerAMapper;

$exporter = new InternalFileExporter('wholesaler_a.csv');
$service = new ProductExportService($exporter, new WholesalerAMapper);
var_dump($service->export());