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
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sitename_ar');
			$table->string('sitename_en');
			$table->string('logo')->nullable();
			$table->string('icon')->nullable();
			$table->string('email')->nullable();
			$table->string('main_lang')->default('ar');
			$table->longtext('keywords')->nullable();
			$table->enum('status', ['open', 'close'])->default('open');
			$table->longtext('message_maintenance')->nullable();
            $table->longtext('description_en')->nullable();
            $table->longtext('description_ar')->nullable();
            $table->longtext('message_ar')->nullable();
            $table->longtext('message_en')->nullable();
            $table->longtext('about_ar')->nullable();
            $table->longtext('about_en')->nullable();
            $table->longtext('vision_ar')->nullable();
            $table->longtext('vision_en')->nullable();
            $table->longtext('objective_ar')->nullable();
            $table->longtext('objective_en')->nullable();
            $table->longtext('quality_policy_ar')->nullable();
            $table->longtext('quality_policy_en')->nullable();
            $table->longtext('corporate_mission_ar')->nullable();
            $table->longtext('corporate_mission_en')->nullable();
            $table->longtext('values_ar')->nullable();
            $table->longtext('values_en')->nullable();
            $table->string('location_ar')->nullable();
            $table->string('location_en')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('logo2')->nullable();
            $table->string('video')->nullable();
            $table->string('slogan_en');
            $table->string('slogan_ar');
            $table->string('employment_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
