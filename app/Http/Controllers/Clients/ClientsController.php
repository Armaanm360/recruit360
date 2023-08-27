<?php

namespace App\Http\Controllers\Clients;

use App\Exports\ClientList;
use App\Http\Controllers\Controller;
use App\Models\Accounts\Accounts;
use App\Models\AccountTrasection\AccountTrasection;
use App\Models\Clients\Client;
use App\Models\Clients\ClientAgent;
use App\Models\Clients\ClientDeligate;
use App\Models\Clients\ClientOverAll;
use App\Models\Clients\ClientTransaction;
use App\Models\Configuration\JobType;
use App\Models\Ledger\ClientLedger;
use App\Models\Manpower\Manpower;
use App\Models\MedicalTest\FinalMedicalTest;
use App\Models\MedicalTest\MedicalTest;
use App\Models\Passport\Passport;
use App\Models\PoliceClearance\PoliceClearance;
use App\Models\TrainingCard\TrainingCard;
use App\Models\Visa\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Input\Input;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['client'] = Client::where('client_status', 1)->whereClientHasDeleted('NO')->orderBy('client_id','DESC')->get();
        return view('pages.client.client_list', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['accounts'] = Accounts::whereAccountHasDeleted('NO')->get();
        $data['client_job_type'] = JobType::where('job_type_has_deleted', 'NO')->get();
        return view('pages.client.create_client',$data);
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
            'client_name' => 'required',
        ]);



        $musa_file = '';
        if($request->hasFile('musaned_file'))
        {
            $musa_file = str::random(5).time().'.'.$request->musaned_file->extension();

            $request->musaned_file->move(public_path('uploads'), $musa_file);
        }
        $client_img = '';
        if($request->hasFile('image'))
        {
            $client_img = str::random(5).time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $client_img);
        }

        $client_nid_front = '';
        if($request->hasFile('client_nid_front'))
        {
            $client_nid_front = time().'-'.'nid-front'.'.'.$request->client_nid_front->extension();
            $request->client_nid_front->move(public_path('uploads'), $client_nid_front);
        }
        $client_nid_back = '';
        if($request->hasFile('client_nid_back'))
        {
            $client_nid_back = time().'-'.'nid-back'.'.'.$request->client_nid_back->extension();
            $request->client_nid_back->move(public_path('uploads'), $client_nid_back);
        }

        $client = new Client();
        $client->client_name = $request->client_name;
        $client->client_entry_id = $request->client_entry_id;
        $client->client_job_type = $request->client_job_type;
        $client->client_nid = $request->client_nid;
        $client->client_phone = $request->client_phone;
        $client->client_email = $request->client_email;
        $client->client_address = $request->client_address;
        $client->client_opening_balance = $request->client_opening_balance;
        $client->client_gender = $request->client_gender;
        $client->musaned = $request->musaned;
        $client->musaned_number = $request->musaned_number;
        $client->musaned_date = $request->musaned_date;
        $client->musaned_file = '/uploads/'.$musa_file;
        $client->client_nid_front = '/uploads/'.$client_nid_front;
        $client->client_nid_back = '/uploads/'.$client_nid_back;
        $client->exp_tc = $request->exp_tc;
        $client->mofa = $request->mofa;
        $client->e_chek = $request->e_chek;
        $client->client_date_of_birth = $request->client_date_of_birth;
        $client->present_age = $request->present_age;
        $client->client_picture = '/uploads/'.$client_img;
        $client->client_create_date = date("Y-m-d");
        $client->client_status = true;
        $client->father_name = $request->father_name;
        $client->mother_name = $request->mother_name;
        $client->spouse_name = $request->spouse_name;
        $client->martial_status = $request->martial_status;
        $client->target_country = $request->target_country;
        $client->visa_type = $request->visa_type;
        $client->village_house = $request->village_house;
        $client->ward = $request->ward;
        $client->district = $request->district;
        $client->police_station = $request->police_station;
        $client->religion = $request->religion;
        $client->remarks = $request->remarks;
        $client->emergency_person_contact_no = $request->emergency_person_contact_no;
        $client->save();

        $client_agent = new ClientAgent();
        $client_agent->client_id = $client->id;
        $client_agent->agent_id = $request->agent_id;
        $client_agent->save();

        $client_deligate = new ClientDeligate();
        $client_deligate->client_id = $client->id;
        $client_deligate->deligate_id = $request->deligate_id;
        $client_deligate->save();


       if ($request->transaction_type != '') {
            $client_account_transaction = new ClientTransaction();
            if ($request->transaction_type == 'advance') {
                $client_account_transaction->client_transaction_type = 'CREDIT';
            }else {
                $client_account_transaction->client_transaction_type = 'DEBIT';
            }
            $client_account_transaction->client_transaction_account_id = $client->id;
            $client_account_transaction->client_transaction_client_id = $client->id;
            if ($request->transaction_type == NULL) {
            $client_account_transaction->client_transaction_opening_balance = 0;
            $client_account_transaction->client_transaction_amount = 0;
            }else{
            $client_account_transaction->client_transaction_opening_balance = $request->client_opening_balance;
            $client_account_transaction->client_transaction_amount = $request->client_opening_balance;
            }
            $client_account_transaction->client_transaction_date = date("Y-m-d");
            $client_account_transaction->client_transaction_create_date = date("Y-m-d");
            $client_account_transaction->save();

            $client_tansaction_id = $client_account_transaction->client_transaction_id;

            $update_client_transection = ClientTransaction::find($client_tansaction_id)->update([
                'client_transaction_last_balance' => get_client_current_balance_by_client_id($client->id)
            ]);


            $client_ledger = new ClientLedger();
            $client_ledger->client_id = $client->id;
            $client_ledger->client_transaction_id = $client_account_transaction->id;
            $client_ledger->client_ledger_type = 'OPENING_BALANCE';
            $client_ledger->client_ledger_status = true;
            $client_ledger->client_ledger_last_balance = get_client_current_balance_by_client_id($client->id);
            $client_ledger->client_ledger_date = date("Y-m-d");
            $client_ledger->client_ledger_create_date = date("Y-m-d");
            $client_ledger->client_ledger_prepared_by = Auth::user()->id;

            if ($request->transaction_type == 'advance') {
                $client_ledger->client_ledger_dr = 0;
                $client_ledger->client_ledger_cr = $request->client_opening_balance;
            } else {
                $client_ledger->client_ledger_dr = $request->client_opening_balance;
                $client_ledger->client_ledger_cr = 0;
            }

            $client_ledger->save();

        if ($request->transaction_type != NULL) {

            $account = new AccountTrasection();
            if ($request->transaction_type == 'advance') {
              $account->transaction_type = 'CREDIT';
            } elseif($request->transaction_type == 'due') {
              $account->transaction_type = 'DEBIT';
            }
            $account->transaction_amount = $request->client_opening_balance;
            $account->transaction_client_id = $client->id;
            $account->transaction_account_id = $request->accounts;
            $account->transaction_date = date("Y-m-d");
            $account->transaction_create_date = date("Y-m-d");
            $account->transaction_create_date = date("Y-m-d");
            $account->save();
            }



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
        $data['client'] = Client::whereClientId($id)->get();
        // print_r($data['client']);die;

       $data['passportData'] = Passport::where('passport_client_id',$id)->first();
       $data['manpowerData'] = Manpower::where('manpower_client_id',$id)->first();
       $data['visaData'] = Visa::where('visa_client_id',$id)->first();
       $data['PoliceClearenceData'] = PoliceClearance::where('police_clearance_client_id',$id)->first();
       $data['TrainingData'] = TrainingCard::where('training_card_client_id',$id)->first();
       $data['MedicalTestData'] = MedicalTest::where('medical_test.medical_test_client_id',$id)->join('vendors','medical_test.medical_test_vendor_id','vendors.vendor_id')->select('medical_test.*','vendors.*')->first();
       $data['MedicalTestFinalData'] = FinalMedicalTest::where('final_medical_test.final_medical_test_client_id',$id)
       ->join('vendors','final_medical_test.final_medical_test_vendor_id','vendors.vendor_id')
       ->select('vendors.*','final_medical_test.*')
       ->first();

    return view('pages.client.view_client', $data);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['clientData'] = Client::where('clients.client_id', $id)->first();
        $data['agentData'] = ClientAgent::where('client_agents.client_id', $id)->join('agents','client_agents.agent_id','agents.agent_id')->select('agents.agent_name','agents.agent_id')->first();
        $data['deligateData'] = ClientDeligate::where('client_deligates.client_id', $id)->join('deligates','client_deligates.deligate_id','deligates.deligate_id')->select('deligates.deligate_name','deligates.deligate_id')->first();
        $data['jobtype'] = JobType::whereJobTypeHasDeleted('NO')->get();





        // $data['clientData'] = Client::where('clients.client_id', $id)->join('client_ledgers', 'client_ledgers.client_id', '=', 'clients.client_id')->join('client_transactions', 'client_transactions.client_transaction_account_id', '=', 'clients.client_id')->first();
        // echo '<pre>';
        // print_r($data['agentData']);die;

        return view('pages.client.edit_client', $data);
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

        $request->validate([
            'client_name' => 'required'
        ]);

        if($request->hasFile('musaned_file'))
        {
            $musaned_file_info= Client::where('client_id',$request->client_id)->first();

            // if($musaned_file_info->musaned_file !=null){

            //     $path = public_path().$musaned_file_info->musaned_file;
            //     //  print_r($path);die;
            //     unlink($path);
            // }
            $musaned_file_input = time().'-'.'client-musaneed'.'.'.$request->musaned_file->extension();

            $request->musaned_file->move(public_path('uploads'), $musaned_file_input);


            Client::where('client_id',$request->client_id)->update([
                'musaned_file' =>'/uploads/'.$musaned_file_input,
            ]);
        }
        if($request->hasFile('image'))
        {
            $client_file_info= Client::where('client_id',$request->client_id)->first();

            // if($client_file_info->image !=null){

            //     $path = public_path().$client_file_info->image;
            //     //  print_r($path);die;
            //     unlink($path);
            // }
            $client_file_input = time().'-'.'client-img'.'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $client_file_input);


            Client::where('client_id',$request->client_id)->update([
                'client_picture' =>'/uploads/'.$client_file_input,
            ]);
        }

        if($request->hasFile('client_nid_front'))
        {
            $client_nid_front = time().'-'.'client-nid-front'.'.'.$request->client_nid_front->extension();
            $request->client_nid_front->move(public_path('uploads'), $client_nid_front);

            Client::where('client_id',$request->client_id)->update([
                'client_nid_front' =>'/uploads/'.$client_nid_front,
            ]);
        }

        if($request->hasFile('client_nid_back'))
        {
            $client_nid_back = time().'-'.'client-nid-back'.'.'.$request->client_nid_back->extension();
            $request->client_nid_back->move(public_path('uploads'), $client_nid_back);

            Client::where('client_id',$request->client_id)->update([
                'client_nid_back' =>'/uploads/'.$client_nid_back,
            ]);
        }

        if ($request->transaction_type == 'advance') {
            $credit = $request->agent_opening_balance;
            $debit = 0;
        } else {
            $debit = $request->agent_opening_balance;
            $credit = 0;
        }





        // Client::where('clients.client_id', $id)->join('client_ledgers', 'client_ledgers.client_id', '=', 'clients.client_id')->join('client_transactions', 'client_transactions.client_transaction_account_id', '=', 'clients.client_id')->update([
        //     'client_entry_id' => $request->client_entry_id,
        //     'client_name' => $request->client_name,
        //     'client_nid' => $request->client_nid,
        //     'client_phone' => $request->client_phone,
        //     'client_email' => $request->client_email,
        //     'client_job_type' => $request->client_job_type,
        //     'client_address' => $request->client_address,
        //     'client_date_of_birth' => $request->client_date_of_birth,
        //     'client_gender' => $request->client_gender,
        //     'father_name' => $request->father_name,
        //     'mother_name' => $request->mother_name,
        //     'spouse_name' => $request->spouse_name,
        //     'martial_status' => $request->martial_status,
        //     'target_country' => $request->target_country,
        //     'visa_type' => $request->visa_type,
        //     'village_house' => $request->village_house,
        //     'ward' => $request->ward,
        //     'district' => $request->district,
        //     'police_station' => $request->police_station,
        //     'religion' => $request->religion,
        //     'remarks' => $request->remarks,
        //     'emergency_person_contact_no' => $request->emergency_person_contact_no,
        //      'musaned' => $request->musaned,
        //      'musaned_number' => $request->musaned_number,
        //     'exp_tc' => $request->exp_tc,
        //     'e_chek' => $request->e_chek,
        //     'mofa' => $request->mofa,
        //     'present_age' => $request->present_age,
        //     'client_opening_balance' => $request->client_opening_balance,
        //     'client_transaction_amount' => $request->client_opening_balance,
        //     'client_transaction_date' => date("Y/m/d"),
        //     'client_ledger_create_date' => date("Y/m/d"),
        //     'client_transaction_type' => $request->transaction_type,
        //     'client_ledger_cr' => $credit,
        //     'client_ledger_dr' => $debit,
        //     'updated_at' => date("Y/m/d")
        // ]);
        Client::where('clients.client_id', $id)->update([
            'client_entry_id' => $request->client_entry_id,
            'client_name' => $request->client_name,
            'client_nid' => $request->client_nid,
            'client_phone' => $request->client_phone,
            'client_email' => $request->client_email,
            'client_job_type' => $request->client_job_type,
            'client_address' => $request->client_address,
            'client_date_of_birth' => $request->client_date_of_birth,
            'client_gender' => $request->client_gender,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'spouse_name' => $request->spouse_name,
            'martial_status' => $request->martial_status,
            'target_country' => $request->target_country,
            'visa_type' => $request->visa_type,
            'village_house' => $request->village_house,
            'ward' => $request->ward,
            'district' => $request->district,
            'police_station' => $request->police_station,
            'religion' => $request->religion,
            'remarks' => $request->remarks,
            'emergency_person_contact_no' => $request->emergency_person_contact_no,
             'musaned' => $request->musaned,
             'musaned_number' => $request->musaned_number,
            'exp_tc' => $request->exp_tc,
            'e_chek' => $request->e_chek,
            'mofa' => $request->mofa,
            'present_age' => $request->present_age,
            // 'client_opening_balance' => $request->client_opening_balance,
            // 'client_transaction_amount' => $request->client_opening_balance,
            // 'client_transaction_date' => date("Y/m/d"),
            // 'client_ledger_create_date' => date("Y/m/d"),
            // 'client_transaction_type' => $request->transaction_type,
            // 'client_ledger_cr' => $credit,
            // 'client_ledger_dr' => $debit,
            'updated_at' => date("Y/m/d")
        ]);

        ClientAgent::where('client_id',$request->client_id)->update([
            'agent_id' =>$request->agent_id,
        ]);
        ClientDeligate::where('client_id',$request->client_id)->update([
            'deligate_id' =>$request->deligate_id,
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
        Client::where('client_id', $id)->where('client_has_deleted', 'NO')->update([
            'client_status' => 0,
            'client_has_deleted' => 'YES',
        ]);
    }
    public function clientSearch(Request $request)
    {

        $clients = Client::where('client_name','like',"%{$request->q}%")->orWhere('client_entry_id','like',"%{$request->q}%")->orWhere('client_phone','like',"%{$request->q}%")->get();
        // print_r($clients);
        // die;
        $client_array = array();
        foreach ($clients as $client) {
            $label = $client['client_name'] . '(' . $client['client_entry_id'] . ')';
            $value = intval($client['client_id']);
            // $agent_data = ClientAgent::where('client_agent.client_id',$value)->join('agents','agents.agent_id','client_agent.agent_id')->select('agents.agent_id','agents.agent_name','agents.agent_entry_id')->get();
            // $label1 = $agent_data->agent_name . '(' . $agent_data->agent_entry_id . ')';
            // $value1 = intval($agent_data->agent_id);
            // $client_array[] = array("label" => $label, "value" => $value, "label1" => $label1, "value1" => $value1);
            $client_array[] = array("label" => $label, "value" => $value);
            // $agent_array[] = array("label" => $label, "value" => $value);

        }
        $result = array('status' => 'ok', 'content' => $client_array);
        echo json_encode($result);
        exit;
    }
    public function agentSearch($id)
    {
        $agent =  ClientAgent::where('client_agents.client_id',$id)
        ->join('agents','agents.agent_id','client_agents.agent_id')
        ->select('agents.agent_id','agents.agent_name')
        ->get();
        $output = '';
        foreach($agent as $row)
        {
            $output .= '<option value = '.$row->agent_id. 'disabled selected'. '>'.$row->agent_name.'</option>';
        }
        return response()->json($output);
    }
    public function listClientCV()
    {
        $data['client'] = Client::where('client_status', 1)->whereClientHasDeleted('NO')->orderBy('client_id','DESC')->get();
        return view('pages.client.client_cv_list', $data);
    }

    public function viewCV($id)
    {
        return view('pages.client.view_client_cv');
    }

    public function clientListExcel()
    {
        $client = Client::where('client_status', 1)->whereClientHasDeleted('NO')->orderBy('client_id','DESC')->get();
        return Excel::download(new ClientList($client), 'client-list.xlsx');
    }

    public function flightList()
    {
        $flightList = DB::table('client_over_alls')->select('flight_number')->distinct()->get();
        return view('pages.dataEntry.flight_list',compact('flightList'));
    }
    public function clientflightList($id)
    {
        $clientList = ClientOverAll::where('flight_number',$id)->get();
        $data['flight'] = ClientOverAll::where('flight_number',$id)->first();
        return view('pages.client.flight_wise_client_list',compact('clientList'),$data);
    }
    public function manpowerOfficeList()
    {
        $officeList = DB::table('manpowers')->select('office_name','office_slug')->distinct('office_name')->get();
        return view('pages.dataEntry.office_list',compact('officeList'));
    }
    public function clientofficeList($id)
    {
        $clientList = Manpower::where('office_slug',$id)->get();
        $data['office'] = Manpower::where('office_slug',$id)->first();
        return view('pages.client.office_wise_client_list',compact('clientList'),$data);
    }
}
