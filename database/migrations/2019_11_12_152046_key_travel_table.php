<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KeyTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_travel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('order_id');
            $table->integer('admin_id')->nullable()->default(null);
            $table->string('type');
            $table->timestamp('placed_at')->nullable(true)->default(null);
            $table->timestamp('completed_at')->nullable(true)->default(null);
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
        Schema::dropIfExists('key_travel');
    }
}
