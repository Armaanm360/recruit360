<?php

namespace App\Models\AccountTrasection;

use Illuminate\Database\Eloquent\Model;

class AccountTrasection extends Model
{
    protected $table = "account_trasections";
    protected $primaryKey = "transaction_id";
//    protected $fillable = ["transaction_last_balance","transaction_account_id"];
    protected $guarded = []; 
}
