<?php

namespace App\Http\Controllers\Refund;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MoneyReciept\MoneyRecieptController;
use App\Models\Accounts\Accounts;
use App\Models\AccountTrasection\AccountTrasection;
use App\Models\Clients\ClientTransaction;
use App\Models\Invoice\Invoice;
use App\Models\Invoice\InvoiceBilling;
use App\Models\Ledger\ClientLedger;
use App\Models\Refund\Refund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['refund'] =  Refund::join('invoices', 'invoices.invoice_id', 'refunds.refund_invoice_id')->join('invoice_billing_infos', 'invoice_billing_infos.billing_invoice_id', 'invoices.invoice_id')->join('clients','clients.client_id', 'invoices.invoice_client_id')->orderBy('refund_id','DESC')->whereRefundHasDeleted('NO')->get();
        $data['refund'] =  Refund::orderBy('refund_id','DESC')->whereRefundHasDeleted('NO')->get();
        // echo '<pre>';
        // print_r($refund);die;
        return view('pages.refund.refund_list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.refund.create_refund');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // echo '<pre>';
        // print_r($request->all());die;
        
        $refund = new Refund();
        $refund->refund_invoice_id = $request->invoice_id;
        $refund->refund_client_id  = $request->refund_client_id;
        $refund->refund_client_transaction_id  = $request->refund_client_transaction_id;
        $refund->refund_quantity  = $request->refunded_quantity;
        $refund->refund_charge  = $request->refund_charge_overall;
        $refund->refund_return_price  = $request->refund_with_charge_total;
        $refund->refund_note  = $request->refund_note;
        $refund->refund_create_date  = date("Y-m-d");
        $refund->refund_created_by  = Auth::user()->id;
           
        if ($request->process == 'due_adjustment') {
            $refund->refund_type  = $request->process;
        }elseif($request->process == 'money_return'){
            $refund->refund_type  = $request->process;
        }else{
            $refund->refund_type  = $request->process;
        }
        $refund->save();


        $client_transaction = new ClientTransaction();
        if ($request->process == 'money_return' && get_client_current_balance_by_client_id($request->refund_client_id) < 0) {
            $client_transaction->client_transaction_amount = $request->refund_charge_overall;
            $client_transaction->client_transaction_type = 'DEBIT';
        }elseif ($request->process == 'money_return' && get_client_current_balance_by_client_id($request->refund_client_id) == 0) {
            $client_transaction->client_transaction_amount = 0;
            $client_transaction->client_transaction_type = 'DEBIT';
        }
        elseif($request->process == 'due_adjustment') {
            $client_transaction->client_transaction_amount = $request->refund_with_charge_total;
            $client_transaction->client_transaction_type = 'CREDIT';
        }elseif($request->process == 'money_return'){
            $client_transaction->client_transaction_amount = $request->refund_charge_overall;
            $client_transaction->client_transaction_type = 'DEBIT';
        }else{
            $client_transaction->client_transaction_amount = $request->refund_with_charge_total;
            $client_transaction->client_transaction_type = 'CREDIT';
        }



        
        $client_transaction->client_transaction_account_id = $request->refund_client_id;
        $client_transaction->client_transaction_client_id = $request->refund_client_id;
        // $client_transaction->client_transaction_opening_balance = $request->client_opening_balance;

        
        $client_transaction->client_transaction_date = date("Y-m-d");
        $client_transaction->client_transaction_create_date = date("Y-m-d");
        $client_transaction->save();

        $client_tansaction_id = $client_transaction->client_transaction_id;

        ClientTransaction::find($client_tansaction_id)->update([
            'client_transaction_last_balance' => get_client_current_balance_by_client_id($request->refund_client_id)
        ]);

        $refund_id = $refund->id;
        $client_transaction_last_balance = get_client_current_balance_by_client_id($request->refund_client_id);

        $clientledger = new ClientLedger();
        $clientledger->client_id = $request->refund_client_id;
        $clientledger->client_transaction_id = $request->refund_client_transaction_id;
        $clientledger->client_ledger_type = 'REFUND';

        if ($request->process == 'due_adjustment') {
            $clientledger->client_ledger_last_balance = $client_transaction_last_balance;
        }elseif ($request->process == 'money_return') {
            $clientledger->client_ledger_last_balance = $client_transaction_last_balance;
        }
        


        $clientledger->client_ledger_cr = $request->refund_with_charge_total;
        $clientledger->client_ledger_invoice_id = $request->invoice_id;
        $clientledger->client_ledger_refund_id = $refund_id;
        $clientledger->client_ledger_prepared_by = Auth::user()->id;
        $clientledger->client_ledger_date = date("Y-m-d");
        $clientledger->client_ledger_create_date = date("Y-m-d");
        $clientledger->save();

