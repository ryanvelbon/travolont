<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * This migration adds an `order` column to the `cities` table.
 * 
 * By adding this column, we can easily control which cities are featured
 * and their order of appearance, directly from the database, making the
 * management of featured cities flexible and efficient.
 */

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->unsignedTinyInteger('order')->nullable();
        });

        // Update the order for cities that should be featured
        $featCities = [

            // Indonesia
            ['id' => 56226, 'order' => 2], // Bogor
            ['id' => 56263, 'order' => 3], // Denpasar
            ['id' => 56293, 'order' => 1], // Jakarta
            ['id' => 56827, 'order' => 3], // Kuta
            ['id' => 57061, 'order' => 1], // Yogyakarta

            // Malaysia
            ['id' => 76447, 'order' => 1], // George Town
            ['id' => 76497, 'order' => 1], // Kuala Lumpur
            ['id' => 76506, 'order' => 2], // Kuching
            ['id' => 76514, 'order' => 2], // Langkawi

            // Thailand
            ['id' => 106448, 'order' => 1], // Bangkok
            ['id' => 106474, 'order' => 1], // Chiang Mai
            ['id' => 106475, 'order' => 2], // Chiang Rai
            ['id' => 106497, 'order' => 2], // Hat Yai
            ['id' => 106540, 'order' => 2], // Krabi
        ];

        foreach ($featCities as $city) {
            DB::table('cities')
                ->where('id', $city['id'])
                ->update(['order' => $city['order']]);
        }
    }

    public function down(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};
