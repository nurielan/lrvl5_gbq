<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQueueCopy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queue_copy', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('number')->default(1);
            $table->tinyInteger('occupied')->default(0);
            $table->tinyInteger('skipped')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('queue_copy');
    }
}
