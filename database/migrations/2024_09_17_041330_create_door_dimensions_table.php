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
        Schema::create('door_dimensions', function (Blueprint $table) {
            $table->id();
            $table->boolean('service_fee')->default(false);
            $table->boolean('has_top_section')->default(false);
            $table->string('opening_side')->default('left');
            $table->float('width'); 
            $table->float('height'); 
            $table->string('material')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('door_dimensions');
    }
};
