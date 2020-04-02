<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FlightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('from');
            $table->string('to');
            $table->date('departure_date');
            $table->time('departure_time');
            $table->date('return_date');
            $table->time('return_time');
            $table->string('traveller_name');
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
        Schema::dropIfExists('flight');
    }
}
