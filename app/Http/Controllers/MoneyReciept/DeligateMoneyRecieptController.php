<?php

namespace App\Http\Controllers\MoneyReciept;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Accounts;
use App\Models\AccountTrasection\AccountTrasection;
use App\Models\Deligates\Deligate;
use App\Models\DeligateTransaction\DeligateTransaction;
use App\Models\Ledger\DeligateLedger;
use Illuminate\Http\Request;
use App\Models\MoneyReciept\MoneyReciept;
use Illuminate\Support\Facades\Auth;

class DeligateMoneyRecieptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = MoneyReciept::whereMoneyRecieptHasDeleted('NO')->where('money_reciept_deligate_id', '!=', NULL)
        ->join('deligates', 'money_reciept.money_reciept_deligate_id', '=', 'deligates.deligate_id')
        ->get();
        return view('pages.deligate_money_reciept.list_money_reciept_deligate', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['account'] = Accounts::whereAccountHasDeleted('NO')->get();
        return view('pages.deligate_money_reciept.create_deligate_money_reciept', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $moneyReciept = new MoneyReciept;

        $moneyReciept->money_reciept_voucher_no = $request->voucher_no;
        $moneyReciept->money_reciept_deligate_id = $request->invoice_deligate_id;
        $moneyReciept->money_reciept_payment_to = "deligate";
        $moneyReciept->money_reciept_total_amount = $request->amount;
        $moneyReciept->money_reciept_total_discount = $request->money_reciept_discount;
        $moneyReciept->money_reciept_payment_type = "deligate_PAYMENT";
        $moneyReciept->money_reciept_payment_date = $request->money_reciept_date;
        $moneyReciept->money_reciept_note = $request->money_reciept_note;
        $moneyReciept->money_reciept_payment_status = 1;
        $moneyReciept->money_reciept_created_by = Auth::user()->id;


        $deligate_transaction = new DeligateTransaction();
        $deligate_transaction->deligate_transaction_type = "CREDIT";
        $deligate_transaction->deligate_transaction_client_id = $request->invoice_deligate_id;
        $deligate_transaction->deligate_transaction_amount = $request->amount;
        $deligate_transaction->deligate_transaction_date = $request->money_reciept_date;
        $deligate_transaction->deligate_account_create_date = date("Y-m-d");
        $deligate_transaction->save();

        

        $deligate_transection_id = $deligate_transaction->deligate_transaction_id;



        $update_deligate_transection = DeligateTransaction::find($deligate_transection_id)->update([
            'deligate_transaction_last_balance' => get_deligate_current_balance_by_deligate_id($request->invoice_deligate_id)
        ]);



        $accountTransaction = new AccountTrasection();

        $accountTransaction->transaction_type = "CREDIT";
        $accountTransaction->transaction_account_id = $request->account_get_select;
        $accountTransaction->transaction_deligate_id = $request->invoice_deligate_id;

        if ($request->money_reciept_discount != null) {
            $accountTransaction->transaction_amount = $request->amount - $request->money_reciept_discount;
        } else {
            $accountTransaction->transaction_amount = $request->amount;
        }

        $accountTransaction->transaction_date = $request->money_reciept_date;
        $accountTransaction->transaction_create_date = date("Y-m-d");

        $accountTransaction->save();

        $account_tansaction_id = $accountTransaction->transaction_id;

        // print_r($account_tansaction_id);

        $update_account_transection = AccountTrasection::find($account_tansaction_id)->update([
            'transaction_last_balance' => get_acoount_current_balance_by_account_id($request->money_reciept_account_id)
        ]);



        $moneyReciept->money_reciept_deligate_transaction_id = $deligate_transection_id;
        $moneyReciept->money_reciept_account_transaction_id = $account_tansaction_id;

        

        $deligate_ledger = new DeligateLedger();
        $deligate_ledger->deligate_id = $request->invoice_deligate_id;
        $deligate_ledger->deligate_transaction_id = $deligate_transection_id;
        $deligate_ledger->deligate_ledger_type = 'deligate_PAYMENT';
        $deligate_ledger->deligate_ledger_status = true;
        $deligate_ledger->deligate_ledger_money_receipt_id = $moneyReciept->id; 
        $deligate_ledger->deligate_ledger_last_balance = get_deligate_current_balance_by_deligate_id($request->invoice_deligate_id);
        $deligate_ledger->deligate_ledger_date = $request->money_reciept_date;
        $deligate_ledger->deligate_ledger_create_date = date("Y-m-d");
        $deligate_ledger->deligate_ledger_prepared_by = Auth::user()->id;
        $deligate_ledger->deligate_ledger_cr = $request->amount;
        $deligate_ledger->save();

        $moneyReciept->save();

        return response(['money_reciept_voucher_no' => $moneyReciept->money_reciept_voucher_no]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['reciept'] = MoneyReciept::where('money_reciept_voucher_no', $id)->join('deligates', 'money_reciept.money_reciept_deligate_id', '=', 'deligates.deligate_id')->first();
        return view('pages.deligate_money_reciept.show_money_reciept', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['account'] = Accounts::whereAccountHasDeleted('NO')->get();
        $data['reciept'] = MoneyReciept::where('money_reciept_voucher_no', $id)->join('deligates', 'money_reciept.money_reciept_deligate_id', '=', 'deligates.deligate_id')->join('deligate_transactions', 'deligate_transactions.deligate_transaction_id', 'money_reciept.money_reciept_deligate_transaction_id')->join('account_trasections', 'account_trasections.transaction_deligate_id', 'deligates.deligate_id')->join('accounts', 'accounts.account_id', 'account_trasections.transaction_account_id')->first();

        return view('pages.deligate_money_reciept.update_money_reciept_deligate', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // return $id;die;
        if ($request->money_reciept_discount != null) {
            $net_amount = $request->amount - $request->money_reciept_discount;
        } else {
            $net_amount = $request->amount;
        }
        $data['reciept'] = MoneyReciept::where('money_reciept_voucher_no', $id)->join('deligates', 'money_reciept.money_reciept_deligate_id', '=', 'deligates.deligate_id')->join('account_trasections', 'account_trasections.transaction_deligate_id', '=', 'deligates.deligate_id')->join('deligate_transactions', 'deligate_transactions.deligate_transaction_id', '=', 'money_reciept.money_reciept_deligate_transaction_id')->join('accounts', 'accounts.account_id', '=', 'account_trasections.transaction_account_id')->update([
            'money_reciept_total_amount' => $request->amount,
            'money_reciept_total_discount' => $request->money_reciept_discount,
            'money_reciept_note' => $request->money_reciept_note,
            'transaction_amount' => $net_amount,
            'transaction_date' => date("Y-m-d"),
            'account_id' => $request->account_get_select,
            'money_reciept_updated_by' => Auth::user()->id
        ]);





        $deligate_transection_id = $request->deligate_transaction_id;



        $update_deligate_transection = DeligateTransaction::find($deligate_transection_id)->update([
            'deligate_transaction_last_balance' => get_deligate_current_balance_by_deligate_id($request->invoice_deligate_id)
        ]);


        $account_tansaction_id = $request->transaction_id;

        // print_r($account_tansaction_id);

        $update_account_transection = AccountTrasection::find($account_tansaction_id)->update([
            'transaction_last_balance' => get_acoount_current_balance_by_account_id($request->account_get_select)
        ]);


        $deligate_ledger = new DeligateLedger();
        $deligate_ledger->deligate_id = $request->invoice_deligate_id;
        $deligate_ledger->deligate_transaction_id = $deligate_transection_id;
        $deligate_ledger->deligate_ledger_type = 'deligate_PAYMENT_UPDATED';
        $deligate_ledger->deligate_ledger_status = true;
        $deligate_ledger->deligate_ledger_last_balance = get_deligate_current_balance_by_deligate_id($request->invoice_deligate_id);
        $deligate_ledger->deligate_ledger_date = $request->money_reciept_date;
        $deligate_ledger->deligate_ledger_prepared_by = Auth::user()->id;
        $deligate_ledger->deligate_ledger_cr = $request->amount;
        $deligate_ledger->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MoneyReciept::where('money_reciept_voucher_no', $id)->where('money_reciept_has_deleted', 'NO')->update([
            'money_reciept_payment_status' => 0,
            'money_reciept_has_deleted' => 'YES',
        ]);
    }
}