<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_persons', function (Blueprint $table) {
            $table->id();
            $table->string('alias',50)->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender',1)->nullable();
            $table->unsignedBigInteger('person_id');
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
        Schema::dropIfExists('individual_persons');
    }
}
