<?php

namespace App\Http\Controllers\MoneyReciept;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MoneyReciept\MoneyReciept;
use App\Models\Invoice\Invoice;
use App\Models\Clients\ClientTransaction;
use App\Models\Ledger\ClientLedger;
use App\Models\AccountTrasection\AccountTrasection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MoneyRecieptController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['list'] = MoneyReciept::whereMoneyRecieptHasDeleted('NO')
                ->join('clients', 'money_reciept.money_reciept_client_id','=' , 'clients.client_id')
                ->get();
        return view('pages.money_reciept.list_money_reciept', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data['voucherNo'] = MoneyReciept::generate_vouchar_no();
//        print_r($data['voucherNo']);
//        die;
        return view('pages.money_reciept.create_money_reciept', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
            $request->validate([
            'money_reciept_invoice_no' => 'required',
            'money_reciept_account_id' => 'required',
            'money_reciept_amount' => 'required',
            'money_reciept_date' => 'required',
        ]);

        $moneyReceiptAmount = intval($request->money_reciept_amount) - intval($request->money_reciept_discount);
            
            $moneyReciept = new MoneyReciept;
            
            $moneyReciept->money_reciept_voucher_no = $request->money_reciept_voucher_no;
            $moneyReciept->money_reciept_invoice_no = $request->money_reciept_invoice_no;
            $moneyReciept->money_reciept_client_id = $request->money_reciept_client_id;
            $moneyReciept->money_reciept_payment_to = "CLIENT";
            $moneyReciept->money_reciept_total_amount = $moneyReceiptAmount;
            $moneyReciept->money_reciept_total_discount = $request->money_reciept_discount;
            $moneyReciept->money_reciept_payment_type = "CLIENT_PAYMENT";
            $moneyReciept->money_reciept_payment_date = $request->money_reciept_date;
            $moneyReciept->money_reciept_note = $request->money_reciept_note;
            $moneyReciept->money_reciept_payment_status = 1;
            $moneyReciept->money_reciept_created_by = \Illuminate\Support\Facades\Auth::user()->id;
            
            
             $client_transaction = new ClientTransaction();
      
            $client_transaction->client_transaction_type = 'CREDIT';
      
        
        $client_transaction->client_transaction_client_id = $request->money_reciept_client_id;
        $client_transaction->client_transaction_amount = $request->money_reciept_amount;
        $client_transaction->client_transaction_date = $request->money_reciept_date;
        $client_transaction->client_transaction_create_date = date("Y-m-d");
        $client_transaction->save();

        $client_tansaction_id = $client_transaction->client_transaction_id ;
        
        

        $update_client_transection = ClientTransaction::find($client_tansaction_id)->update([
            'client_transaction_last_balance' => get_client_current_balance_by_client_id($request->money_reciept_client_id)
        ]);
        
        
        
        $accountTransaction = new AccountTrasection;
        
        $accountTransaction->transaction_type = "CREDIT";
        $accountTransaction->transaction_account_id = $request->money_reciept_account_id;
        $accountTransaction->transaction_client_id = $request->money_reciept_client_id;
        $accountTransaction->transaction_amount = $moneyReceiptAmount;
        $accountTransaction->transaction_date = $request->money_reciept_date;
        $accountTransaction->transaction_create_date = date("Y-m-d");
        
        $accountTransaction->save();
        
        $account_tansaction_id = $accountTransaction->transaction_id  ;
        
       // print_r($account_tansaction_id);
              
         $update_account_transection = AccountTrasection::find($account_tansaction_id)->update([
            'transaction_last_balance' => get_acoount_current_balance_by_account_id($request->money_reciept_account_id)
        ]);
        
        
        
        $moneyReciept->money_reciept_client_transaction_id = $client_tansaction_id;
        $moneyReciept->money_reciept_account_transaction_id = $account_tansaction_id;
        $moneyReciept->save();

        $client_ledger = new ClientLedger();
        $client_ledger->client_id = $request->money_reciept_client_id;
        $client_ledger->client_transaction_id = $client_tansaction_id;
        $client_ledger->client_ledger_type = 'CLIENT_PAYMENT';
        $client_ledger->client_ledger_status = true;
        $client_ledger->client_ledger_last_balance = get_client_current_balance_by_client_id($request->money_reciept_client_id);
        $client_ledger->client_ledger_date = $request->money_reciept_date;
        $client_ledger->client_ledger_create_date = date("Y-m-d");
        $client_ledger->client_ledger_prepared_by = Auth::user()->id;
          
        $client_ledger->client_ledger_cr = $request->money_reciept_amount;
        $client_ledger->save();

            
       $data = ['status'=>'okay','moneyReceiptId'=>$moneyReciept->id];
       return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
       
        $invoiceData['moneyReceipt'] = \App\Models\MoneyReciept\MoneyReciept::whereMoneyRecieptId($id)->get()[0];
        $invoiceData['invoice'] = Invoice::whereInvoiceNo($invoiceData['moneyReceipt']->money_reciept_invoice_no)->get()[0];

//        print_r($moneyReceipt); 

        return view('pages.money_reciept.view_money_reciept',$invoiceData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $invoiceData['invoice'] = Invoice::whereInvoiceNo($id)->get()[0];

        $invoiceData['moneyReceipt'] = \App\Models\MoneyReciept\MoneyReciept::whereMoneyRecieptInvoiceNo($id)->get()[0];

//        print_r($moneyReceipt); 

        return view('pages.money_reciept.edit_money_reciept',$invoiceData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
       
            $request->validate([
            'money_reciept_invoice_no' => 'required',
            'money_reciept_account_id' => 'required',
            'money_reciept_amount' => 'required',
            'money_reciept_date' => 'required',
        ]);

        $moneyReceiptAmount = intval($request->money_reciept_amount) - intval($request->money_reciept_discount);
            
//            $moneyReciept = MoneyReciept::find($id);
            
            
          
            
//            $moneyReciept->money_reciept_voucher_no = $request->money_reciept_voucher_no;
//            $moneyReciept->money_reciept_invoice_no = $request->money_reciept_invoice_no;
//            $moneyReciept->money_reciept_client_id = $request->money_reciept_client_id;
//            $moneyReciept->money_reciept_payment_to = "CLIENT";
//            $moneyReciept->money_reciept_total_amount = $request->money_reciept_amount;
//            $moneyReciept->money_reciept_total_discount = $request->money_reciept_discount;
//            $moneyReciept->money_reciept_payment_type = "CLIENT_PAYMENT";
//            $moneyReciept->money_reciept_payment_date = $request->money_reciept_date;
//            $moneyReciept->money_reciept_note = $request->money_reciept_note;
//            $moneyReciept->money_reciept_payment_status = 1;
//            $moneyReciept->money_reciept_created_by = \Illuminate\Support\Facades\Auth::user()->id;
            
            ClientTransaction::whereClientTransactionId($request->money_reciept_client_transaction_id)->update([
            
            "client_transaction_type" =>"CREDIT",
            "client_transaction_client_id"=>$request->money_reciept_client_id,
            "client_transaction_amount"=>$request->money_reciept_amount,
            "client_transaction_date"=>$request->money_reciept_date,
//            "client_transaction_update_date"=>date("Y-m-d")
        ]);
            
//             $client_transaction = ClientTransaction::find($request->money_reciept_client_transaction_id);
//      
//            $client_transaction->client_transaction_type = 'CREDIT';
//      
//        
//        $client_transaction->client_transaction_client_id = $request->money_reciept_client_id;
//        $client_transaction->client_transaction_amount = $request->money_reciept_amount;
//        $client_transaction->client_transaction_date = $request->money_reciept_date;
//        $client_transaction->client_transaction_create_date = date("Y-m-d");
//        $client_transaction->save();
        
        

//        $client_tansaction_id = $client_transaction->client_transaction_id ;
        
        

        $update_client_transection = ClientTransaction::find($request->money_reciept_client_transaction_id)->update([
            'client_transaction_last_balance' => get_client_current_balance_by_client_id($request->money_reciept_client_id)
        ]);
        
        AccountTrasection::find($request->money_reciept_account_transaction_id)->update([
            
            "transaction_type" =>"CREDIT",
            "transaction_account_id"=>$request->money_reciept_account_id,
            "transaction_client_id"=>$request->money_reciept_client_id,
            "client_transaction_amount"=>$moneyReceiptAmount,
            "client_transaction_date"=>$request->money_reciept_date,
//            "client_transaction_update_date"=>date("Y-m-d")
        ]);
        
        
        
//        $accountTransaction = AccountTrasection::find($request->money_reciept_account_transaction_id);
//        
//        $accountTransaction->transaction_type = "CREDIT";
//        $accountTransaction->transaction_account_id = $request->money_reciept_account_id;
//        $accountTransaction->transaction_client_id = $request->money_reciept_client_id;
//        $accountTransaction->transaction_amount = $request->money_reciept_amount;
//        $accountTransaction->transaction_date = $request->money_reciept_date;
//        $accountTransaction->transaction_create_date = date("Y-m-d");
//        
//        $accountTransaction->save();
//        
//        $account_tansaction_id = $accountTransaction->transaction_id  ;
        
       // print_r($account_tansaction_id);
              
         $update_account_transection = AccountTrasection::find($request->money_reciept_account_transaction_id)->update([
            'transaction_last_balance' => get_acoount_current_balance_by_account_id($request->money_reciept_account_id)
        ]);
        
          MoneyReciept::whereMoneyRecieptId($id)->update([
            'money_reciept_voucher_no' => $request->money_reciept_voucher_no,
            'money_reciept_invoice_no' => $request->money_reciept_invoice_no,
            'money_reciept_client_id' => $request->money_reciept_client_id,
            'money_reciept_payment_to' =>  "CLIENT",
            'money_reciept_total_amount' => $moneyReceiptAmount,
            'money_reciept_total_discount' => $request->money_reciept_discount,
            'money_reciept_payment_type' => "CLIENT_PAYMENT",
            'money_reciept_payment_date' => $request->money_reciept_date,
            'money_reciept_note' => $request->money_reciept_note,
            'money_reciept_updated_by' => \Illuminate\Support\Facades\Auth::user()->id,
            'money_reciept_client_transaction_id' => $request->money_reciept_client_transaction_id,
            'money_reciept_account_transaction_id' => $request->money_reciept_account_transaction_id,
            
        ]);
        
//        $moneyReciept->money_reciept_client_transaction_id = $client_tansaction_id;
//        $moneyReciept->money_reciept_account_transaction_id = $account_tansaction_id;
//        $moneyReciept->save();

        $client_ledger = new ClientLedger();
        $client_ledger->client_id = $request->money_reciept_client_id;
        $client_ledger->client_transaction_id = $request->money_reciept_client_transaction_id;
        $client_ledger->client_ledger_type = 'CLIENT_PAYMENT_UPDATE';
        $client_ledger->client_ledger_status = true;
        $client_ledger->client_ledger_last_balance = get_client_current_balance_by_client_id($request->money_reciept_client_id);
        $client_ledger->client_ledger_date = $request->money_reciept_date;
        $client_ledger->client_ledger_create_date = date("Y-m-d");
        $client_ledger->client_ledger_prepared_by = Auth::user()->id;
          
        $client_ledger->client_ledger_cr = $request->money_reciept_amount;
        $client_ledger->save();

            
       $data = ['status'=>'okay','moneyReceiptId'=>$id];
       return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
      $moneyReceipt = MoneyReciept::where("money_reciept_id",$id)->get();
//      $data = $moneyReceipt;
      
        
        MoneyReciept::where("money_reciept_id",$id)->update([
           "money_reciept_has_deleted" => "YES"
        ]);
        
        ClientTransaction::where("client_transaction_id",$moneyReceipt[0]->money_reciept_client_transaction_id)->update([
            "client_transaction_has_deleted"=>"YES"
        ]);
        
        AccountTrasection::where("transaction_id",$moneyReceipt[0]->money_reciept_account_transaction_id)->update([
            "transaction_has_deleted"=>"YES"
        ]);
        
        $data = ['status'=>'okay'];
       return $data;
    }

}
