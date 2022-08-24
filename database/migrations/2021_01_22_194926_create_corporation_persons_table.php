<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporationPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporation_persons', function (Blueprint $table) {
            $table->id();
            $table->string('fantasy_name', 150);
            $table->unsignedBigInteger('person_id')->nullable();
            $table->string('guid')->nullable();
            $table->timestamps();
            $table->foreign('person_id')->references('id')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corporation_persons');
    }
}
