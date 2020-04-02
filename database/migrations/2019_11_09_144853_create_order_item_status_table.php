<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->timestamps();
            $table->softDeletes();
        });

        /**
         * add statuses
         */
        DB::table('order_item_status')->insert([
            ['text' => 'Confirm', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'Reject', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'Ammend', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'Not Received', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item_status');
    }
}
