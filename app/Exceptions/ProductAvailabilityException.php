<?php

namespace App\Exceptions;

use Exception;

class ProductAvailabilityException extends Exception
{
    public function __construct($message = "El producto no está disponible para este cliente.")
    {
        parent::__construct($message);
    }
}