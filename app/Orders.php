<?php

namespace App;

use App\Products;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
  
  public function Product()
  {
     return $this->belongsTo(Products::class);
  }

}
