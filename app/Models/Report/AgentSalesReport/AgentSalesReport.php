<?php

namespace App\Models\Report\AgentSalesReport;

use App\Models\Clients\Client;
use App\Models\Invoice\Invoice;
use App\Models\MoneyReciept\MoneyReciept;
use Illuminate\Database\Eloquent\Model;

class AgentSalesReport extends Model
{



    public static function get_agent_net_sales($agent, $from, $to)
    {
        return Invoice::whereInvoiceHasDeleted("NO")->where('invoice_agent_id', $agent)->whereDate('invoice_sales_date', '>=', $from)
            ->whereDate('invoice_sales_date', '<=', $to)->sum("invoice_net_total");
    }



    public static function get_agent_paid_amount($agent_id,$from,$to)
    {
        return MoneyReciept::whereMoneyRecieptHasDeleted("NO")
        ->where('money_reciept_agent_id', $agent_id)
        ->whereDate('money_reciept_payment_date', '>=', $from)
        ->whereDate('money_reciept_payment_date', '<=', $to)
        ->sum("money_reciept_total_amount");
    }



    


    public static function paid_amount_invoice($agent_id,$from,$to)
    {
       $money_reciept_check = MoneyReciept::whereMoneyRecieptHasDeleted("NO")
        ->where('money_reciept_agent_id', $agent_id)
        ->whereDate('money_reciept_payment_date', '>=', $from)
        ->whereDate('money_reciept_payment_date', '<=', $to)
        ->first();

        if (!$money_reciept_check) {
          return  $money_reciept_check_new = 0;
        } else {
          return $money_reciept_check_new = MoneyReciept::whereMoneyRecieptHasDeleted("NO")
                ->where('money_reciept_agent_id', $agent_id)
                ->whereDate('money_reciept_payment_date', '>=', $from)
                ->whereDate('money_reciept_payment_date', '<=', $to)
                ->sum('money_reciept_total_amount');
        }
    }



    public static function get_agent_total_due($agent,$invoice_no, $from, $to)
    {

        $invoice_total =  Invoice::whereInvoiceHasDeleted("NO")->where('invoice_agent_id', $agent)->whereDate('invoice_sales_date', '>=', $from)
            ->whereDate('invoice_sales_date', '<=', $to)->sum("invoice_net_total");

            
        $money_reciept_check = MoneyReciept::whereMoneyRecieptHasDeleted("NO")
        ->where('money_reciept_invoice_no', $invoice_no)
        ->whereDate('money_reciept_payment_date', '>=', $from)
        ->whereDate('money_reciept_payment_date', '<=', $to)
        ->first();


        if (!$money_reciept_check) {
            $money_reciept_check = 0;
        }else{
         $money_reciept_check = MoneyReciept::whereMoneyRecieptHasDeleted("NO")
         ->where('money_reciept_invoice_no', $invoice_no)
         ->whereDate('money_reciept_payment_date', '>=', $from)
         ->whereDate('money_reciept_payment_date', '<=', $to)
         ->sum('money_reciept_total_amount');
        }


        return $total_due = $invoice_total - $money_reciept_check;


    }





    public static function getAgents($from, $to)
    {
        $invoice = Invoice::whereInvoiceHasDeleted("NO")->whereDate('invoice_sales_date', '>=', $from)
            ->whereDate('invoice_sales_date', '<=', $to)->first();

       return $invoice->invoice_client_id;

    }

    public static function getClientName($client_id)
    {
        $client = Client::whereClientHasDeleted("NO")->where('client_id', $client_id)->select('client_name')->first();
        return $client->client_name;
    }


    public static function getDueAmount($client_id)
    {
        $client = Client::whereClientHasDeleted("NO")->where('client_id', $client_id)->select('client_name')->first();
        return $client->client_name;
    }





    public static function get_refund_profit($from, $to)
    {
        return Refund::whereRefundHasDeleted("NO")->whereDate('refund_date', '>=', $from)
            ->whereDate('refund_date', '<=', $to)->sum("refund_charge");
    }



    public static function get_general_expense($from, $to)
    {
        return Expense::whereExpenseHasDeleted("NO")->whereDate('expense_date', '>=', $from)
            ->whereDate('expense_date', '<=', $to)->sum("expense_amount");
    }
    public static function get_total_invoice_discount($from, $to)
    {
        return Invoice::whereInvoiceHasDeleted("NO")->whereDate('invoice_sales_date', '>=', $from)
            ->whereDate('invoice_sales_date', '<=', $to)->sum("invoice_discount");
    }
    public static function get_total_money_receipt_discount($from, $to)
    {
        return MoneyReciept::whereMoneyRecieptHasDeleted("NO")->whereDate('money_reciept_payment_date', '>=', $from)
            ->whereDate('money_reciept_payment_date', '<=', $to)->sum("money_reciept_total_discount");
    }
}
