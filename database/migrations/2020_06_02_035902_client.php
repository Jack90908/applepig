<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Client extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name', 50);
            $table->string('person_name', 20)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('identity', 20);
            $table->integer('companyId')->nullable();
            $table->mediumText('remarks')->nullable();
            $table->timestamps();
            $table->index(['identity', 'company_name']);
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
