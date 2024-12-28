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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->text('customers_info');
            $table->text('extra_info')->nullable();
            $table->string('phone_number', 20);
            $table->float('width'); 
            $table->float('height'); 
            $table->float('door_leaf');
            $table->foreignId('door_types_id')->constrained();
            $table->foreignId('door_dimensions_id')->constrained();
            $table->foreignId('colors_id')->constrained();
            $table->foreignId('door_additions_id')->constrained();
            $table->foreignId('door_extras_id')->constrained();
            $table->foreignId('knobs_id')->constrained();
            $table->foreignId('door_frames_id')->constrained();
            $table->foreignId('user_id')->constrained() ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
