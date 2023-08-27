<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
   public static function data($id)
   {
    return status::where('id',$id)->first();
   }
}
