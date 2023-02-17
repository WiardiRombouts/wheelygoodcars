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
        Schema::create('occasion', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate');
            $table->string('brand');
            $table->string('model');
            $table->string('fuel')->nullable();
            $table->string('body')->nullable();
            $table->integer('seats')->nullable();
            $table->integer('doors')->nullable();
            $table->decimal('mileage')->nullable();
            $table->integer('production_year')->nullable();
            $table->integer('horsepower')->nullable();
            $table->string('transmission')->nullable();
            $table->integer('cilinders')->nullable();
            $table->integer('cilinder_capacity')->nullable();
            $table->integer('weight')->nullable();
            $table->string('color')->nullable();
            $table->string('description')->nullable();
            $table->decimal('price')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('sold');
            $table->integer('seller_id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occasion');
    }
};
