<?php

namespace App\Http\Controllers\Agents;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Accounts;
use App\Models\AccountTrasection\AccountTrasection;
use App\Models\Agents\Agent;
use App\Models\AgentTransection\AgentTransection;
use App\Models\Clients\ClientAgent;
use App\Models\Ledger\AgentLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['agent'] = Agent::where('agent_status',1)->where('agent_has_deleted', 'NO')->get();

        return view('pages.agent.agent_list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['accounts'] = Accounts::all();
    return view('pages.agent.create_agent',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'agent_name' => 'required'
        ]);

        $agent_img = '';
        if($request->hasFile('image'))
        {
            $agent_img = time().'-'.'picture'.'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $agent_img);
        }
        $agent_nid_front = '';
        if($request->hasFile('agent_nid_front'))
        {
            $agent_nid_front = time().'-'.'nid-front'.'.'.$request->agent_nid_front->extension();
            $request->agent_nid_front->move(public_path('uploads'), $agent_nid_front);
        }
        $agent_nid_back = '';
        if($request->hasFile('agent_nid_back'))
        {
            $agent_nid_back = time().'-'.'nid-back'.'.'.$request->agent_nid_back->extension();
            $request->agent_nid_back->move(public_path('uploads'), $agent_nid_back);
        }

        $agents = new Agent();
        $agents->agent_name = $request->agent_name;
        $agents->agent_entry_id = $request->agent_entry_id;
        $agents->agent_nid = $request->agent_nid;
        $agents->agent_phone = $request->agent_phone;
        $agents->agent_email = $request->agent_email;
        $agents->agent_birthdate = $request->agent_birthdate;
        $agents->agent_picture ='/uploads/'.$agent_img;
        $agents->agent_nid_front ='/uploads/'.$agent_nid_front;
        $agents->agent_nid_back ='/uploads/'.$agent_nid_back;
        $agents->agent_address = $request->agent_address;
        $agents->agent_opening_balance = $request->agent_opening_balance;
        $agents->agent_status = true;
        $agents->save();

        if ($request->transaction_type != null) {
            $agent_account_transection = new AgentTransection();
            $agent_account_transection->agent_transaction_type = $request->transaction_type;
            $agent_account_transection->agent_transaction_account_id = $agents->id;
            $agent_account_transection->agent_transaction_amount = $request->agent_opening_balance;
            $agent_account_transection->agent_transaction_date = date("Y/m/d");
            $agent_account_transection->agent_account_create_date = date("Y/m/d");
            $agent_account_transection->save();


            $agent_ledger = new AgentLedger();
            $agent_ledger->agent_id = $agents->id;
            $agent_ledger->agent_transaction_id = $agent_account_transection->id;
            $agent_ledger->agent_ledger_type = 'opening_balance';
            $agent_ledger->agent_ledger_status = true;
            $agent_ledger->agent_ledger_last_balance = 0;
            $agent_ledger->agent_ledger_date = date("Y/m/d");
            $agent_ledger->agent_ledger_create_date = date("Y/m/d");
            $agent_ledger->agent_ledger_prepared_by = Auth::user()->id;

            if ($request->transaction_type == 'advance') {
                $agent_ledger->agent_ledger_dr = 0;
                $agent_ledger->agent_ledger_cr = $request->agent_opening_balance;
            } else {
                $agent_ledger->agent_ledger_dr = $request->agent_opening_balance;
                $agent_ledger->agent_ledger_cr = 0;
            }

            $agent_ledger->save();

            $account = new AccountTrasection();
            if ($request->transaction_type == 'advance') {
                $account->transaction_type = 'CREDIT';
            } elseif ($request->transaction_type == 'due') {
                $account->transaction_type = 'DEBIT';
            }
            $account->transaction_amount = $request->agent_opening_balance;
            $account->transaction_agent_id = $agents->id;
            $account->transaction_account_id = $request->accounts;
            $account->transaction_date = date("Y-m-d");
            $account->transaction_create_date = date("Y-m-d");
            $account->transaction_create_date = date("Y-m-d");
            $account->save();
        }








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



        $data['agentData'] = Agent::where('agents.agent_id', $id)->join('agents_ledgers', 'agents_ledgers.agent_id','=', 'agents.agent_id')->join('agent_transections', 'agent_transections.agent_transaction_account_id','=', 'agents.agent_id')->first();
        // echo '<pre>';
        // print_r($data['agentData']);die;

        return view('pages.agent.edit_agent',$data);
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
        $data = Agent::where('agents.agent_id', $request->agent_id)->first();
        $agent_img = $data->agent_picture;
        if($request->hasFile('image'))
        {
            $agent_img = time().'-'.'picture'.'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $agent_img);
        }
        $agent_nid_front = $data->agent_nid_front;
        if($request->hasFile('agent_nid_front'))
        {
            $agent_nid_front = time().'-'.'nid-front'.'.'.$request->agent_nid_front->extension();
            $request->agent_nid_front->move(public_path('uploads'), $agent_nid_front);
        }
        $agent_nid_back = $data->agent_nid_back;
        if($request->hasFile('agent_nid_back'))
        {
            $agent_nid_back = time().'-'.'nid-back'.'.'.$request->agent_nid_back->extension();
            $request->agent_nid_back->move(public_path('uploads'), $agent_nid_back);
        }
        $request->validate([
            'agent_name' => 'required'
        ]);

        if ($request->transaction_type == 'advance') {
            $credit = $request->agent_opening_balance;
            $debit = 0;
        } else {
            $debit = $request->agent_opening_balance;
            $credit = 0;
        }

        Agent::where('agents.agent_id', $request->agent_id)->join('agents_ledgers', 'agents_ledgers.agent_id', '=', 'agents.agent_id')->join('agent_transections', 'agent_transections.agent_transaction_account_id', '=', 'agents.agent_id')->update([
            'agent_entry_id' => $request->agent_entry_id,
            'agent_name' => $request->agent_name,
            'agent_nid' => $request->agent_nid,
            'agent_birthdate' => $request->agent_birthdate,
            'agent_picture' =>'/uploads/'.$agent_img,
            'agent_nid_front' =>'/uploads/'.$agent_nid_front,
            'agent_nid_back' => '/uploads/'.$agent_nid_back,
            'agent_phone' => $request->agent_phone,
            'agent_email' => $request->agent_email,
            'agent_address' => $request->agent_address,
            'agent_opening_balance' => $request->agent_opening_balance,
            'agent_transaction_amount' => $request->agent_opening_balance,
            'agent_transaction_date' => date("Y/m/d"),
            'agent_account_create_date' => date("Y/m/d"),
            'agent_transaction_type' => $request->transaction_type,
            'agent_ledger_cr' => $credit,
            'agent_ledger_dr' => $debit,
            'updated_at' => date("Y/m/d")
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agent::where('agent_id', $id)->where('agent_has_deleted','NO')->update([
            'agent_status' => 0,
            'agent_has_deleted' => 'YES',
        ]);
    }

    public function agentSearch(Request $request)
    {

        $agents = Agent::where('agent_name', 'like', "%{$request->q}%")->orWhere('agent_entry_id', 'like', "%{$request->q}%")->orWhere('agent_phone', 'like', "%{$request->q}%")->get();
        // print_r($clients);
        // die;
        $client_array = array();
        foreach ($agents as $agent) {
            $label = $agent['agent_name'] . '(' . $agent['agent_entry_id'] . ')';
            $value = intval($agent['agent_id']);
            $client_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $client_array);
        echo json_encode($result);
        exit;
    }

    public function agentClient($id)
    {
        $clientList = ClientAgent::where('agent_id',$id)->get();
        $data['agent'] = Agent::where('agent_id',$id)->first();
        return view('pages.agent.agent_wise_client_list',compact('clientList'),$data);
    }
}
