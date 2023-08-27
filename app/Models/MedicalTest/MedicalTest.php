<?php

namespace App\Models\MedicalTest;

use Illuminate\Database\Eloquent\Model;

class MedicalTest extends Model
{
    protected $table = "medical_test";
    protected $primarykey = "medical_test_id";


    public static function medicalTest($client_id)
    {
        $paxName = MedicalTest::where('medical_test_client_id',$client_id)->count();
        return $paxName;
    }
}
