<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('slug')->nullable();
            $table->string('cover_img');
            $table->string('room_number');
            $table->string('bed_number');
            $table->string('bath_number');
            $table->string('mq_value');
            $table->string('address');
            $table->float('lat')->nullable();
            $table->float('long')->nullable();
            $table->string('price');
            $table->boolean('visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
};