<?php

namespace App\Validations;

use App\Models\Client;
use App\Models\Product;
use App\Exceptions\StockValidationException;
// use Exception;

class StockValidation implements ValidationInterface
{
    public function validate(Client $client, array $products): void
    {
        foreach ($products as $productData) {
            $product = Product::find($productData['product_id']);
            if ($product->quantity < $productData['quantity']) {
                throw new StockValidationException("No hay suficiente stock para el producto {$product->name}.");
            }
        }
    }
}