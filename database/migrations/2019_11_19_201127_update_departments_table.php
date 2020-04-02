<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('department', function (Blueprint $table) {
            $table->string('project_number')->nullable()->default(null)->after('code');
            $table->string('task_number')->nullable()->default(null)->after('project_number');
            $table->string('activity')->nullable()->default(null)->after('task_number');
            $table->string('source_of_funds')->nullable()->default(null)->after('activity');
            $table->renameColumn('uob_id', 'old_project_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('department', function (Blueprint $table) {
            $table->dropColumn('project_number');
            $table->dropColumn('task_number');
            $table->dropColumn('activity');
            $table->dropColumn('source_of_funds');
            $table->renameColumn('old_project_code', 'uob_id');
        });
    }
}
