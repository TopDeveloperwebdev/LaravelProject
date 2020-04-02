<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFinalUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('project_num')->default(null)->nullable();
            $table->string('project_name')->default(null)->nullable();
            $table->string('job_title')->default(null)->nullable();
            $table->string('uob_alias')->default(null)->nullable();
            $table->string('telephone')->default(null)->nullable();
            $table->string('mobile_num')->default(null)->nullable();
            $table->integer('primary_department_location_id')->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('project_num');
            $table->dropColumn('project_name');
            $table->dropColumn('job_title');
            $table->dropColumn('uob_alias');
            $table->dropColumn('telephone');
            $table->dropColumn('mobile_num');
            $table->dropColumn('primary_department_location_id');
        });
    }
}
