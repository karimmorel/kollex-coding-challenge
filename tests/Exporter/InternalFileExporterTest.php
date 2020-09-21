<?php

use PHPUnit\Framework\TestCase;
use kollex\Exception\FileDoesntExistsWhileExportingException;

class InternalFileExporterTest extends TestCase {

    public function testExportIfNoFileSent()
    {
          $this->expectException(FileDoesntExistsWhileExportingException::class);
          $exporter = new \kollex\Exporter\InternalFileExporter('');
          $exporter->exportSource();
    }

    public function testExportIfFileDoesntExists()
    {
        $this->expectException(FileDoesntExistsWhileExportingException::class);
        $exporter = new \kollex\Exporter\InternalFileExporter('notexistingfile.csv');
        $exporter->exportSource();
    }

    public function testExportIfFileSourceNotAString()
    {
        $this->expectException(FileDoesntExistsWhileExportingException::class);
        $exporter = new \kollex\Exporter\InternalFileExporter(array('wholesaler_a.csv'));
        $exporter->exportSource();
    }
}