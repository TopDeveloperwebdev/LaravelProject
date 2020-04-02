<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTrainTableOne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('train', function (Blueprint $table) {
            $table->dropColumn('ltc_14');
            $table->dropColumn('ltc_16');
        });

        Schema::table('train', function (Blueprint $table) {
            $table->tinyInteger('ltc_14')->default(0);
            $table->tinyInteger('ltc_16')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('train', function (Blueprint $table) {
            //
        });
    }
}
