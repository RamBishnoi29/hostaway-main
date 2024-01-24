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
        Schema::create('hostaway_pricings', function (Blueprint $table) {
            $table->id();
            $table->integer('listing_id');
            $table->string('type_of_rent')->nullable();
            $table->string('host_fee')->nullable();
            $table->boolean('fixed_amount_check')->nullable();
            $table->string('fixed_amont')->nullable();
            $table->string('monthly_rent')->nullable();
            $table->string('night_price')->nullable();
            $table->json('extra_service_price')->nullable();
            $table->json('seasonal_price')->nullable();
            $table->string('cleaning_fee')->nullable();
            $table->string('pet_fee')->nullable();
            $table->string('tax')->nullable();
            $table->string('security_deposit')->nullable();
            $table->boolean('additional_guest_allow')->nullable();
            $table->string('additional_guest_price')->nullable();
            $table->string('additional_no_of_guests')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
