<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonContactsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_contacts_type', function (Blueprint $table) {
            $table->id();
            $table->string('contact', 150);
            $table->unsignedBigInteger('contact_type_id')->nullable();
            $table->unsignedBigInteger('person_id')->nullable();
            $table->string('guid')->nullable();
            $table->timestamps();
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('contact_type_id')->references('id')->on('contacts_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_contacts_type');
    }
}
