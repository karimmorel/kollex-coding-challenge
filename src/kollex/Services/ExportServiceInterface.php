<?php

namespace kollex\Services;

use kollex\Exporter\AbstractExporter;
use kollex\Mapper\AbstractMapper;
use \kollex\Dataprovider\Assortment\DataProvider;

/**
 * The elements of the application are not hardly coupled
 * So we can imagine other Exporting services which will export other type of data, folowing the same structure
 */

interface ExportServiceInterface {

    public function setSource(AbstractExporter $source);
    public function setMapper(AbstractMapper $mapper);
    public function setProvider(DataProvider $provider);

    public function export();
    public function display();
}