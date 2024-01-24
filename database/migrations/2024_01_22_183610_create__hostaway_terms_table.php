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
        Schema::create('hostaway_terms', function (Blueprint $table) {
            $table->id();
            $table->integer('listing_id');
            $table->integer('min_days')->nullable();
            $table->integer('max_days')->nullable();
            $table->string('check_in_time')->nullable();
            $table->string('check_in_time_end')->nullable();
            $table->string('check_out_time')->nullable();
            $table->boolean('smoking_allowed')->nullable();
            $table->boolean('pets_allowed')->nullable();
            $table->boolean('party_allowed')->nullable();
            $table->boolean('safe_for_children')->nullable();
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hostaway_terms');
    }
};
