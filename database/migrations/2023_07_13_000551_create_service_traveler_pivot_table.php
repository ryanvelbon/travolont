<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_traveler', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('traveler_id')->constrained()->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_traveler');
    }
};
