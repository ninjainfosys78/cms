<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cooperative_people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cooperative_id')->comment('सहकारी')->constrained()->cascadeOnDelete();
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

    public function down()
    {
        Schema::dropIfExists('cooperative_people');
    }
};
