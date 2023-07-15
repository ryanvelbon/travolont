<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hosts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->unique();
            $table->unsignedMediumInteger('city_id')->nullable();
            $table->string('website')->nullable();
            $table->unsignedTinyInteger('max_hours_per_day')->nullable();
            $table->unsignedTinyInteger('n_days_per_week')->nullable();
            $table->unsignedTinyInteger('min_stay_days')->nullable();
            $table->unsignedTinyInteger('max_stay_days')->nullable();
            $table->timestamps();

            // foreign key constraints
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hosts');
    }
};
