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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamps();
        });


        DB::table('clients')->insert([
            [
                'name' => 'pepe perez',
                'email' => 'pepe@gmail.com',
            ],
            [
                'name' => 'maria rodriguez',
                'email' => 'maria@gmail.com',
            ],
            [
                'name' => 'juan cortes',
                'email' => 'juan@gmail.com',
            ]

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
