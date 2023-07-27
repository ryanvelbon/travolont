<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->unsignedTinyInteger('order')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
