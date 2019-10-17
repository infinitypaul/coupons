<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinimumQuantityCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minimum_quantity_coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('percent_off')->nullable();
            $table->integer('value')->nullable();
            $table->integer('quantity')->default(0);
            $table->float('amount');
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
        Schema::dropIfExists('minimum_quantity_coupons');
    }
}
