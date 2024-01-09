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
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE')->unique();
            $table->unsignedMediumInteger('city_id')->nullable();

            // business details (if applicable)
            $table->boolean('is_registered_biz')->default(false);
            $table->string('biz_name')->nullable();
            $table->string('biz_type')->nullable();
            $table->string('biz_reg_no')->nullable();
            $table->string('biz_address')->nullable();
            $table->string('biz_email')->nullable();
            $table->string('biz_phone')->nullable();
            $table->string('biz_website')->nullable();

            $table->text('feat_img')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('max_hours_per_day')->nullable();
            $table->unsignedTinyInteger('n_days_per_week')->nullable();
            $table->unsignedTinyInteger('min_stay_days')->nullable();
            $table->unsignedTinyInteger('max_stay_days')->nullable();
            $table->unsignedTinyInteger('n_meals_per_day')->nullable();
            $table->decimal('wage', 8, 2)->nullable();
            $table->string('currency', 3)->nullable();
            $table->string('accommodation')->nullable();

            $table->timestamps();

            // foreign key constraints
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('type_id')->references('id')->on('host_types');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hosts');
    }
};
