<?php

namespace App\Models\Manpower;

use Illuminate\Database\Eloquent\Model;

class Manpower extends Model
{
    public static function manpowertest($client_id)
    {
        $paxName = Manpower::where('manpower_client_id',$client_id)->count();
        return $paxName;
    }
}
