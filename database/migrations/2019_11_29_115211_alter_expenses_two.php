<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterExpensesTwo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->decimal('travel_uk')->nullable()->default(0.00)->change();
            $table->decimal('subsistence_uk')->nullable()->default(0.00)->change();
            $table->decimal('travel_overseas')->nullable()->default(0.00)->change();
            $table->decimal('subsistence_overseas')->nullable()->default(0.00)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expenses', function (Blueprint $table) {
            //
        });
    }
}
