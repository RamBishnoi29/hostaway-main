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
        // Schema::create('listings', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('author');
        //     $table->string('title');
        //     $table->string('content')->nullable();
        //     $table->string('type')->nullable();
        //     $table->string('no_of_tenants')->nullable();
        //     $table->string('no_of_rooms')->nullable();
        //     $table->string('no_of_beds')->nullable();
        //     $table->string('no_of_bedrooms');
        //     $table->string('no_of_bathrooms');
        //     $table->string('size');
        //     $table->string('unit_size')->nullable();
        //     $table->string('co_host_user')->nullable();
        //     $table->string('slug')->nullable();
        //     $table->string('status')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
