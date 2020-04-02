<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCateringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catering', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('order_id');
            $table->string('event_name');
            $table->date('event_date');
            $table->tinyInteger('on_campus')->default(0);
            $table->string('building_name')->nullable()->default('name');
            $table->string('room')->nullable()->default('name');
            $table->time('campus_refreshment_am1')->nullable()->default(null);
            $table->integer('campus_refreshment_am1_delegates')->nullable()->default(null);
            $table->time('campus_refreshment_am2')->nullable()->default(null);
            $table->integer('campus_refreshment_am2_delegates')->nullable()->default(null);
            $table->time('campus_lunch')->nullable()->default(null);
            $table->integer('campus_lunch_delegates')->nullable()->default(null);
            $table->time('campus_refreshment_pm1')->nullable()->default(null);
            $table->integer('campus_refreshment_pm1_delegates')->nullable()->default(null);
            $table->time('campus_refreshment_pm2')->nullable()->default(null);
            $table->integer('campus_refreshment_pm2_delegates')->nullable()->default(null);
            $table->time('campus_dinner')->nullable()->default(null);
            $table->integer('campus_dinner_delegates')->nullable()->default(null);
            $table->tinyInteger('astor')->default(0);
            $table->time('astor_lunch')->nullable()->default(null);
            $table->integer('astor_lunch_delegates')->nullable()->default(null);
            $table->time('astor_dinner')->nullable()->default(null);
            $table->integer('astor_dinner_delegates')->nullable()->default(null);
            $table->tinyInteger('main')->default(0);
            $table->time('main_breakfast')->nullable()->default(null);
            $table->integer('main_breakfast_delegates')->nullable()->default(null);
            $table->time('main_lunch')->nullable()->default(null);
            $table->integer('main_lunch_delegates')->nullable()->default(null);
            $table->time('main_dinner')->nullable()->default(null);
            $table->integer('main_dinner_delegates')->nullable()->default(null);
            $table->tinyInteger('buffet')->default(0);
            $table->time('buffet_lunch')->nullable()->default(null);
            $table->integer('buffet_lunch_delegates')->nullable()->default(null);
            $table->tinyInteger('private')->default(0);
            $table->time('private_breakfast')->nullable()->default(null);
            $table->integer('private_breakfast_delegates')->nullable()->default(null);
            $table->time('private_lunch')->nullable()->default(null);
            $table->integer('private_lunch_delegates')->nullable()->default(null);
            $table->time('private_dinner')->nullable()->default(null);
            $table->integer('private_dinner_delegates')->nullable()->default(null);
            $table->string('fresh_quote')->nullable()->default(null);
            $table->string('fresh_contract')->nullable()->default(null);
            $table->string('jacksons_quote')->nullable()->default(null);
            $table->string('jacksons_contract')->nullable()->default(null);
            $table->string('edgbaston_quote')->nullable()->default(null);
            $table->string('edgbaston_contract')->nullable()->default(null);
            $table->string('astor_quote')->nullable()->default(null);
            $table->string('astor_contract')->nullable()->default(null);
            $table->timestamp('placed_at')->nullable()->default(null);
            $table->timestamp('completed_at')->nullable()->default(null);
            $table->string('special')->nullable()->default(null);
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
        Schema::dropIfExists('catering');
    }
}
