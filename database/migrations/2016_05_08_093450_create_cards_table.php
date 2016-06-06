<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
  public function up()
  {
      Schema::create('cards', function (Blueprint $table) {
          $table->increments('id');
          $table->string('series', 3);
          $table->string('card_number', 16);
          $table->dateTime('start_date');
          $table->dateTime('end_date');
          $table->float('sum');
          $table->string('status', 20);
          $table->timestamps();
      });
  }

  public function down()
  {
      Schema::drop('cards');
  }
}
