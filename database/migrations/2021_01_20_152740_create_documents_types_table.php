<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('abbreviated', 10)->nullable();
            $table->string('description', 255)->nullable();
            $table->boolean('active')->default(false); 
            $table->boolean('required')->default(false);  
            $table->unsignedBigInteger('person_type_id')->nullable();
            $table->string('guid')->nullable();
            $table->timestamps();
            $table->foreign('person_type_id')->references('id')->on('persons_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents_types');
    }
}
