<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable()->constrained('clients')->onDelete('cascade');         
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade');         
            $table->timestamps();
        });


        DB::table('client_products')->insert([
            ['client_id' => 1, 'product_id' => 2],
            ['client_id' => 2, 'product_id' => 1],
            ['client_id' => 3, 'product_id' => 3],
            ['client_id' => 1, 'product_id' => 1],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client__products');
    }
};
