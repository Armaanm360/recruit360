<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Models\Clients\Client;
use App\Models\Clients\ClientTransaction;
use App\Models\ClientTransection;
use App\Models\Configuration\Head;
use App\Models\Configuration\HeadModel;
use App\Models\Configuration\Subhead;
use App\Models\Expense\Expense;
use App\Models\Ledger\ClientLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['expense'] = Expense::join('clients', 'clients.client_id', '=', 'expenses.expense_client_id')->join('client_transactions', 'client_transactions.client_transaction_id', '=', 'expenses.expense_client_transection_id')->get();

        // echo '<pre>';
        // print_r($data['expense']);die;
        return view('pages.expense.expense_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['client'] = Client::all();
        $data['head'] = HeadModel::all();
        $data['subhead'] = Subhead::all();
        return view('pages.expense.create_expense', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo 1;
        $request->validate([
            'client' => 'required',
            'expense_amount' => 'required'
        ]);


        $subheading =  Subhead::where('subhead_id', $request->expense_purpose)->get();
        $headid = $subheading[0]->head_id;
        $headname = HeadModel::where('head_id', $headid)->get();
        $expense_head_name = $headname[0]->head_name;


        $client_id = $request->client;
        $clienttrans = new ClientTransaction();
        $clienttrans->client_transaction_type = 'DEBIT';
        $clienttrans->client_transaction_client_id = $request->client;
        $clienttrans->client_transaction_amount = $request->expense_amount;
        $clienttrans->client_transaction_date = date("Y-m-d");
        $clienttrans->save();


        $client_tansaction_id = $clienttrans->client_transaction_id;
        $expense = new Expense();
        $expense->expense_head_id = get_head_id($request->expense_purpose);
        $expense->expense_sub_head_id =   $request->expense_purpose;
        $expense->expense_sub_head_name = get_sub_head_name($request->expense_purpose);
        $expense->expense_head_name     = $expense_head_name;
        $expense->expense_client_id = $request->client;
        $expense->expense_client_transection_id = $client_tansaction_id;
        $expense->expense_amount = $request->expense_amount;
        $expense->expense_date = date("Y-m-d");
        $expense->expense_note = $request->expense_note;
        $expense->expense_create_date = date("Y-m-d");
        $expense->save();





        $client_current_balance = get_client_current_balance_by_client_id($client_id);
        // echo '<pre>';
        // print_r($client_current_balance);
        // die;
        $update_client_transection = ClientTransaction::find($client_tansaction_id)->update([
            'client_transaction_last_balance' => $client_current_balance
        ]);

        $clientledger = new ClientLedger();
        $clientledger->client_id = $request->client;
        $clientledger->client_transaction_id = $client_tansaction_id;
        $clientledger->client_ledger_type = 'EXPENSE_CREATED';
        $clientledger->client_ledger_last_balance = $client_current_balance;
        $clientledger->client_ledger_dr = $request->expense_amount;
        $clientledger->client_ledger_prepared_by = Auth::user()->id;
        $clientledger->client_ledger_date = date("Y-m-d");
        $clientledger->client_ledger_create_date = date("Y-m-d");
        $clientledger->save();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['expense'] = Expense::join('clients', 'clients.client_id', '=', 'expenses.expense_client_id')->join('client_transactions', 'client_transactions.client_transaction_id', '=', 'expenses.expense_client_transection_id')->where('expense_id', $id)->first();

        $data['head'] = HeadModel::all();
        $data['subhead'] = Subhead::all();
        // echo '<pre>';
        // print_r($data['expense']);
        // die;
        // $country = DB::table('countries')->get();

        return view('pages.expense.edit_expense', $data);
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

        $subheading =  Subhead::where('subhead_id', $request->expense_purpose)->get();
        $headid = $subheading[0]->head_id;
        $headname = HeadModel::where('head_id', $headid)->get();
        $expense_head_name = $headname[0]->head_name;
        $expense_head_id = get_head_id($request->expense_purpose);
        $expense_sub_head_id = $request->expense_purpose;
        $expense_sub_head_name = get_sub_head_name($request->expense_purpose);

        Expense::join('clients', 'clients.client_id', '=', 'expenses.expense_client_id')->join('client_transactions', 'client_transactions.client_transaction_id', '=', 'expenses.expense_client_transection_id')->where('expense_id', $id)->update([
            'expense_head_id' => $expense_head_id,
            'expense_head_name' => $expense_head_name,
            'expense_sub_head_id' => $expense_sub_head_id,
            'expense_sub_head_name' => $expense_sub_head_name,
            'expense_amount' => $request->expense_amount,
            'client_transaction_amount' => $request->expense_amount
        ]);

        $client_expense = Expense::join('clients', 'clients.client_id', '=', 'expenses.expense_client_id')->join('client_transactions', 'client_transactions.client_transaction_id', '=', 'expenses.expense_client_transection_id')->where('expense_id', $id)->get();

        $client_transaction_client_id =  $client_expense[0]->client_transaction_id;




        $client_current_balance = get_client_current_balance_by_client_id($client_expense[0]->client_transaction_client_id);


        $update_client_transection = ClientTransaction::find($client_transaction_client_id)->update([
            'client_transaction_last_balance' => $client_current_balance
        ]);


        $clientledger = new ClientLedger();
        $clientledger->client_id = $request->client_id;
        $clientledger->client_transaction_id = $client_transaction_client_id;
        $clientledger->client_ledger_type = 'EXPENSE_UPDATED';
        $clientledger->client_ledger_last_balance = $client_current_balance;
        $clientledger->client_ledger_dr = $request->expense_amount;
        $clientledger->client_ledger_prepared_by = Auth::user()->id;
        $clientledger->client_ledger_date = date("Y-m-d");
        $clientledger->client_ledger_create_date = date("Y-m-d");
        $clientledger->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }





    /* render pages */
    public function createRenderExpense($purpose)
    {
        $data['subhead'] = Subhead::all();
        if ($purpose == 'agent') {
            $html = view('pages.expense.render.agent', $data)->render();
            return $html;
        } elseif ($purpose == 'client') {
            $html = view('pages.expense.render.client', $data)->render();
            return $html;
        } elseif ($purpose == 'deligate') {
            $html = view('pages.expense.render.deligate', $data)->render();
            return $html;
        } else {
            $html = view('pages.expense.render.sponsor', $data)->render();
            return $html;
        }
    }
}
