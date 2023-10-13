<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->string('category');
            $table->text('description');
            $table->decimal('price');
            $table->string('city');
            $table->string('state');
            $table->bigInteger('year_prod');
            $table->bigInteger('height');
            $table->bigInteger('width');
            $table->bigInteger('depth');
            $table->bigInteger('weight');
            $table->date('expiration_date');
            $table->string('delivery');
            $table->text('warranties');
            $table->string('trade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
