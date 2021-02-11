<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMosquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mosques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('mosques_name',255)->nullable();
            $table->char('mosques_reg_code',255)->nullable();
            $table->integer('mosques_establishment_year')->nullable();
            $table->double('mosques_size', 8, 2)->nullable();
            $table->integer('mosques_structure')->nullable();
            $table->integer('mosques_type')->nullable();
            $table->integer('waktiya_prayer_average')->nullable();
            $table->integer('jumma_prayer_average')->nullable();
            $table->boolean('women_prayer_facilities')->nullable();
            $table->integer('waktiya_women_prayer_average')->nullable();
            $table->integer('jumma_women_prayer_average')->nullable();
            $table->boolean('mosques_corridor')->nullable();
            $table->boolean('electricity_facilities')->nullable();
            $table->char('water_facilities',255)->nullable();
            $table->boolean('toilet_facilities')->nullable();
            $table->boolean('gas_facilities')->nullable();
            $table->integer('region')->nullable();
            $table->integer('district')->nullable();
            $table->integer('upazila')->nullable();
            $table->integer('union')->nullable();
            $table->integer('village')->nullable();
            $table->integer('post_code')->nullable();
            $table->boolean('historically_important_mosjid')->nullable();
            $table->integer('created_by')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('mosques');
    }
}
