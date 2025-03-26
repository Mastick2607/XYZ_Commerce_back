<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Exceptions\StockValidationException;
use App\Exceptions\ProductAvailabilityException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $orderService;

    // Inyectar el servicio en el constructor
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    
    public function index()
    {
        //
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
        $client = Client::find($request->client_id);
        $products = $request->products;


        try {
        
            $order = $this->orderService->createOrder($client, $products);

            // Retornar una respuesta exitosa
            return response()->json([
                'message' => 'Orden creada exitosamente',
                'order_id' => $order->id,
            ], 201);
        } catch (StockValidationException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        } catch (ProductAvailabilityException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear la orden.',
            ], 500);
        }
    
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
