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
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->comment('उद्यमको आइडी')->nullable()->unique();
            $table->foreignId('enterprise_type_id')->comment('उद्यम प्रकारहरू')->constrained();
            $table->string('name')->comment('नाम');
            $table->string('vat_pan')->comment('भ्याट प्यान')->nullable();
            $table->foreignId('province_id')->comment('प्रदेश')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('district_id')->comment('जिल्ला')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('local_body_id')->comment('पालिका')->nullable()->constrained()->nullOnDelete();
            $table->integer('ward_no')->comment('वार्ड')->nullable();
            $table->string('village')->comment('गाउ')->nullable();
            $table->string('tole')->comment('टोल')->nullable();
            $table->foreignId('user_id')->comment('डाटा हाल्ने व्यक्ति')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enterprises');
    }
};
