<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMosqueInformationProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mosque_information_providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mosques_id')->nullable();
            $table->char('provider_name',255)->nullable();
            $table->char('provider_identity',255)->nullable();
            $table->char('provider_signature',255)->nullable();
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
        Schema::dropIfExists('mosque_information_providers');
    }
}
