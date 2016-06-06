<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
  protected $table = 'purchases';

  protected $guarded = ['id', 'card_id'];

  protected $fillable = ['buy_date', 'price'];

  public function cards()
  {
    return $this->belongsTo('Cards');
  }
}
