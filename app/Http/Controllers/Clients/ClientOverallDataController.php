<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Clients\ClientOverAll;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ClientOverallDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientData = ClientOverAll::where('client_over_alls.client_over_alls_has_deleted','NO')->join('clients','clients.client_id','client_over_alls.client_id')->select('client_over_alls.*','clients.client_name','clients.client_entry_id')->get();

        return view('pages.client_overall_data.client_overall_data_list', compact('clientData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.client_overall_data.create_client_overall_data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mufa_file = '';
        if($request->hasFile('mofa_file'))
        {
            $mufa_file = str::random(5).time().$request->client_id.'.'.$request->mofa_file->extension();

            $request->mofa_file->move(public_path('uploads'), $mufa_file);
        }
        $fingur_file_input = '';
        if($request->hasFile('fingur_file'))
        {
            $fingur_file_input = str::random(5).time().$request->client_id.'.'.$request->fingur_file->extension();

            $request->fingur_file->move(public_path('uploads'), $fingur_file_input);
        }
        $bank_statement_file_input = '';
        if($request->hasFile('bank_statement_file'))
        {
            $bank_statement_file_input = str::random(5).time().$request->client_id.'.'.$request->bank_statement_file->extension();

            $request->bank_statement_file->move(public_path('uploads'), $bank_statement_file_input);
        }
        $bmet_file_input = '';
        if($request->hasFile('bmet_file'))
        {
            $bmet_file_input = str::random(5).time().$request->client_id.'.'.$request->bmet_file->extension();

            $request->bmet_file->move(public_path('uploads'), $bmet_file_input);
        }
        $flight_file_input = '';
        if($request->hasFile('flight_file'))
        {
            $flight_file_input = str::random(5).time().$request->client_id.'.'.$request->flight_file->extension();

            $request->flight_file->move(public_path('uploads'), $flight_file_input);
        }

        $client = new ClientOverAll();

        $client->client_id = $request->client_id;
        $client->mofa_number = $request->mofa_number;
        $client->mofa_file ='/uploads/'.$mufa_file;
        $client->fingur_status = $request->fingur_status;
        $client->fingur_file ='/uploads/'.$fingur_file_input;
        $client->bank_statement_status = $request->bank_statement_status;
        $client->bank_statement_file ='/uploads/'.$bank_statement_file_input;
        $client->bmet_status = $request->bmet_status;
        $client->bmet_file ='/uploads/'.$bmet_file_input;
        $client->flight_airline = $request->flight_airline;
        $client->flight_date = $request->flight_date;
        $client->flight_number = $request->flight_number;
        $client->flight_ticket_number = $request->flight_ticket_number;
        $client->flight_file ='/uploads/'.$flight_file_input;
        $client->client_over_alls_create_date = date('Y/m/d');
        $client->client_over_alls_created_by = Auth::user()->id;
        $client->save();
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
        $data['data'] = ClientOverAll::where('client_overall_id',$id)->first();
        $data['clientName'] = ClientOverAll::join('clients','client_over_alls.client_id','clients.client_id')
        ->select('clients.client_name')->where('client_over_alls.client_overall_id',$id)->first();
        return view('pages.client_overall_data.edit_client_overall_data',$data);
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
        if($request->hasFile('mofa_file'))
        {
            $mofa_file_info= ClientOverAll::where('client_overall_id',$request->client_overall_id)->first();

            if($mofa_file_info->mofa_file !=null){

                $path = public_path().$mofa_file_info->mofa_file;
                //  print_r($path);die;
                unlink($path);
            }
            $mufa_file = str::random(5).time().$request->client_id.'.'.$request->mofa_file->extension();

            $request->mofa_file->move(public_path('uploads'), $mufa_file);


            ClientOverAll::where('client_overall_id',$request->client_overall_id)->update([
                'mofa_file' =>'/uploads/'.$mufa_file,
            ]);
        }
        if($request->hasFile('bank_statement_file'))
        {
            $bank_statement_file_info= ClientOverAll::where('client_overall_id',$request->client_overall_id)->first();

            if($bank_statement_file_info->bank_statement_file !=null){

                $path = public_path().$bank_statement_file_info->bank_statement_file;
                //  print_r($path);die;
                unlink($path);
            }
            $bank_statement_file_input = str::random(5).time().$request->client_id.'.'.$request->bank_statement_file->extension();

            $request->bank_statement_file->move(public_path('uploads'), $bank_statement_file_input);


            ClientOverAll::where('client_overall_id',$request->client_overall_id)->update([
                'bank_statement_file' =>'/uploads/'.$bank_statement_file_input,
            ]);
        }

        if($request->hasFile('fingur_file'))
        {
            $fingur_file_info= ClientOverAll::where('client_overall_id',$request->client_overall_id)->first();

            if($fingur_file_info->fingur_file !=null){

                $path = public_path().$fingur_file_info->fingur_file;
                //  print_r($path);die;
                unlink($path);
            }
            $fingur_file_input = str::random(5).time().$request->client_id.'.'.$request->fingur_file->extension();

            $request->fingur_file->move(public_path('uploads'), $fingur_file_input);


            ClientOverAll::where('client_overall_id',$request->client_overall_id)->update([
                'fingur_file' =>'/uploads/'.$fingur_file_input,
            ]);
        }

        if($request->hasFile('bmet_file'))
        {
            $bmet_file_info= ClientOverAll::where('client_overall_id',$request->client_overall_id)->first();

            if($bmet_file_info->bmet_file !=null){

                $path = public_path().$bmet_file_info->bmet_file;
                //  print_r($path);die;
                unlink($path);
            }
            $bmet_file_input = str::random(5).time().$request->client_id.'.'.$request->bmet_file->extension();

            $request->bmet_file->move(public_path('uploads'), $bmet_file_input);


            ClientOverAll::where('client_overall_id',$request->client_overall_id)->update([
                'bmet_file' =>'/uploads/'.$bmet_file_input,
            ]);
        }

        if($request->hasFile('flight_file'))
        {
            $flight_file_info= ClientOverAll::where('client_overall_id',$request->client_overall_id)->first();

            if($flight_file_info->flight_file !=null){

                $path = public_path().$flight_file_info->flight_file;
                //  print_r($path);die;
                unlink($path);
            }
            $flight_file = str::random(5).time().$request->client_id.'.'.$request->flight_file->extension();

            $request->flight_file->move(public_path('uploads'), $flight_file);


            ClientOverAll::where('client_overall_id',$request->client_overall_id)->update([
                'flight_file' =>'/uploads/'.$flight_file,
            ]);
        }
        ClientOverAll::where('client_overall_id',$request->client_overall_id)->update([
            'client_id' => $request->client_id,
            'mofa_number' => $request->mofa_number,
            'fingur_status' => $request->fingur_status,
            'bank_statement_status' => $request->bank_statement_status,
            'bmet_status' => $request->bmet_status,
            'flight_airline' => $request->flight_airline,
            'flight_ticket_number' => $request->flight_ticket_number,
            'flight_number' => $request->flight_number,
            'flight_date' => $request->flight_date,
            'flight_date' => $request->flight_date,
            'client_over_alls_updated_by' => Auth::user()->id,
            'updated_at' => date('Y/m/d')
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
        ClientOverAll::where('client_overall_id',$id)->update([
            'client_over_alls_has_deleted' => 'YES',
            'client_over_alls_deleted_by' => Auth::user()->id,
        ]);
    }
}
