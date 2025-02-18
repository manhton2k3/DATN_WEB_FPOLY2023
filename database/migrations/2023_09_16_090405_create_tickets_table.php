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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_seat');
            $table->unsignedBigInteger('showtime_id');
            $table->unsignedBigInteger('bill_id');
            $table->integer('price');
            $table->dateTime('time');
            $table->timestamps();
            $table->foreign('id_seat')->references('id')->on('seats');
            $table->foreign('showtime_id')->references('id')->on('showtimes');
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
