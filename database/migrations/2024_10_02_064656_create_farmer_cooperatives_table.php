<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('farmer_cooperatives', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable()->unique();
            $table->string('name');
            $table->string('registration_no')->nullable();
            $table->string('vat_pan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_cooperatives');
    }
};
