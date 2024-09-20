<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
  protected $fillable = ['item','date','category','consumer','billNumber','price','quantity', 'total'];

}
