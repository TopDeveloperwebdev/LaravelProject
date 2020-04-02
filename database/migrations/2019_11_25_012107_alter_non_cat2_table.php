<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNonCat2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('non_catalogue_orders', function (Blueprint $table) {
            $table->tinyInteger('new_supplier')->default(0);
            $table->string('contact_name');
            $table->string('supplier_email');
            $table->string('supplier_tel', 20);
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
            $table->dropColumn('new_supplier');
            $table->dropColumn('contact_name');
            $table->dropColumn('supplier_email');
            $table->dropColumn('supplier_tel');
        });
    }
}
