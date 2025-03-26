<?php

namespace App\Validations;

use App\Models\Client;
use App\Models\Product;
use App\Exceptions\ProductAvailabilityException;

// use Exception;

class ProductAvailabilityValidation implements ValidationInterface
{
    public function validate(Client $client, array $products): void
    {
        foreach ($products as $productData) {
            $product = Product::find($productData['product_id']);
            if (!$client->products->contains($product->id)) {
                throw new ProductAvailabilityException("El producto {$product->name} no está disponible para este cliente.");
            }
        }
    }
}