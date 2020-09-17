<?php

/**
 * The Converters are going to convert the file's data into exploitable data for the application depending on the type of the file (json, csv...)
 * If we want to hanle a new type of file, we just need to add a new Converter and to list it in the AbstractExporter file
 */

namespace kollex\Converter;

interface ConverterInterface {
    public function convert() : iterable;
}