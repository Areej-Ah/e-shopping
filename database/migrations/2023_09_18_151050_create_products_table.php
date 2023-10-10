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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('photo')->nullable();
            $table->longtext('content')->nullable();


            $table->integer('stock')->default(0);
            $table->decimal('price',5,2)->default(0);

            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();


            $table->date('start_offer_at')->nullable();
            $table->date('end_offer_at')->nullable();
            $table->decimal('price_offer',5,2)->default(0);


            $table->enum('status',['pending','refused','active'])->default('pending');
            $table->longtext('reason')->nullable();

            $table->unsignedBigInteger('department_id')->nullable();

            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
            $table->longtext('other_data')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
