<?php

namespace App\Models\Sponsors;

use Illuminate\Database\Eloquent\Model;
use App\Models\MoneyReciept\MoneyReciept;

class Sponsors extends Model
{
    protected $table = "sponsors";
    protected $primaryKey = "sponsor_id";

    public static function clientName($clientID) {
        $clientName = Sponsors::where('sponsor_id',$clientID)->select('sponsor_name')->first();
        return $clientName;
     }

}
