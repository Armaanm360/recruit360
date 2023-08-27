<?php

namespace App\Models\DeligateTransaction;

use Illuminate\Database\Eloquent\Model;

class DeligateTransaction extends Model
{
    protected $table = "deligate_transactions";
    protected $primaryKey = "deligate_transaction_id";
    protected $fillable = ['deligate_transaction_last_balance'];
}
