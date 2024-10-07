<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('enterprise_types', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('उद्यम प्रकारहरू');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enterprise_types');
    }
};
