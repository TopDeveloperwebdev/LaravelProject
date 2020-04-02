<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCatOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalogue_orders', function (Blueprint $table) {
            $table->timestamp('placed_at')->nullable()->default(null)->after('received_at');
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
            $table->dropColumn('placed_at');
        });
    }
}
