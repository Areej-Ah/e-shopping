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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('dep_name_ar');
            $table->string('dep_name_en');
            $table->string('icon')->nullable();
            $table->longtext('description_ar')->nullable();
            $table->longtext('description_en')->nullable();
            $table->string('keyword')->nullable();
            $table->integer('active')->default(1);
            $table->unsignedBigInteger('parent')->nullable();
            $table->foreign('parent')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
