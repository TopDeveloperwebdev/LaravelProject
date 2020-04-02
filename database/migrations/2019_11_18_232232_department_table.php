<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('short_name');
            $table->string('code')->nullable()->default(null);
            $table->string('cost_centre')->nullable()->default(null);
            $table->string('uob_id')->nullable()->default(null);
            $table->string('building_name')->nullable()->default(null);
            $table->string('address1')->nullable()->default(null);
            $table->string('address2')->nullable()->default(null);
            $table->string('address3')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('postcode')->nullable()->default(null);
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
        Schema::dropIfExists('department');
    }
}
