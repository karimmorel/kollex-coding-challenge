<?php 

namespace kollex\Exception;

 class FileDoesntExistsWhileExportingException extends \Exception {

    public function __construct($message = 'The file doesn\'t exists and the export failed.', $code = 404, Exception $previous = null) {

        parent::__construct($message, $code, $previous);
      }

 }