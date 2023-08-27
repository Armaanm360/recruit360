<?php

namespace App\Models\Deligates;

use Illuminate\Database\Eloquent\Model;

class Deligate extends Model
{
    //
    public static function clientName($clientID) {
        $clientName = Deligate::where('deligate_id',$clientID)->select('deligate_name')->first();
        return $clientName;
     }

}