//  get_moeny_recipt_existance($request->invoice_no) != 0
        if ($request->process == 'money_return' && get_moeny_recipt_existance($request->invoice_no)) {
            $account = new AccountTrasection();


            $account->transaction_amount = $request->refund_with_charge_total;
            $account->transaction_type = 'DEBIT';
        
           
            $account->transaction_client_id = $request->refund_client_id;

              if($request->process == 'Advance'){
                $account->transaction_account_id = corresponding_account_ID($request->invoice_id,$request->refund_client_id);
              }else{
                $account->transaction_account_id = $request->account_get_select;
              }
            



            // $account->transaction_last_balance  = get_acoount_current_balance_by_account_id($request->account_get_select);
            $account->transaction_date = date("Y-m-d");
            $account->transaction_create_date = date("Y-m-d");
            $account->transaction_create_date = date("Y-m-d");
            $account->save();

            $account_transection_id = $account->transaction_id;

            AccountTrasection::find($account_transection_id)->update([
                'transaction_last_balance' => get_acoount_current_balance_by_account_id($request->account_get_select)
            ]);
        }

 



        foreach ($request->refund_rows as $rowBilling) {
            $vendor = 'billing_vendor_' . $rowBilling;
            $billingId = 'invoice_billing_id_' . $rowBilling;
            $product = 'refund_product_' . $rowBilling;
            $refund_quantity = 'refund_quantity_' . $rowBilling;
            $refund_charge = 'refund_charge_' . $rowBilling;
            $unit_price = 'unit_price_' . $rowBilling;
            $remaining_quantity = 'remaining_quantity_' . $rowBilling;
           // $subtotal = $remaining_quantity * $unit_price;

            InvoiceBilling::where('billing_invoice_id', $request->invoice_id)->update([
                'billing_quantity' => $request->$remaining_quantity,
                // 'billing_subtotal' => $subtotal
            ]);







        }


       


       Invoice::where('invoice_id',$request->invoice_id)->update([
            'invoice_status' => 'refunded',
            'invoice_updated_by' => Auth::user()->status
       ]);

      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refund\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function show(Refund $refund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refund\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function edit(Refund $refund)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Refund\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refund $refund)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refund\Refund  $refund
     * @return \Illuminate\Http\Response
     */


    public function destroy($refund)
    {
        Refund::where('refund_id', $refund)->whereRefundHasDeleted('NO')->update([
            'refund_has_deleted' => 'YES',
        ]);
    }



    public function clientInvoice(Request $request)
    {
        DB::statement("SET SQL_MODE=''");
        $data['invoice'] = Invoice::where('invoice_id',$request->hiddenClientId_invoice)
        ->join('invoice_billing_infos', 'invoice_billing_infos.billing_invoice_id', 'invoices.invoice_id')
        ->join('clients','clients.client_id', 'invoices.invoice_client_id')
        ->join('client_transactions', 'client_transactions.client_transaction_client_id','clients.client_id')
        ->groupBy('invoice_billing_infos.billing_id')
        ->get();
        $data['account'] = Accounts::whereAccountHasDeleted('NO')->get();


        // echo '<pre>';
        // print_r($data['invoice']);die;


        $html = view('pages.refund.render.refundview',$data)->render();
        return $html;

    }
}
