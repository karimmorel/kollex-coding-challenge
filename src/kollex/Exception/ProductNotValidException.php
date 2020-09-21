<?php 

namespace kollex\Exception;

 class ProductNotValidException extends \Exception {

    public function __construct($message = 'The product has no valid data.', $code = 0, Exception $previous = null) {

        parent::__construct($message, $code, $previous);
      }

 }