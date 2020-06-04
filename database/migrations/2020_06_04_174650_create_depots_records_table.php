<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepotsRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depots_record', function (Blueprint $table) {
            $table->bigIncrements('depots_id');
            $table->bigInteger('transaction_id')->unsigned();
            $table->bigInteger('move_total');
            $table->bigInteger('kind');
            $table->string('action');
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
        Schema::dropIfExists('depots_record');
    }
}
