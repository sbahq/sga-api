<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('registration_code')->unique()->nullable();
            $table->bigInteger('sga_id')->unique()->nullable();
            $table->date('registration_date')->nullable();
            $table->date('date_in')->nullable();
            $table->date('date_out')->nullable();
            $table->unsignedBigInteger('individual_person_id');
            $table->string('guid')->nullable();
            $table->timestamps();
            $table->foreign('individual_person_id')->references('id')->on('individual_persons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memberships');
    }
}
