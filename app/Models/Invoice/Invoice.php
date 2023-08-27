<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    protected $table = "invoices";
    protected $primaryKey = "invoice_id";

    public static function voucharNo($client_ledger_invoice_id)
    {
        $voucharNo = DB::table('invoices')->where('invoices.invoice_id',$client_ledger_invoice_id)->select('invoices.invoice_no','invoices.invoice_discount','invoices.invoice_client_previous_balance')->first();
        return $voucharNo;
    }
    public static function invoice($id)
    {
        $voucharNo = DB::table('invoices')->where('invoices.invoice_id',$id)->select('invoices.invoice_no')->first();
        return $voucharNo;
    }
    // public static function voucharDiscount($client_ledger_invoice_id)
    // {
    //     $voucharDiscount = Invoice::where('invoice_id',$client_ledger_invoice_id)->select('invoices.invoice_discount')->first();
    //     return $voucharDiscount;
    // }

//    public function invoiceBilling() {
//        return $this->belongsToMany(InvoiceBilling::class, 'invoice_billing_infos','invoice_id');
//    }
}
