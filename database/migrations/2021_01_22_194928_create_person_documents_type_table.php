<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonDocumentsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_documents_type', function (Blueprint $table) {
            $table->id();
            $table->string('document', 150);
            $table->string('document_region', 5)->nullable();
            $table->unsignedBigInteger('document_type_id')->nullable();
            $table->unsignedBigInteger('person_id')->nullable();
            $table->string('guid')->nullable();
            $table->timestamps();
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('document_type_id')->references('id')->on('documents_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_documents_type');
    }
}
