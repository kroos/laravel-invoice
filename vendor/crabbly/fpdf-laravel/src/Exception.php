<?php
namespace Crabbly\FPDF;

class Exception extends \RuntimeException
{
    public function __construct($message = '', $code = 0, Exception $previous = null) {
        parent::__construct('Fpdf Error: ' . $message, $code = 0, $previous);
    }
}