<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PurchaseRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_record', function (Blueprint $table) {
            $table->bigIncrements('id');#編號
            $table->bigInteger('purchase_id')->unsigned();
            $table->bigInteger('quantity');
            $table->string('from');
            $table->bigInteger('shipping_id')->unsigned()->nullable();
            $table->index('purchase_id');
            $table->index('shipping_id');
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
        //
    }
}
