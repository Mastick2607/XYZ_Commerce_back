<?php

namespace App\Exceptions;

use Exception;

class StockValidationException extends Exception
{
    public function __construct($message = "No hay suficiente stock para el producto.")
    {
        parent::__construct($message);
    }
}