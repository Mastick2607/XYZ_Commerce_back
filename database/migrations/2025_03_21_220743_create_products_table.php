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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();
        });

        
        DB::table('products')->insert([
            [
                'name' => 'tv',
                'quantity' => 10,
            ],
            [
                'name' => 'licuadora',
                'quantity' => 0,
            ],
            [
                'name' => 'portatil',
                'quantity' => 100,
            ]

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
