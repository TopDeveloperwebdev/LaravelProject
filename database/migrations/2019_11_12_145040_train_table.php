<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TrainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('from_station');
            $table->string('to_station');
            $table->date('departure_date');
            $table->time('departure_time');
            $table->date('return_date')->nullable()->default(null);
            $table->time('return_time')->nullable()->default(null);
            $table->tinyInteger('open_return')->default(0);
            $table->string('ltc_14')->nullable()->default(null);
            $table->string('ltc_16')->nullable()->default(null);
            $table->string('key_travel_id')->default(null)->nullable();
            $table->decimal('value', 15, 2)->default(0.00);
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
        Schema::dropIfExists('train');
    }
}
