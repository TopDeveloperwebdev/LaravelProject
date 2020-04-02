<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('order_id');
            $table->integer('user_id');
            $table->integer('admin_id')->nullable()->default(null);
            $table->date('start_date');
            $table->string('description');
            $table->decimal('travel_uk')->default(0.00);
            $table->decimal('subsistence_uk')->default(0.00);
            $table->decimal('travel_overseas')->default(0.00);
            $table->decimal('subsistence_overseas')->default(0.00);
            $table->decimal('total')->default(0.00);
            $table->date('completed_at')->nullable()->default(null);
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
        Schema::dropIfExists('expenses');
    }
}
