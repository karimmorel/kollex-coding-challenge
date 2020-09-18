<?php

class InternalFileExporterTest extends PHPUnit_Framework_TestCase {

    public function testExportIfNoFileSent()
    {
          $exporter = new \kollex\Exporter\InternalFileExporter('');
          $exporter->exportSource();
    }

    public function testExportIfFileDoesntExists()
    {
        $exporter = new \kollex\Exporter\InternalFileExporter('notexistingfile.csv');
        $exporter->exportSource();
    }

    public function testExportIfFileSourceNotAString()
    {
        $exporter = new \kollex\Exporter\InternalFileExporter(array('wholesaler_a.csv'));
        $exporter->exportSource();
    }
}