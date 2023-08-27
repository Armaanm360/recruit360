<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;
use App\Models\Configuration\CompanyInfo;

class CompanyInfo extends Model
{
    protected $fillable = ['company_id'];
    public static function get_company_info(){
    return CompanyInfo::first();
    }
}
