<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCatalogueOrdersFileColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalogue_orders', function (Blueprint $table) {
            $table->string('file', 100)->nullable(true)->default(null)->after('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catalogue_orders', function (Blueprint $table) {
            $table->dropColumn('file');
        });
    }
}
