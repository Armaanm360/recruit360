<?php

namespace App\Http\Controllers\PoliceClearance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PoliceClearance\PoliceClearance;
use App\Models\Clients\Client;
use App\Models\Passport\Passport;
use Illuminate\Support\Facades\Auth;

class PoliceClearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = PoliceClearance::wherePoliceClearanceHasDeleted('NO')
        // table name
        // ->join('medicals', 'final_medical_test.final_medical_test_medical_id','=' , 'medicals.medical_id')
        ->join('clients', 'police_clearances.police_clearance_client_id','=' , 'clients.client_id')
        ->get();
        // echo'<pre>';print_r($data['list']);die;
        return view('pages.police_clearance.police_clearance_list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['policeclearance'] = PoliceClearance::
        // join('medicals', 'final_medical_test.final_medical_test_medical_id','=' , 'medicals.medical_id')
        join('clients', 'police_clearances.police_clearance_client_id','=' , 'clients.client_id')
        ->get();
        return view('pages.police_clearance.create_police_clearance');
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
            'police_clearance_client_id' => 'required',
            'police_clearance_file' => 'mimes:pdf,xlx,csv,jpg,png,jpeg|max:2048',
        ]);
        $fileName = time().'.'.$request->police_clearance_file->extension();

        $request->police_clearance_file->move(public_path('uploads'), $fileName);

        $policeclearance = new PoliceClearance();


        $policeclearance->police_clearance_client_id = $request->police_clearance_client_id;
        $policeclearance->police_clearance_vendor_id = $request->police_clearance_vendor_id;
        $policeclearance->police_clearance_no = $request->police_clearance_no;
        $policeclearance->police_clearance_status = $request->police_clearance_status;
        $policeclearance->police_clearence_processing_cost = $request->police_clearence_processing_cost;
        $policeclearance->police_clearance_file = '/uploads/'.$fileName;
        $policeclearance->note = $request->police_clearance_vendor_id;

        $policeclearance->police_clearance_create_date = date('Y-m-d');
        $policeclearance->police_clearance_created_by = Auth::user()->id;

        $policeclearance->save();
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
        $data['policeclearance'] = PoliceClearance::where('police_clearance_id',$id)
        // join('medicals', 'final_medical_test.final_medical_test_medical_id','=' , 'medicals.medical_id')
        ->join('clients', 'police_clearances.police_clearance_client_id','=' , 'clients.client_id')
        ->get();
        return view('pages.police_clearance.edit_police_clearance', $data);
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
            'police_clearance_client_id' => 'required',
            'police_clearance_file' => 'mimes:pdf,xlx,csv,jpg,png,jpeg|max:2048',
        ]);

         if($request->hasFile('police_clearance_file'))
        {
            $file_info= PoliceClearance::where('police_clearance_id',$request->police_clearance_id)->first();

            if($file_info->police_clearance_file !=null){

                $path = public_path().$file_info->police_clearance_file;
                //  print_r($path);die;
                unlink($path);
            }
            $fileName = time().'.'.$request->police_clearance_file->extension();

            $request->police_clearance_file->move(public_path('uploads'), $fileName);


            Passport::where('police_clearance_id',$request->police_clearance_id)->update([
                'police_clearance_file' =>'/uploads/'.$fileName,
            ]);
        }



        $policeclearance = PoliceClearance::where('police_clearance_id',$id)->update([

            'police_clearance_id' => $request->police_clearance_id,
            'police_clearence_processing_cost' => $request->police_clearence_processing_cost,
            'police_clearance_client_id'  => $request->police_clearance_client_id,
            'police_clearance_client_id'  => $request->police_clearance_client_id,
            'police_clearance_no'  => $request->police_clearance_no,
            'note'  => $request->note,
            'police_clearance_status' => $request->police_clearance_status,
            'police_clearance_create_date' => date('Y-m-d'),
            'police_clearance_created_by' => Auth::user()->id

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
        $policeclearance = PoliceClearance::where('police_clearance_id',$id)->update([
             'police_clearance_has_deleted' => 'YES'

        ]);
    }
}
