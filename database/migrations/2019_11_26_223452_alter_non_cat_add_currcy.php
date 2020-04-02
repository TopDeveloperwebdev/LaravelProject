<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNonCatAddCurrcy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('non_catalogue_orders', function (Blueprint $table) {
            $table->string('currency', 10);
            $table->string('contact_name')->nullable()->default(null)->change();
            $table->string('supplier_email')->nullable()->default(null)->change();
            $table->string('supplier_tel')->nullable()->default(null)->change();
            $table->string('file')->nullable()->default(null);
            $table->integer('status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('non_catalogue_orders', function (Blueprint $table) {
            $table->dropColumn('currency');
            $table->dropColumn('file');
            // $table->dropColumn('status_id');
        });
    }
}
