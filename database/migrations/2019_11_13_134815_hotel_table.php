<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('location');
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->integer('persons');
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
        Schema::dropIfExists('hotel');
    }
}
