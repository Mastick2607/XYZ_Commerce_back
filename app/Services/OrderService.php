<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Validations\ValidationInterface;
use Illuminate\Support\Facades\DB;
use Exception;

class OrderService
{
    protected $validations;


    public function __construct(array $validations)
    {
        $this->validations = $validations;
    }

    public function createOrder(Client $client, array $products): Order
    {
        // Ejecutar todas las validaciones
        foreach ($this->validations as $validation) {
            $validation->validate($client, $products);
        }

        // Crear la orden
        DB::beginTransaction();
        try {
         
            $order = Order::create([
            'client_id' => $client->id,
            ]);

            foreach ($products as $productData) {
                $product = Product::find($productData['product_id']);
                
                Order_detail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $productData['quantity'],
                ]);
                // $orderDetail->save();

                $product->decrement('quantity', $productData['quantity']);
                // $product->stock -= $productData['quantity'];
                // $product->save();
            }

            DB::commit();
            return $order;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
