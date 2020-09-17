<?php

namespace kollex\Converter;

interface ConverterInterface {
    public function convert() : iterable;
}