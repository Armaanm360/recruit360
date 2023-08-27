<?php

namespace App\Models\PoliceClearance;

use Illuminate\Database\Eloquent\Model;

class PoliceClearance extends Model
{
    protected $table = "police_clearances";
    protected $primarykey = "police_clearance_id";

    public static function policeTest($client_id)
    {
        $paxName = PoliceClearance::where('police_clearance_vendor_id',$client_id)->count();
        return $paxName;
    }
}
