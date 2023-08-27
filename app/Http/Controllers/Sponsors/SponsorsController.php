<?php

namespace App\Http\Controllers\Sponsors;

use App\Http\Controllers\Controller;
use App\Models\Ledger\SponsorLedger;
use App\Models\Sponsors\Sponsors;
use App\Models\SponsorTransaction\SponsorTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sponserData = Sponsors::where('sponsor_has_deleted','=',"NO")->get();
       return view('pages.sponsor.sponsor_list',compact('sponserData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = DB::table('countries')->get();
        return view('pages.sponsor.create_sponsor',compact('country'));
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
            'sponsor_name' => 'required',
            'sponsor_country_id' => 'required',
            // 'sponsor_phone' => 'required',
            // 'sponsor_email' => 'required',
        ]);

        $fileName1 = '';
        $fileName2 = '';

        if($request->hasFile('sponsor_licence_file'))
        {
            $fileName1 = time().'.'.$request->sponsor_licence_file->extension();
            $request->sponsor_licence_file->move(public_path('uploads'), $fileName1);
        }
        if($request->hasFile('sponsor_picture'))
        {
            $fileName2 = time().'.'.$request->sponsor_picture->extension();
            $request->sponsor_picture->move(public_path('uploads'), $fileName2);
        }


        $sponsor = new Sponsors();
        $sponsor->sponsor_name = $request->sponsor_name;
        $sponsor->sponsor_entry_id = $request->sponsor_entry_id;
        $sponsor->sponsor_country_id = $request->sponsor_country_id;
        $sponsor->sponsor_country_name = $request->sponsor_country_name;
        $sponsor->sponsor_phone = $request->sponsor_phone;
        $sponsor->sponsor_email = $request->sponsor_email;
        $sponsor->sponsor_licence_no = $request->sponsor_licence_no;
        $sponsor->sponsor_licence_file = $request->sponsor_licence_file;
        $sponsor->sponsor_picture = $request->sponsor_picture;
        $sponsor->sponsor_status = 1;
        $sponsor->sponsor_create_date =  date("Y/m/d");
        $sponsor->sponsor_created_by =  Auth::user()->id;
        $sponsor->sponsor_licence_file ='/uploads/'.$fileName1;
        $sponsor->sponsor_picture ='/uploads/'.$fileName2;
        $sponsor->save();

