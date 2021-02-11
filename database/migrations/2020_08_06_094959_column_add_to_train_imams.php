<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColumnAddToTrainImams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('train_imams', function (Blueprint $table) {
            $table->integer('status')->comment ="1= Pending, 2= Approved, 3= Cancel, 4=Delete, 5=Completed, 6= Running";
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('train_imams', function (Blueprint $table) {
            //
        });
    }
}
