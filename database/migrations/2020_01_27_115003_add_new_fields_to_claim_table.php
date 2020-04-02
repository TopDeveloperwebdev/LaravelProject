<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToClaimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claim', function (Blueprint $table) {
            $table->string('item')->nullable();
            $table->string('field')->nullable();
            $table->string('value')->nullable();
            $table->dropColumn('start_date');
            $table->dropColumn('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claim', function (Blueprint $table) {
            //
        });
    }
}
