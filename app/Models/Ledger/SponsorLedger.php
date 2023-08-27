<?php

namespace App\Models\Ledger;

use Illuminate\Database\Eloquent\Model;
use App\Models\MoneyReciept\MoneyReciept;

class SponsorLedger extends Model
{
    protected $table = "sponsor_ledgers";
    protected $primaryKey = "sponsor_ledger_id";

    public static function voucharNo($sponsor_ledger_money_reciept_id)
    {
        $voucharNo = MoneyReciept::where('money_reciept.money_reciept_id', $sponsor_ledger_money_reciept_id)->select('money_reciept.money_reciept_voucher_no')->first();
        return $voucharNo;
    }


    public function sponsors()
    {
        return $this->hasMany('App\Models\Sponsors','sponsor_id','sponsor_id');
    }
}
