<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStartDateFieldToProjectPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_partners', function (Blueprint $table) {
            $table->string('project_start_date')->nullable()->after('postcode');
            $table->string('telephone')->nullable()->after('project_start_date');
        });
    }
}
