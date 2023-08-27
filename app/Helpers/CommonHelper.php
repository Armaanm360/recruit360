<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Agents\Agent;
use App\Models\Clients\Client;
use App\Models\Clients\ClientTransaction;
use App\Models\ClientTransection;
use App\Models\Configuration\HeadModel;
use App\Models\Configuration\Subhead;
use App\Models\Deligates\Deligate;
use App\Models\Sponsors\Sponsors;
use App\Models\Invoice\Invoice;
use App\Models\AccountTrasection\AccountTrasection;
use App\Models\AgentTransection\AgentTransection;
use App\Models\DeligateTransaction\DeligateTransaction;
use App\Models\MoneyReciept\MoneyReciept;
use App\Models\SponsorTransaction\SponsorTransaction;
use Illuminate\Support\Carbon;
use App\Models\Expense\Expense;
use App\Models\Passport\Passport;

if (!function_exists('search_agent')) {

    function search_agent($q)
    {
        $agents = Agent::where('agent_name','like',"%{$q}%")->orWhere('agent_entry_id','like',"%{$q}%")->orWhere('agent_phone','like',"%{$q}%")->get();

        $agent_array = array();
        foreach ($agents as $agent) {
            $label = $agent['agent_name'] . '(' . $agent['agent_id'] . ')';
            $value = intval($agent['agent_id']);
            $agent_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $agent_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('search_client')) {

    function search_client($q)
    {
        $clients = Client::where('client_name','like',"%{$q}%")->orWhere('client_entry_id','like',"%{$q}%")->orWhere('client_phone','like',"%{$q}%")->get();

        $client_array = array();
        foreach ($clients as $client) {
            $label = $client['client_name'] . '(' . $client['client_id'] . ')';
            $value = intval($client['client_id']);
            $client_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $client_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('search_client_wise_invoice')) {

    function search_client_wise_invoice($q)
    {
        $clients = Invoice::where('invoice_client_id',$q)->get();

//         echo '<pre>';
//         print_r($q);die;

        $client_array = array();
        foreach ($clients as $client) {
            $label = $client['invoice_no'] . '(' . $client['invoice_client_id'] . ')';
            $value = intval($client['invoice_id']);
            $client_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $client_array);
        echo json_encode($result);
        exit;
    }
}



if (!function_exists('search_deligate')) {

    function search_deligate($q)
    {
        $deligates = Deligate::where('deligate_name','like',"%{$q}%")->orWhere('deligate_entry_id','like',"%{$q}%")->orWhere('deligate_phone','like',"%{$q}%")->get();

        $deligate_array = array();
        foreach ($deligates as $deligate) {
            $label = $deligate['deligate_name'] . '(' . $deligate['deligate_id'] . ')';
            $value = intval($deligate['deligate_id']);
            $deligate_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $deligate_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('search_sponser')) {

    function search_sponser($q)
    {

        $sponsers = Sponsors::where('sponsor_name','like',"%{$q}%")->orWhere('sponsor_entry_id','like',"%{$q}%")->orWhere('sponsor_phone','like',"%{$q}%")->get();

        $sponser_array = array();
        foreach ($sponsers as $sponser) {
            if($sponser->sponsor_has_deleted == 'NO')
            {
                $label = $sponser['sponsor_name'] . '(' . $sponser['sponsor_id'] . ')';
                $value = intval($sponser['sponsor_id']);
                $sponser_array[] = array("label" => $label, "value" => $value);
            }

        }
        $result = array('status' => 'ok', 'content' => $sponser_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('search_client_full_information')) {

    function search_client_full_information($q)
    {
        $clients = Client::where('client_name','like',"%{$q}%")->orWhere('client_entry_id','like',"%{$q}%")->orWhere('client_phone','like',"%{$q}%")->get();

        $client_array = array();

        foreach ($clients as $client) {
            $label = $client['client_name'] . '(' . $client['client_entry_id'] . ')';
            $value = intval($client['client_id']);
            $client_array[] = array("label" => $label, "value" => $value,"client_name"=>$client['client_name'],"client_phone" => $client['client_phone'], "client_address" => $client['client_address']);

        }
        $result = array('status' => 'ok', 'content' => $client_array);
        echo json_encode($result);
        exit;
    }
}


if (!function_exists('get_invoice_full_information')) {

    function get_invoice_full_information($q)
    {
        $invoice = Invoice::where('invoice_id',$q)->get();
//        print_r($invoice);die;
        $result = array('status' => 'ok', 'content' => $invoice);
        echo json_encode($result);
        exit;
    }
}

if (!function_exists('get_client_current_balance_by_client_id')) {

    function get_client_current_balance_by_client_id($clientID)
    {
       $credit = ClientTransaction::whereClientTransactionClientId($clientID)->whereClientTransactionType('CREDIT')->sum('client_transaction_amount');
       $debit = ClientTransaction::whereClientTransactionClientId($clientID)->whereClientTransactionType('DEBIT')->sum('client_transaction_amount');

       $currentBalance = intval($credit) - intval($debit);

       return $currentBalance;

    }
}


if (!function_exists('get_agent_current_balance_by_client_id')) {

    function get_agent_current_balance_by_agent_id($agentID)
    {
       $credit = AgentTransection::whereAgentTransactionClientId($agentID)->whereAgentTransactionType('CREDIT')->sum('agent_transaction_amount');
       $debit = AgentTransection::whereAgentTransactionClientId($agentID)->whereAgentTransactionType('DEBIT')->sum('agent_transaction_amount');

       $currentBalance = intval($credit) - intval($debit);

       return $currentBalance;

    }
}


if (!function_exists('get_deligate_current_balance_by_deligate_id')) {

    function get_deligate_current_balance_by_deligate_id($deligateID)
    {
       $credit = DeligateTransaction::whereDeligateTransactionId($deligateID)->whereDeligateTransactionType('CREDIT')->sum('deligate_transaction_amount');
       $debit = DeligateTransaction::whereDeligateTransactionId($deligateID)->whereDeligateTransactionType('DEBIT')->sum('deligate_transaction_amount');

       $currentBalance = intval($credit) - intval($debit);

       return $currentBalance;

    }
}

if (!function_exists('get_sponsor_current_balance_by_sponsor_id')) {

    function get_sponsor_current_balance_by_sponsor_id($sponsorID)
    {
       $credit = SponsorTransaction::whereSponsorTransactionId($sponsorID)->whereSponsorTransactionType('CREDIT')->sum('sponsor_transaction_amount');
       $debit = SponsorTransaction::whereSponsorTransactionId($sponsorID)->whereSponsorTransactionType('DEBIT')->sum('sponsor_transaction_amount');

       $currentBalance = intval($credit) - intval($debit);

       return $currentBalance;

    }
}

if (!function_exists('get_acoount_current_balance_by_account_id')) {

    function get_acoount_current_balance_by_account_id($accountID)
    {
       $credit = AccountTrasection::whereTransactionAccountId($accountID)->whereTransactionType('CREDIT')->sum('transaction_amount');
       $debit = AccountTrasection::whereTransactionAccountId($accountID)->whereTransactionType('DEBIT')->sum('transaction_amount');

       $currentBalance = intval($credit) - intval($debit);

       return $currentBalance;

    }
}



if (!function_exists('get_moeny_recipt_existance')) {

    function get_moeny_recipt_existance($invoice_no)
    {

    return   $result = MoneyReciept::whereMoneyRecieptHasDeleted('NO')->where('money_reciept_invoice_no',$invoice_no)->count();






    }
}

if (!function_exists('get_today_total_sale')) {

    function get_today_total_sale()
    {
        $today = date('Y-m-d');
        $today_sale = Invoice::whereInvoiceHasDeleted('NO')->whereInvoiceDate($today)->sum('invoice_net_total');

        $previous_day = date('Y-m-d',strtotime("-1 days"));
        $previous_day_sale = Invoice::whereInvoiceHasDeleted('NO')->whereInvoiceDate($previous_day)->sum('invoice_net_total');


        $amount_difference = intval($today_sale) - intval($previous_day_sale);

        if(intval($previous_day_sale) == 0){
            $previous_day_sale = 1;
        }

        $statistics = ($amount_difference / $previous_day_sale) * 100;

        return array('today_sale'=>$today_sale,'previous_day_sale'=>$previous_day_sale,'statistics'=>number_format($statistics, 2));

    }
}


/* find head subhead */
// if (!function_exists('get_sub_head')) {

//     function get_sub_head($subhead)
//     {
//         $subhead = Subhead::where('subhead_id', $subhead)->get();

//        return $subhead[0]->sub_head_name;

//     }
// }


if (!function_exists('get_head_id')) {

    function get_head_id($subhead_id)
    {
        $head = Subhead::where('subhead_id', $subhead_id)->get();

        return $head[0]->head_id;





    }
}


if (!function_exists('get_head_name')) {



    function get_head_name($subhead_id)
    {
        $head_id = Subhead::where('subhead_id', $subhead_id)->get();
        $head = HeadModel::where('head_id', $head_id)->get();
        return $head[0]->head_name;
    }
}

if (!function_exists('get_sub_head_name')) {

    function get_sub_head_name($subhead_id)
    {

        $head = Subhead::where('subhead_id', $subhead_id)->get();
        return $head[0]->sub_head_name;
    }
}



if (!function_exists('corresponding_account_ID')) {

    function corresponding_account_ID($invoice,$client)
    {
       $invoice =  Invoice::where('invoice_id',$invoice)->where('invoice_client_id', $client)->get();
       $client_id_get = $invoice[0]->invoice_client_id;


      $trans =  AccountTrasection::where('transaction_client_id', $client_id_get)->get();

      return $trans[0]->transaction_account_id;





    }
}

if (!function_exists('get_today_sales')) {

    function get_today_sales()
    {
        $invoiceTotalSales = Invoice::where('invoice_sales_date',Carbon::today()->toDateString())->sum('invoice_net_total');
        $invoiceTotalSalesAmount = 0;
         if($invoiceTotalSales != ""){
             $invoiceTotalSalesAmount = $invoiceTotalSales;
         }
         return $invoiceTotalSalesAmount;
    }
}

if (!function_exists('get_today_expense')) {

    function get_today_expense()
    {
        $expense = Expense::where('expense_date',Carbon::today()->toDateString())->sum('expense_amount');
        if($expense != ""){
            return $expense;
        }else{
            return 0;
        }
    }
}

if (!function_exists('get_today_collection')) {

    function get_today_collection()
    {
        $moneyReceipt = MoneyReciept::where('money_reciept_payment_date',Carbon::today()->toDateString())->sum('money_reciept_total_amount');
        if($moneyReceipt != ""){
            return $moneyReceipt;
        }else{
            return 0;
        }
    }
}

if (!function_exists('get_today_profit')) {

    function get_today_profit()
    {
        $invoiceTotalSalesProfit = Invoice::where('invoice_sales_date',Carbon::today()->toDateString())->sum('invoice_total_profit');
        $invoiceTotalSalesProfitAmount = 0;
         if($invoiceTotalSalesProfit != ""){
             $invoiceTotalSalesProfitAmount = $invoiceTotalSalesProfit;
         }


         $expense = Expense::where('expense_date',Carbon::today()->toDateString())->sum('expense_amount');
         $expenseAmount = 0;
         if($expense != ""){
             $expenseAmount = $expense;
         }

         $knitProfit = $invoiceTotalSalesProfitAmount - $expenseAmount;
         return $knitProfit;
    }
}

if (!function_exists('get_today_sales_profit')) {

    function get_today_sales_profit()
    {
        $invoiceTotalSalesProfit = Invoice::where('invoice_sales_date',Carbon::today()->toDateString())->sum('invoice_total_profit');
        $invoiceTotalSalesProfitAmount = 0;
         if($invoiceTotalSalesProfit != ""){
             $invoiceTotalSalesProfitAmount = $invoiceTotalSalesProfit;
         }

         return $invoiceTotalSalesProfitAmount;
    }
}

if (!function_exists('get_invoice_payment')) {

    function get_invoice_payment($invoiceNo)
    {
       $moneyReceipt = MoneyReciept::whereMoneyRecieptInvoiceNo($invoiceNo)->sum('money_reciept_total_amount');
        if($moneyReceipt != ""){
            return $moneyReceipt;
        }else{
            return 0;
        }
    }
}

if (!function_exists('get_passport_duration')) {

    function get_passport_duration($client_id)
    {
        $passport = Passport::where('passport_client_id', $client_id)->select('passports.duration_left')->first();
        if($passport){
            $form_duration = $passport->duration_left.' '.'Days';
            return $form_duration;
            }else{
                return '';
            }

    }
}



if (!function_exists('getAgentName')) {

     function getAgentName($agent_id)
    {
        $agent = Agent::whereAgentHasDeleted("NO")->where('agent_id', $agent_id)->select('agent_name')->first();
        return $agent->agent_name;
    }
}