if($request->sponsor_transaction_type != NULL)
{
    $sponsor_account_transaction = new SponsorTransaction();
        $sponsor_account_transaction->sponsor_transaction_type = $request->sponsor_transaction_type;
        $sponsor_account_transaction->sponsor_transaction_account_id = $sponsor->id;
        $sponsor_account_transaction->sponsor_transaction_client_id = $sponsor->id;
        $sponsor_account_transaction->sponsor_transaction_amount = $request->sponsor_transaction_opening_balance;
        $sponsor_account_transaction->sponsor_transaction_opening_balance = $request->sponsor_transaction_opening_balance;
        $sponsor_account_transaction->sponsor_transaction_date = date("Y/m/d");
        $sponsor_account_transaction->sponsor_account_create_date = date("Y/m/d");
        $sponsor_account_transaction->sponsor_account_created_by = Auth::user()->id;
        $sponsor_account_transaction->save();

        $sponsor_tansaction_id = $sponsor_account_transaction->sponsor_transaction_id ;

        $update_sponsor_transaction = SponsorTransaction::find($sponsor_tansaction_id)->update([
            'sponsor_transaction_last_balance' => get_sponsor_current_balance_by_sponsor_id($sponsor->id)
        ]);


        $sponsor_ledger = new SponsorLedger();
        $sponsor_ledger->sponsor_id = $sponsor->id;
        $sponsor_ledger->sponsor_account_id = $sponsor->id;
        $sponsor_ledger->sponsor_transaction_id = $sponsor_account_transaction->sponsor_transaction_id;
        $sponsor_ledger->sponsor_ledger_type = 'opening_balance';
        $sponsor_ledger->sponsor_ledger_status = true;
        $sponsor_ledger->sponsor_ledger_last_balance = get_sponsor_current_balance_by_sponsor_id($sponsor->id);
        $sponsor_ledger->sponsor_ledger_date = date("Y/m/d");
        $sponsor_ledger->sponsor_ledger_create_date = date("Y/m/d");
        $sponsor_ledger->sponsor_ledger_prepared_by = Auth::user()->id;

        if ($request->sponsor_transaction_type == 'DEBIT') {
            $sponsor_ledger->sponsor_ledger_dr = 0;
            $sponsor_ledger->sponsor_ledger_cr = $request->sponsor_transaction_opening_balance;
        } else {
            $sponsor_ledger->sponsor_ledger_dr = $request->sponsor_transaction_opening_balance;
            $sponsor_ledger->sponsor_ledger_cr = 0;
        }

        $sponsor_ledger->save();
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
        // $data['data'] = Sponsors::where('sponsors.sponsor_id', $id)->first();
        $data['data'] = Sponsors::where('sponsors.sponsor_id', $id)
        ->first();

        // echo '<pre>';
        // print_r($data['data']);
        // die;
        // $data['payments'] = SponsorLedger::where('sponsor_id', $id)->where('sponsor_ledger_type','opening_balance')->first();
        $country = DB::table('countries')->get();

        return view('pages.sponsor.edit_sponsor',$data,compact('country'));
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
            'sponsor_name' => 'required',
            'sponsor_country_id' => 'required',
            // 'sponsor_phone' => 'required',
            // 'sponsor_email' => 'required',
            // 'sponsor_transaction_opening_balance' => 'required',
        ]);

        if($request->hasFile('sponsor_licence_file'))
        {
            $file_info= Sponsors::where('sponsor_id',$request->sponsor_id)->first();

            if($file_info->sponsor_licence_file !=null){

                $path = public_path().$file_info->sponsor_licence_file;
                //  print_r($path);die;
                unlink($path);
            }
            $fileName = time().'.'.$request->sponsor_licence_file->extension();

            $request->sponsor_licence_file->move(public_path('uploads'), $fileName);


            Sponsors::where('sponsor_id',$request->sponsor_id)->update([
                'sponsor_licence_file' =>'/uploads/'.$fileName,
            ]);
        }
        if($request->hasFile('sponsor_picture'))
        {
            $file_info= Sponsors::where('sponsor_id',$request->sponsor_id)->first();

            if($file_info->sponsor_picture !=null){

                $path = public_path().$file_info->sponsor_picture;
                //  print_r($path);die;
                unlink($path);
            }
            $fileName = time().'.'.$request->sponsor_picture->extension();

            $request->sponsor_picture->move(public_path('uploads'), $fileName);


            Sponsors::where('sponsor_id',$request->sponsor_id)->update([
                'sponsor_picture' =>'/uploads/'.$fileName,
            ]);
        }
        // if ($request->sponsor_transaction_type == 'debit') {
        //     $credit = $request->sponsor_transaction_opening_balance;
        //     $debit = 0;
        // } else {
        //     $debit = $request->sponsor_transaction_opening_balance;
        //     $credit = 0;
        // }
        // Sponsors::where('sponsors.sponsor_id', $request->sponsor_id)->join('sponsor_ledgers', 'sponsors.sponsor_id','=','sponsor_ledgers.sponsor_account_id' )->join('sponsor_transactions', 'sponsor_transactions.sponsor_transaction_account_id','=', 'sponsors.sponsor_id')->update([
        //     'sponsor_entry_id' => $request->sponsor_entry_id,
        //     'sponsor_name' => $request->sponsor_name,
        //     'sponsor_country_id' => $request->sponsor_country_id,
        //     'sponsor_country_name' => $request->sponsor_country_name,
        //     'sponsor_phone' => $request->sponsor_phone,
        //     'sponsor_email' => $request->sponsor_email,
        //     'sponsor_transaction_opening_balance' => $request->sponsor_transaction_opening_balance,
        //     'sponsor_transaction_amount' => $request->sponsor_transaction_amount,
        //     'sponsor_transaction_date' => date("Y/m/d"),
        //     'sponsor_ledger_create_date' => date("Y/m/d"),
        //     'sponsor_transaction_type' => $request->sponsor_transaction_type,
        //     'sponsor_ledger_cr' => $credit,
        //     'sponsor_ledger_dr' => $debit,
        //     'sponsor_account_updated_by' => Auth::user()->id,
        //     'sponsor_ledger_updated_by' => Auth::user()->id,
        //     'sponsor_updated_by' => Auth::user()->id,
        //     'updated_at' => date("Y/m/d")
        // ]);
        Sponsors::where('sponsors.sponsor_id', $request->sponsor_id)->update([
            'sponsor_entry_id' => $request->sponsor_entry_id,
            'sponsor_name' => $request->sponsor_name,
            'sponsor_country_id' => $request->sponsor_country_id,
            'sponsor_country_name' => $request->sponsor_country_name,
            'sponsor_phone' => $request->sponsor_phone,
            'sponsor_email' => $request->sponsor_email,
            'sponsor_licence_no' => $request->sponsor_licence_no,
            'sponsor_updated_by' => Auth::user()->id,
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

    }
    public function sponsorClear($id)
    {
        Sponsors::where('sponsors.sponsor_id', $id)->join('sponsor_ledgers', 'sponsors.sponsor_id','=','sponsor_ledgers.sponsor_account_id' )->join('sponsor_transactions', 'sponsor_transactions.sponsor_transaction_account_id','=', 'sponsors.sponsor_id')->update([
            'sponsor_account_deleted_by' => Auth::user()->id,
            'sponsor_deleted_by' => Auth::user()->id,
            'sponsor_account_deleted_by' => Auth::user()->id,
            'sponsor_account_status' => 0,
            'sponsor_status' => 0,
            'sponsor_ledger_status' => 0,
            'sponsor_ledger_is_deleted' => "YES",
            'sponsor_has_deleted' => "YES",
            'sponsor_account_has_deleted' => "YES",
        ]);
    }
}
