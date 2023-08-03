<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('account_type');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            // profile columns
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->char('sex', 1)->nullable();
            $table->unsignedMediumInteger('nationality_id')->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar')->nullable();

            // foreign key constraints
            $table->foreign('nationality_id')->references('id')->on('countries');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
