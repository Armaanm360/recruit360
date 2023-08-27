<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Accounts;
use App\Models\Accounts\Accounts as AccountsAccounts;
use App\Models\AccountTrasection\AccountTrasection;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = AccountsAccounts::whereAccountHasDeleted('NO')->get();  
        return view('pages.account.account_list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.account.create_account');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // print_r($request->all());die;

         $request->validate([
            'account_name' => 'required',
            'account_number' => 'required|unique:accounts'
        ]);

        $account = new AccountsAccounts();

        $account->account_name = $request->account_name;
        $account->account_number = $request->account_number;
        $account->account_type = $request->account_type;
        $account->account_bank_name = $request->account_bank_name;
        $account->account_branch_name = $request->account_branch_name;
        $account->account_status = 1;
        $account->account_create_date = date('Y-m-d');

        $account->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = AccountsAccounts::find($id);
    return view('pages.account.view_account',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $data['data'] = AccountsAccounts::whereAccountId($id)->get();
    return view('pages.account.edit_account',$data);
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

        // print_r($request->all());die;
        $request->validate([
            'account_name' => 'required',
        ]);

        $account = AccountsAccounts::find($id);

        $account->account_name = $request->account_name;
        $account->account_number = $request->account_number;
        $account->account_type = $request->account_type;
        $account->account_bank_name = $request->account_bank_name;
        $account->account_branch_name = $request->account_branch_name;
        $account->account_status = 1;
        $account->account_create_date = date('Y-m-d');

        $account->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = AccountsAccounts::find($id);

        
        $account->account_has_deleted = "YES";

        $account->save();
    }





    public function getAccount($account_id)
    {
        // $account_last_bal = AccountTrasection::where('transaction_account_id',$account_id)->get();
        // return $account_last_bal[0]->transaction_last_balance;

        return get_acoount_current_balance_by_account_id($account_id);
    }

    
}