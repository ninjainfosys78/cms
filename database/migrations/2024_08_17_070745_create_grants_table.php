<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('grants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fisical_year_id')->comment('आर्थिक वर्ष')->nullable()->constrained();
            $table->foreignId('grant_type_id')->comment('अनुदानको प्रकार')->constrained()->cascadeOnDelete();
            $table->foreignId('grant_office_id')->comment('अनुदान दिने संस्था')->nullable()->constrained();
            $table->foreignId('grant_program_id')->comment('अनुदान कार्यक्रम')->nullable()->constrained();
            $table->double('grant_amount', 15, 2)->comment('अनुदान रकम')->default(0);
            $table->string('grant_for')->comment('कसको लागि अनुदान?');
            $table->string('other')->comment('अन्य')->nullable();
            $table->text('main_activity')->comment('मुख्य कार्य')->nullable();
            $table->text('remarks')->comment('कैफियत')->nullable();
            $table->foreignId('user_id')->comment('डाटा हाल्ने व्यक्ति')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grants');
    }
};
