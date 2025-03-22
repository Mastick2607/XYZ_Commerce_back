<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    public function getAllClients()
    {
        
        return Client::all();
    }
}

