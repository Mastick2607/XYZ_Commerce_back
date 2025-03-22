<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $clientService;


     public function __construct(ClientService $clientService)
     {
         $this->clientService = $clientService;
     }


    public function index()
    {
        $clients = $this->clientService->getAllClients();


        if ($clients->isEmpty()) {

            $data = [
                'mensaje' => 'No hay clientes disponibles.',
                'status' => 404 
            ];  

            return response()->json($data,404);     
        }
    
        return response()->json($clients);
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
