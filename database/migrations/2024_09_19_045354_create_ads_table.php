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
            $table->float('discount')->default(0); 
            $table->integer('thickness');
            $table->foreignId('has_top_sections_id')->constrained('has_top_sections');
            $table->foreignId('frames_id')->constrained();
            $table->foreignId('door_types_id')->constrained();
            $table->foreignId('door_dimensions_id')->constrained();
            $table->foreignId('materials_id')->constrained();
            $table->foreignId('colors_id')->constrained();
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
