<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonCatalogueOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_catalogue_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id', 100);
            $table->integer('user_id');
            $table->string('item_no');
            $table->string('supplier');
            $table->string('description', 100);
            $table->integer('qty');
            $table->decimal('price', 15, 2);
            $table->decimal('total', 15, 2);
            $table->integer('admin_id')->nullable(true)->default(null);
            $table->timestamp('implemented_at')->nullable(true)->default(null);
            $table->timestamp('completed_at')->nullable(true)->default(null);
            $table->string('requisition_no')->nullable(true)->default(null);
            $table->integer('qty_received')->nullable(true)->default(null);
            $table->timestamp('received_at')->nullable(true)->default(null);
            $table->integer('expenditure_type_id')->default(null)->nullable();
            $table->string('item_url', 191)->nullable()->default(null);
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
        Schema::dropIfExists('non_catalogue_orders');
    }
}
