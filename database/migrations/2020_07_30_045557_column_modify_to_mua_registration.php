<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColumnModifyToMuaRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mua_registration', function (Blueprint $table) {
             $table->string('depart', 191);
             $table->renameColumn('subject', 'result');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mua_registration', function (Blueprint $table) {
          $table->dropColumn('depart');
          $table->dropColumn('result');
        });
    }
}
