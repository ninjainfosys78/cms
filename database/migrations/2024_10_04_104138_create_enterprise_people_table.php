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
        Schema::create('enterprise_people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enterprise_id')->comment('उद्यम')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('fisical_year_id')->comment('आर्थिक वर्ष')->nullable()->constrained()->nullOnDelete();
            $table->string('name')->comment('नाम');
            $table->string('phone')->comment('फोन')->nullable();
            $table->string('email')->comment('इमेल')->nullable();
            $table->string('designation')->comment('पद')->nullable();
            $table->integer('position')->comment('स्थान');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enterprise_people');
    }
};
