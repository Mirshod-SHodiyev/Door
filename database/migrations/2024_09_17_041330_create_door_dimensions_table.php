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
            $table->string('service_fee');
            $table->string('has_top_section');
            $table->string('opening_side');
            $table->string('door_frame');
            $table->float('width'); 
            $table->float('height'); 
            $table->string('material');
        
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
