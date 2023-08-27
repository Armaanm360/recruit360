<?php

namespace App\Http\Controllers\Deligates;

use App\Http\Controllers\Controller;
use App\Models\Clients\ClientDeligate;
use App\Models\Deligates\Deligate;
use App\Models\DeligateTransaction\DeligateTransaction;
use App\Models\Ledger\DeligateLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeligatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deligateData = Deligate::where('deligate_has_deleted','=',"NO")->get();
        return view('pages.deligate.deligate_list',compact('deligateData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = DB::table('countries')->get();
        return view('pages.deligate.create_deligate',compact('country'));
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
            'deligate_name' => 'required',
            'deligate_country_id' => 'required',
            // 'deligate_phone' => 'required',
            // 'deligate_email' => 'required',
            // 'deligate_transaction_opening_balance' => 'required',
            // 'deligate_licence_file' => 'mimes:pdf,xlx,csv,jpg,png,jpeg|max:2048',
            // 'deligate_picture' => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        $fileName1 = '';
        $fileName2 = '';

        if($request->hasFile('deligate_licence_file'))
        {
            $fileName1 = time().'.'.$request->deligate_licence_file->extension();
            $request->deligate_licence_file->move(public_path('uploads'), $fileName1);
        }
        if($request->hasFile('deligate_picture'))
        {
            $fileName2 = time().'.'.$request->deligate_picture->extension();
            $request->deligate_picture->move(public_path('uploads'), $fileName2);
        }

        $deligate = new Deligate();
        $deligate->deligate_name = $request->deligate_name;
        $deligate->deligate_entry_id = $request->deligate_entry_id;
        $deligate->deligate_country_id = $request->deligate_country_id;
        $deligate->deligate_country_name = $request->deligate_country_name;
        $deligate->deligate_phone = $request->deligate_phone;
        $deligate->deligate_email = $request->deligate_email;
        $deligate->deligate_licence_no = $request->deligate_licence_no;
        $deligate->deligate_licence_file = $request->deligate_licence_file;
        $deligate->deligate_picture = $request->deligate_picture;
        $deligate->deligate_status = 1;
        $deligate->deligate_create_date =  date("Y/m/d");
        $deligate->deligate_created_by =  Auth::user()->id;
        $deligate->deligate_licence_file ='/uploads/'.$fileName1;
        $deligate->deligate_picture ='/uploads/'.$fileName2;
        $deligate->save();

if($request->deligate_transaction_type != NULL)
{

    $deligate_account_transaction = new DeligateTransaction();
    $deligate_account_transaction->deligate_transaction_type = $request->deligate_transaction_type;
    $deligate_account_transaction->deligate_transaction_account_id = $deligate->id;
    $deligate_account_transaction->deligate_transaction_client_id = $deligate->id;
    $deligate_account_transaction->deligate_transaction_amount = $request->deligate_transaction_opening_balance;
    $deligate_account_transaction->deligate_transaction_opening_balance = $request->deligate_transaction_opening_balance;
    $deligate_account_transaction->deligate_transaction_date = date("Y/m/d");
    $deligate_account_transaction->deligate_account_create_date = date("Y/m/d");
    $deligate_account_transaction->deligate_account_created_by = Auth::user()->id;
    $deligate_account_transaction->save();

    $deligate_tansaction_id = $deligate_account_transaction->deligate_transaction_id ;

    $update_deligate_transaction = DeligateTransaction::find($deligate_tansaction_id)->update([
        'deligate_transaction_last_balance' => get_deligate_current_balance_by_deligate_id($deligate->id)
    ]);

    $deligate_ledger = new DeligateLedger();
    $deligate_ledger->deligate_id = $deligate->id;
    $deligate_ledger->deligate_account_id = $deligate->id;
    $deligate_ledger->deligate_transaction_id = $deligate_account_transaction->deligate_transaction_id;
    $deligate_ledger->deligate_ledger_type = 'opening_balance';
    $deligate_ledger->deligate_ledger_status = true;
    $deligate_ledger->deligate_ledger_last_balance = get_deligate_current_balance_by_deligate_id($deligate->id);
    $deligate_ledger->deligate_ledger_date = date("Y/m/d");
    $deligate_ledger->deligate_ledger_create_date = date("Y/m/d");
    $deligate_ledger->deligate_ledger_prepared_by = Auth::user()->id;

    if ($request->deligate_transaction_type == 'DEBIT') {
        $deligate_ledger->deligate_ledger_dr = 0;
        $deligate_ledger->deligate_ledger_cr = $request->deligate_transaction_opening_balance;
    } else {
        $deligate_ledger->deligate_ledger_dr = $request->deligate_transaction_opening_balance;
        $deligate_ledger->deligate_ledger_cr = 0;
    }

    $deligate_ledger->save();
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
        // $data['data'] = Deligate::join('deligate_ledgers', 'deligates.deligate_id','=','deligate_ledgers.deligate_account_id' )
        // ->join('deligate_transactions', 'deligate_transactions.deligate_transaction_account_id','=', 'deligates.deligate_id')
        // ->where('deligates.deligate_id', $id)
        // ->first();
        $data['data'] = Deligate::where('deligates.deligate_id', $id)
        ->first();
        // echo '<pre>';
        // print_r($data['data']);
        // die;
        $country = DB::table('countries')->get();

        return view('pages.deligate.edit_deligate',$data,compact('country'));
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
            'deligate_name' => 'required',
            'deligate_country_id' => 'required',
            // 'deligate_phone' => 'required',
            // 'deligate_email' => 'required',
            // 'deligate_transaction_opening_balance' => 'required',
            // 'deligate_licence_file' => 'mimes:pdf,xlx,csv,jpg,png,jpeg|max:2048',
            // 'deligate_picture' => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        if($request->hasFile('deligate_licence_file'))
        {
            $file_info= Deligate::where('deligate_id',$request->deligate_id)->first();

            if($file_info->deligate_licence_file !=null){

                $path = public_path().$file_info->deligate_licence_file;
                //  print_r($path);die;
                unlink($path);
            }
            $fileName = time().'.'.$request->deligate_licence_file->extension();

            $request->deligate_licence_file->move(public_path('uploads'), $fileName);


            Deligate::where('deligate_id',$request->deligate_id)->update([
                'deligate_licence_file' =>'/uploads/'.$fileName,
            ]);
        }
        if($request->hasFile('deligate_picture'))
        {
            $file_info= Deligate::where('deligate_id',$request->deligate_id)->first();

            if($file_info->deligate_picture !=null){

                $path = public_path().$file_info->deligate_picture;
                //  print_r($path);die;
                unlink($path);
            }
            $fileName = time().'.'.$request->deligate_picture->extension();

            $request->deligate_picture->move(public_path('uploads'), $fileName);


            Deligate::where('deligate_id',$request->deligate_id)->update([
                'deligate_picture' =>'/uploads/'.$fileName,
            ]);
        }
        if ($request->deligate_transaction_type == 'DEBIT') {
            $credit = $request->deligate_transaction_opening_balance;
            $debit = 0;
        } else {
            $debit = $request->deligate_transaction_opening_balance;
            $credit = 0;
        }
        Deligate::where('deligates.deligate_id', $request->deligate_id)->update([
            'deligate_entry_id' => $request->deligate_entry_id,
            'deligate_name' => $request->deligate_name,
            'deligate_country_id' => $request->deligate_country_id,
            'deligate_country_name' => $request->deligate_country_name,
            'deligate_phone' => $request->deligate_phone,
            'deligate_email' => $request->deligate_email,
            // 'deligate_transaction_opening_balance' => $request->deligate_transaction_opening_balance,
            // 'deligate_transaction_amount' => $request->deligate_transaction_amount,
            // 'deligate_transaction_date' => date("Y/m/d"),
            // 'deligate_ledger_create_date' => date("Y/m/d"),
            // 'deligate_transaction_type' => $request->deligate_transaction_type,
            // 'deligate_ledger_cr' => $credit,
            // 'deligate_ledger_dr' => $debit,
            // 'deligate_account_updated_by' => Auth::user()->id,
            // 'deligate_ledger_updated_by' => Auth::user()->id,
            // 'deligate_updated_by' => Auth::user()->id,
            'updated_at' => date("Y/m/d")
        ]);
        // Deligate::where('deligates.deligate_id', $request->deligate_id)->join('deligate_ledgers', 'deligates.deligate_id','=','deligate_ledgers.deligate_account_id' )->join('deligate_transactions', 'deligate_transactions.deligate_transaction_account_id','=', 'deligates.deligate_id')->update([
        //     'deligate_entry_id' => $request->deligate_entry_id,
        //     'deligate_name' => $request->deligate_name,
        //     'deligate_country_id' => $request->deligate_country_id,
        //     'deligate_country_name' => $request->deligate_country_name,
        //     'deligate_phone' => $request->deligate_phone,
        //     'deligate_email' => $request->deligate_email,
        //     'deligate_transaction_opening_balance' => $request->deligate_transaction_opening_balance,
        //     'deligate_transaction_amount' => $request->deligate_transaction_amount,
        //     'deligate_transaction_date' => date("Y/m/d"),
        //     'deligate_ledger_create_date' => date("Y/m/d"),
        //     'deligate_transaction_type' => $request->deligate_transaction_type,
        //     'deligate_ledger_cr' => $credit,
        //     'deligate_ledger_dr' => $debit,
        //     'deligate_account_updated_by' => Auth::user()->id,
        //     'deligate_ledger_updated_by' => Auth::user()->id,
        //     'deligate_updated_by' => Auth::user()->id,
        //     'updated_at' => date("Y/m/d")
        // ]);
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

    public function deligateClear($id)
    {
        Deligate::where('deligates.deligate_id', $id)->join('deligate_ledgers', 'deligates.deligate_id','=','deligate_ledgers.deligate_account_id' )->join('deligate_transactions', 'deligate_transactions.deligate_transaction_account_id','=', 'deligates.deligate_id')->update([
            'deligate_account_deleted_by' => Auth::user()->id,
            'deligate_deleted_by' => Auth::user()->id,
            'deligate_account_deleted_by' => Auth::user()->id,
            'deligate_account_status' => 0,
            'deligate_status' => 0,
            'deligate_ledger_status' => 0,
            'deligate_ledger_is_deleted' => "YES",
            'deligate_has_deleted' => "YES",
            'deligate_account_has_deleted' => "YES",
        ]);
    }
    public function deligateClient($id)
    {
        $clientList = ClientDeligate::where('deligate_id',$id)->get();
        $data['deligate'] = Deligate::where('deligate_id',$id)->first();
        return view('pages.deligate.deligate_wise_client_list',compact('clientList'),$data);
    }

}
