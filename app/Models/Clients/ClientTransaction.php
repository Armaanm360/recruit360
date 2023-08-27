<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class ClientTransaction extends Model
{
    protected $table = 'client_transactions';
    protected $primaryKey = 'client_transaction_id';
    protected $fillable = ['client_transaction_last_balance'];

    public static function txntype($client_transaction_id)
    {
        $txntype = ClientTransaction::where('client_transaction_id',$client_transaction_id)->select('client_transactions.client_transaction_type','client_transactions.client_transaction_amount','client_transactions.client_transaction_last_balance')->first();
        return $txntype;
    }
    public static function txnamount($client_transaction_id)
    {
        $txntype = ClientTransaction::where('client_transaction_id',$client_transaction_id)->select('client_transactions.client_transaction_last_balance')->first();
        return $txntype;
    }
}
