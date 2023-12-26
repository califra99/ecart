<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('nation_id');
            $table->boolean('newsletter')->default(0);
            $table->boolean('invoice')->default(0);
            $table->string('vat_number', 11);
            $table->string('fiscal_code', 16);
            $table->boolean('privacy')->default(0);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('nation_id')->references('id')->on('nations')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
