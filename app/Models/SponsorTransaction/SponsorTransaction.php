<?php

namespace App\Models\SponsorTransaction;

use Illuminate\Database\Eloquent\Model;

class SponsorTransaction extends Model
{
    protected $table = "sponsor_transactions";
    protected $primaryKey = "sponsor_transaction_id";
    protected $fillable = ['sponsor_transaction_last_balance'];
}
