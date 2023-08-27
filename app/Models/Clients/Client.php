<?php

namespace App\Models\Clients;

use App\Models\Agents\Agent;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice\Invoice;
use App\Models\Expense\Expense;
use App\Models\Clients\ClientTransaction;


class Client extends Model
{
    public static function get_last_five_invoice($clientID) {
       return Invoice::whereInvoiceClientId($clientID)->whereInvoiceHasDeleted("NO")->orderBy("invoice_id","desc")->limit(5)->get();
    }
    public static function get_last_five_expense($clientID) {
       return Expense::whereExpenseClientId($clientID)->whereExpenseHasDeleted("NO")->orderBy("expense_id","desc")->limit(5)->get();
    }
    public static function get_last_five_transaction($clientID) {
       return ClientTransaction::whereClientTransactionClientId($clientID)->whereClientTransactionHasDeleted("NO")->orderBy("client_transaction_id","desc")->limit(5)->get();
    }

    public static function total_invoice_of_client($clientID) {
       return Invoice::whereInvoiceClientId($clientID)->whereInvoiceHasDeleted("NO")->count();
    }

    public static function total_money_receipt_of_client($clientID) {
       return \App\Models\MoneyReciept\MoneyReciept::whereMoneyRecieptClientId($clientID)->whereMoneyRecieptHasDeleted("NO")->count();
    }

    public static function get_passport_of_the_client($clientID) {
      return \App\Models\Passport\Passport::wherePassportClientId($clientID)->wherePassportHasDeleted("NO")->get();
   }

   public static function get_visa_of_the_client($clientID) {
      return \App\Models\Visa\Visa::whereVisaClientId($clientID)->whereVisaHasDeleted("NO")->get();
   }

   public static function clientName($clientID) {
    $clientName = Client::where('client_id',$clientID)->select('client_name')->first();
    return $clientName;
 }



   public static function clientOverAllData($clientID) {
    $clientName = ClientOverAll::where('client_id',$clientID)->first();

    if (isset($clientName)) {
         return $clientName->client_overall_id;
    }

 }


   public static function ifClientExist($clientID) {
    $clientName = ClientOverAll::where('client_id',$clientID)->count();
      return $clientName;

 }

 public static function clientdetails($id)
 {
    $data = Client::where('client_id',$id)->first();
    return $data;
 }


}
