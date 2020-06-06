<?php

namespace App;

use App\Orders;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
   public function Orders()
   {
      return $this->hasMany(Orders::class);
   }
}
