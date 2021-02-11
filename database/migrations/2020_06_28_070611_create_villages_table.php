<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('division_id');
            $table->bigInteger('district_id');
            $table->bigInteger('upazilla_id');
            $table->bigInteger('union_id');
            $table->char('name', 100);
            $table->char('bn_name', 100);
            $table->char('url', 100);
            $table->char('postcode', 10);
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
        Schema::dropIfExists('villages');
    }
}
