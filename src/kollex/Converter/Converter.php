<?php

namespace kollex\Converter;

interface Converter {
    public function convert() : iterable;
}