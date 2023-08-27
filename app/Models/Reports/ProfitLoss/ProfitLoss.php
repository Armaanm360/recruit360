<?php

namespace App\Models\Reports\ProfitLoss;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice\Invoice;
use App\Models\Refund\Refund;
use App\Models\Expense\Expense;
use App\Models\MoneyReciept\MoneyReciept;

class ProfitLoss extends Model
{
    public static function get_sales($from,$to) {               
                return Invoice::whereInvoiceHasDeleted("NO")->whereDate('invoice_sales_date','>=', $from)
            ->whereDate('invoice_sales_date','<=', $to)->sum("invoice_net_total"); 
    }
    
    public static function get_costs($from,$to) {               
                return Invoice::whereInvoiceHasDeleted("NO")->whereDate('invoice_sales_date','>=', $from)
            ->whereDate('invoice_sales_date','<=', $to)->sum("invoice_total_cost"); 
    }
    
    public static function get_refund_profit($from,$to) {               
                return Refund::whereRefundHasDeleted("NO")->whereDate('refund_date','>=', $from)
            ->whereDate('refund_date','<=', $to)->sum("refund_charge"); 
    }
    public static function get_general_expense($from,$to) {               
                return Expense::whereExpenseHasDeleted("NO")->whereDate('expense_date','>=', $from)
            ->whereDate('expense_date','<=', $to)->sum("expense_amount"); 
    }
    public static function get_total_invoice_discount($from,$to) {               
                 return Invoice::whereInvoiceHasDeleted("NO")->whereDate('invoice_sales_date','>=', $from)
            ->whereDate('invoice_sales_date','<=', $to)->sum("invoice_discount");  
    }
    public static function get_total_money_receipt_discount($from,$to) {               
                 return MoneyReciept::whereMoneyRecieptHasDeleted("NO")->whereDate('money_reciept_payment_date','>=', $from)
            ->whereDate('money_reciept_payment_date','<=', $to)->sum("money_reciept_total_discount");  
    }
}
