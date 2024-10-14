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
        Schema::create('item_lower_uniforms', function (Blueprint $table) {
            $table->id();
            $table->string('Department');
            $table->string('Course'); 
            $table->string('Gender'); 
            $table->string('Type');
            $table->string('Body');
            $table->string('Size');
            $table->integer('Stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_lower_uniforms');
    }
};
