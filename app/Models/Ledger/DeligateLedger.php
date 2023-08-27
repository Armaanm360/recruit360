<?php

namespace App\Models\Ledger;

use Illuminate\Database\Eloquent\Model;

class DeligateLedger extends Model
{
    protected $table = "deligate_ledgers";
    protected $primaryKey = "deligate_ledger_id";



    public function getLedgerTyep($id)
    {
    //   $naming =  DeligateLedger::where('deligate_id',4)->get();
    //   return $naming[0]->deligate_ledger_type;
    return "lunchi";
    }
}
