<?php

namespace App\Validations;

use App\Models\Client;

interface ValidationInterface
{
    public function validate(Client $client, array $products): void;
}

?>