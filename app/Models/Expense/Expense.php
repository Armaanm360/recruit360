<?php

namespace App\Models\Expense;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expense extends Model
{
    public static function subHead($client_transaction_id)
    {
        $voucharNo = DB::table('expenses')->where('expenses.expense_client_transection_id',$client_transaction_id)->select('expenses.expense_sub_head_name','expenses.expense_amount')->first();
        return $voucharNo;
    }
}
