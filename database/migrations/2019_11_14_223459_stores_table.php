<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('admin_id')->nullable()->default(null);
            $table->string('order_id');
            $table->string('item_type');
            $table->string('description');
            $table->integer('qty');
            $table->integer('qty_received')->default(0);
            $table->decimal('price')->default(0.00);
            $table->decimal('total')->default(0.00);
            $table->timestamp('placed_at')->nullable()->default(null);
            $table->timestamp('completed_at')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
