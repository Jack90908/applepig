<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Purchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iron_kind', function (Blueprint $table) {
            $table->bigIncrements('id');#編號
            $table->string('iron_name');
        });

        Schema::create('purchase', function (Blueprint $table) {
            $table->bigIncrements('id');#編號
            $table->bigInteger('kind')->unsigned();
            $table->decimal('current_price', 5, 2);
            $table->decimal('unit_price', 5, 2);
            $table->bigInteger('origin_total');
            $table->bigInteger('suplus_total')->default(0);
            $table->bigInteger('client_id')->unsigned();
            $table->date('transaction_time');
            $table->timestamps();
            $table->index('transaction_time');
            $table->index('suplus_total');
            $table->index('client_id');
            $table->index('kind');
            $table->foreign('client_id')->references('id')->on('client')->onUpdate('cascade');
            $table->foreign('kind')->references('id')->on('iron_kind')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
