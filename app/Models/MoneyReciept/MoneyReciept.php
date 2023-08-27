<?php

namespace App\Models\MoneyReciept;

use Illuminate\Database\Eloquent\Model;
use App\Models\MoneyReciept\MoneyReciept;
Use App\Models\Accounts\Accounts;

class MoneyReciept extends Model
{
 protected $table = "money_reciept";
 protected $primeryKey = "money_reciept_id";
 
 public static function generate_vouchar_no()
	{
        $date = date("Y-m-d");
        $invoice_date = date("ymd");
        $lastMoneyReceipt = MoneyReciept::where('money_reciept_payment_date', 'LIKE', "%{$date}%")->get();
        return $invoice_date . str_pad(($lastMoneyReceipt->count() + 1), 2, "0", STR_PAD_LEFT);
    }
    
    public static function list_of_account()
	{        
        return Accounts::where('account_has_deleted', "NO")->get();
    }
    public static function get_selected_account($tr_id)
	{  
        return \App\Models\AccountTrasection\AccountTrasection::find($tr_id)->transaction_account_id;
//        return AccountsTra::where('account_has_deleted', "NO")->get();
    }

    public static function get_account_info($tr_id)
	{  
        return \App\Models\AccountTrasection\AccountTrasection::whereTransactionId($tr_id)
        ->join('accounts','account_trasections.transaction_account_id','=','accounts.account_id')
        ->get();
//        return AccountsTra::where('account_has_deleted', "NO")->get();
    }

}
