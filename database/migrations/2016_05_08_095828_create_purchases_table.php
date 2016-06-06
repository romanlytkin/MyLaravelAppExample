<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
  public function up()
  {
      Schema::create('purchases', function (Blueprint $table) {
          $table->increments('id');
          $table->dateTime('buy_date');
          $table->float('price');
          $table->integer('card_id')->unsigned()->default(0);
          $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
          $table->timestamps();
      });
  }

  public function down()
  {
      Schema::drop('purchases');
  }
}
