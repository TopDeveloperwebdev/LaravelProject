<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('admin_id')->nullable()->default(null);
            $table->string('order_id');
            $table->string('requisition_no')->default(null)->nullable();
            $table->tinyInteger('national')->default(0);
            $table->tinyInteger('international')->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('org_name')->default(null)->nullable();
            $table->string('url')->default(null)->nullable();
            $table->string('description')->default(null)->nullable();
            $table->string('reason')->default(null)->nullable();
            $table->decimal('value')->default(0.00);
            $table->string('supplier_name');
            $table->string('contact_name')->nullable()->default(null);
            $table->string('supplier_email')->nullable()->default(null);
            $table->string('supplier_tel')->nullable()->default(null);
            $table->timestamp('placed_at')->nullable()->default(null);
            $table->timestamp('completed_at')->nullable()->default(null);
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
        Schema::dropIfExists('training');
    }
}
