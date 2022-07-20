<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('headerImage');
            $table->string('name');
            $table->string('timeAndNight');
            $table->string('date');
            $table->string('listPrice');
            $table->string('withPrice');
            $table->string('defaultImage');
            $table->string('departureDate');
            $table->string('returnDate');
            $table->string('flying');
            $table->string('included');
            $table->string('tours');
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
        Schema::dropIfExists('data');
    }
};
