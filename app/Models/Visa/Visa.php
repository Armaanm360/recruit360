<?php

namespace App\Models\Visa;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
   protected $table = "visa_information";
  protected $primaryKey = 'visa_id';

  public static function visaNumber($client_id)
    {
        $paxName = Visa::where('visa_client_id',$client_id)->select('visa_information.visa_no')->first();
        return $paxName;
    }
}
