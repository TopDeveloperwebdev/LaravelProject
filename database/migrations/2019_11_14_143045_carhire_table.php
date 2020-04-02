<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarhireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_hire', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('admin_id')->nullable()->default(null);
            $table->string('order_id');
            $table->string('name');
            $table->string('email');
            $table->string('department');
            $table->string('telephone');
            $table->string('driver1_name');
            $table->string('driver2_name')->nullable()->default(null);
            $table->string('driver3_name')->nullable()->default(null);
            $table->date('start_date');
            $table->date('finish_date');
            $table->time('start_time');
            $table->time('finish_time');
            $table->tinyInteger('collect')->default(0);
            $table->string('collect_other', 150)->nullable()->default(null);
            $table->tinyInteger('return')->default(0);
            $table->string('return_other', 150)->nullable()->default(null);
            $table->string('special')->nullable()->default(null);
            $table->tinyInteger('min_21')->default(0);
            $table->tinyInteger('valid_license')->default(0);
            $table->decimal('per_day')->default(null)->nullable();
            $table->decimal('days')->default(null)->nullable();
            $table->decimal('fees')->default(null)->nullable();
            $table->decimal('other')->default(null)->nullable();
            $table->decimal('total')->default(null)->nullable();
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
        Schema::dropIfExists('car_hire');
    }
}
