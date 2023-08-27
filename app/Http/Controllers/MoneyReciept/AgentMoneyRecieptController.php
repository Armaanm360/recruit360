<?php

namespace App\Http\Controllers\MoneyReciept;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Accounts;
use App\Models\AccountTrasection\AccountTrasection;
use App\Models\AgentTransection\AgentTransection;
use App\Models\Ledger\AgentLedger;
use Illuminate\Http\Request;
use App\Models\MoneyReciept\MoneyReciept;
use Illuminate\Support\Facades\Auth;

class AgentMoneyRecieptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = MoneyReciept::whereMoneyRecieptHasDeleted('NO')->where('money_reciept_agent_id', '!=', NULL)
            ->join('agents', 'money_reciept.money_reciept_agent_id', '=', 'agents.agent_id')
            ->get();
        return view('pages.agent_money_reciept.list_money_reciept_agent', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['account'] = Accounts::whereAccountHasDeleted('NO')->get();
        return view('pages.agent_money_reciept.create_agent_money_reciept', $data);


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
        $moneyReciept->money_reciept_agent_id = $request->invoice_agent_id;
        $moneyReciept->money_reciept_payment_to = "AGENT";
        $moneyReciept->money_reciept_total_amount = $request->amount;
        $moneyReciept->money_reciept_total_discount = $request->money_reciept_discount;
        $moneyReciept->money_reciept_payment_type = "AGENT_PAYMENT";
        $moneyReciept->money_reciept_payment_date = $request->money_reciept_date;
        $moneyReciept->money_reciept_note = $request->money_reciept_note;
        $moneyReciept->money_reciept_payment_status = 1;
        $moneyReciept->money_reciept_created_by = Auth::user()->id;


        $agent_transaction = new AgentTransection;
        $agent_transaction->agent_transaction_type = "CREDIT";
        $agent_transaction->agent_transaction_client_id = $request->invoice_agent_id;
        $agent_transaction->agent_transaction_amount = $request->amount;
        $agent_transaction->agent_transaction_date = $request->money_reciept_date;
        $agent_transaction->agent_account_create_date = date("Y-m-d");
        $agent_transaction->save();

        $agent_transection_id = $agent_transaction->agent_transaction_id;



        $update_client_transection = AgentTransection::find($agent_transection_id)->update([
            'agent_transaction_last_balance' => get_agent_current_balance_by_agent_id($request->invoice_agent_id)
        ]);



        $accountTransaction = new AccountTrasection();

        $accountTransaction->transaction_type = "CREDIT";
        $accountTransaction->transaction_account_id = $request->account_get_select;
        $accountTransaction->transaction_agent_id = $request->invoice_agent_id;

        if ($request->money_reciept_discount != null) {
            $accountTransaction->transaction_amount = $request->amount - $request->money_reciept_discount;
        }else{
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



        $moneyReciept->money_reciept_agent_transaction_id = $agent_transection_id;
        $moneyReciept->money_reciept_account_transaction_id = $account_tansaction_id;
        $moneyReciept->save();

        $agent_ledger = new AgentLedger();
        $agent_ledger->agent_id = $request->invoice_agent_id;
        $agent_ledger->agent_transaction_id = $agent_transection_id;
        $agent_ledger->agent_ledger_type = 'AGENT_PAYMENT';
        $agent_ledger->agent_ledger_status = true;
        $agent_ledger->agent_ledger_money_receipt_id = $moneyReciept->id; 
        $agent_ledger->agent_ledger_last_balance = get_agent_current_balance_by_agent_id($request->invoice_agent_id);
        $agent_ledger->agent_ledger_date = $request->money_reciept_date;
        $agent_ledger->agent_ledger_create_date = date("Y-m-d");
        $agent_ledger->agent_ledger_prepared_by = Auth::user()->id;
        $agent_ledger->agent_ledger_cr = $request->amount;
        $agent_ledger->save();





        // echo '<pre>';
        // print_r($request->all());die;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['reciept'] = MoneyReciept::where('money_reciept_id',$id)->join('agents', 'money_reciept.money_reciept_agent_id', '=', 'agents.agent_id')->first();
        return view('pages.agent_money_reciept.show_money_reciept', $data);

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
        $data['reciept'] = MoneyReciept::where('money_reciept_id', $id)->join('agents', 'money_reciept.money_reciept_agent_id', '=', 'agents.agent_id')->join('agent_transections', 'agent_transections.agent_transaction_id', 'money_reciept.money_reciept_agent_transaction_id')->join('account_trasections','account_trasections.transaction_agent_id', 'agents.agent_id')->join('accounts', 'accounts.account_id', 'account_trasections.transaction_account_id')->first();
    //    echo '<pre>';
    //     print_r($data['reciept']);die;
        return view('pages.agent_money_reciept.update_money_reciept_agent', $data);
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

        if ($request->money_reciept_discount != null) {
            $net_amount = $request->amount - $request->money_reciept_discount;
        } else {
            $net_amount = $request->amount;
        }
        $data['reciept'] = MoneyReciept::where('money_reciept_id', $id)->join('agents', 'money_reciept.money_reciept_agent_id', '=', 'agents.agent_id')->join('account_trasections', 'account_trasections.transaction_agent_id', 'agents.agent_id')->join('agent_transections', 'agent_transections.agent_transaction_id', 'money_reciept.money_reciept_agent_transaction_id')->join('accounts', 'accounts.account_id', 'account_trasections.transaction_account_id')->update([
            'money_reciept_total_amount' => $request->amount,
            'money_reciept_total_discount' => $request->money_reciept_discount,
            'money_reciept_note' => $request->money_reciept_note,
            'transaction_amount' => $net_amount,
            'transaction_date' => date("Y-m-d"),
            'account_id' => $request->account_get_select,
            'money_reciept_updated_by' => Auth::user()->id
        ]);


        $agent_transection_id = $request->agent_transaction_id;



        $update_agent_transection = AgentTransection::find($agent_transection_id)->update([
            'agent_transaction_last_balance' => get_agent_current_balance_by_agent_id($request->invoice_agent_id)
        ]);


        $account_tansaction_id = $request->transaction_id;

        // print_r($account_tansaction_id);

        $update_account_transection = AccountTrasection::find($account_tansaction_id)->update([
            'transaction_last_balance' => get_acoount_current_balance_by_account_id($request->account_get_select)
        ]);


        $agent_ledger = new AgentLedger();
        $agent_ledger->agent_id = $request->invoice_agent_id;
        $agent_ledger->agent_transaction_id = $agent_transection_id;
        $agent_ledger->agent_ledger_type = 'AGENT_PAYMENT_UPDATED';
        $agent_ledger->agent_ledger_status = true;
        $agent_ledger->agent_ledger_last_balance = get_agent_current_balance_by_agent_id($request->invoice_agent_id);
        $agent_ledger->agent_ledger_date = $request->money_reciept_date;
        $agent_ledger->agent_ledger_prepared_by = Auth::user()->id;
        $agent_ledger->agent_ledger_cr = $request->amount;
        $agent_ledger->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MoneyReciept::where('money_reciept_id', $id)->where('money_reciept_has_deleted', 'NO')->update([
            'money_reciept_payment_status' => 0,
            'money_reciept_has_deleted' => 'YES',
        ]);
    }
}
