<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Model;
use DB;

class InvoiceBilling extends Model
{
    protected $table = "invoice_billing_infos";
    protected $primaryKey = "billing_id";
    
    public static function invoice_billings($param) {
        return InvoiceBilling::whereBillingInvoiceId($param)->get();
    }

    public static function invoice_billing_product($param){
       return DB::table('products')->where('product_id','=',$param)->get()[0];
    }

    public static function invoice_billing_vendor($param){
        return DB::table('vendors')->where('vendor_id','=',$param)->get()[0];
     }
}
