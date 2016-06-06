<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
  protected $table = 'cards';

  protected $guarded = ['id'];

  protected $fillable = [
    'series',
    'card_number',
    'start_date',
    'end_date',
    'sum',
    'status'
  ];

  public function purchases()
  {
      return $this->hasMany('Purchases');
  }
}
