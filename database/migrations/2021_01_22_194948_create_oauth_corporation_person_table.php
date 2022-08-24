<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOAuthCorporationPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_corporation_person', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corporation_person_id');
            $table->unsignedBigInteger('system_id');
            $table->string('api_token'); 
            $table->text('open_token');
            $table->boolean('active')->default(true); 
            $table->string('guid')->nullable(); 
            $table->timestamps();
            $table->foreign('corporation_person_id')->references('id')->on('corporation_persons');
            $table->foreign('system_id')->references('id')->on('systems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oauth_corporation_person');
    }
}
