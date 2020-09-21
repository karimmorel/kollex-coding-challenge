<?php 

namespace kollex\Exception;

 class WrongFileToConverterException extends \Exception {

    public function __construct($message = 'The given file is not in a valid format.', $code = 0, Exception $previous = null) {

        parent::__construct($message, $code, $previous);
      }

 }