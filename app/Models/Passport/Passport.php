<?php

namespace App\Models\Passport;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    public static function paxName($client_id)
    {
        $paxName = Passport::where('passport_client_id',$client_id)->select('passports.passport_name')->first();
        return $paxName;
    }
    public static function paxNumber($client_id)
    {
        $paxName = Passport::where('passport_client_id',$client_id)->select('passports.passport_no')->first();
        return $paxName;
    }
    public static function deadline($client_id)
    {
        $paxName = Passport::where('passport_client_id',$client_id)->select('passports.date_of_passport_expiry','passports.duration_left')->first();
        return $paxName;
    }

}
