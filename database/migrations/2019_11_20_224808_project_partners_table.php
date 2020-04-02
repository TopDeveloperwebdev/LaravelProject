<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_partners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('project_role')->nullable()->default(null);
            $table->string('grant_administered_by')->nullable()->default(null);
            $table->string('organisation_size')->nullable()->default(null);
            $table->string('organisation_type')->nullable()->default(null);
            $table->string('cost_category_type')->nullable()->default(null);
            $table->string('organisation_name')->nullable()->default(null);
            $table->string('address1')->nullable()->default(null);
            $table->string('address2')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('postcode')->nullable()->default(null);
            $table->string('direct_dial')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('partner')->default(0);
            $table->tinyInteger('supplier')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_partners');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('partner');
            $table->dropColumn('supplier');
        });

    }
}
