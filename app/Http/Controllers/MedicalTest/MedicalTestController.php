<?php

namespace App\Http\Controllers\MedicalTest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalTest\MedicalTest;
use App\Models\Medical\Medical;
use App\Models\Clients\Client;
use Illuminate\Support\Facades\Auth;

class MedicalTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = MedicalTest::where('medical_test_has_deleted',0)
        ->join('vendors', 'medical_test.medical_test_vendor_id','=' , 'vendors.vendor_id')
        ->join('clients', 'medical_test.medical_test_client_id','=' , 'clients.client_id')
        ->get();
        // echo'<pre>';print_r($data['list']);die;
        return view('pages.medicaltest.medical_test_list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['medicaltest'] = MedicalTest::join('medicals', 'medical_test.medical_test_medical_id','=' , 'medicals.medical_id')
        // ->join('clients', 'medical_test.medical_test_client_id','=' , 'clients.client_id')
        // ->get();
        return view('pages.medicaltest.create_medical_test');
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
            'medical_test_vendor_id' => 'required',
            'medical_test_client_id' => 'required',
            'medicaltest_file' => 'mimes:pdf,xlx,csv,jpg,png,jpeg|max:2048',
        ]);

        $fileName = time() . '.' . $request->medicaltest_file->extension();

        $request->medicaltest_file->move(public_path('uploads'), $fileName);


        $medicaltest = new MedicalTest();


        $medicaltest->medical_test_vendor_id = $request->medical_test_vendor_id;
        $medicaltest->medical_test_client_id = $request->medical_test_client_id;
        $medicaltest->medical_test_client_status = $request->medical_test_client_status;
        $medicaltest->medical_test_processing_cost = $request->medical_test_processing_cost;
        $medicaltest->medical_test_issue_date = $request->medical_test_issue_date;
        $medicaltest->medical_test_expiry_date = $request->medical_test_expiry_date;
        $medicaltest->note = $request->note;
        $medicaltest->medical_test_has_deleted = 0;
        $medicaltest->medicaltest_file = '/uploads/' . $fileName;
        $medicaltest->medical_test_create_date = date('Y-m-d');
        $medicaltest->medical_test_created_by = Auth::user()->id;

        $medicaltest->save();
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
        $data['medicaltest'] = MedicalTest::where('medical_test_id',$id)
        ->join('vendors', 'medical_test.medical_test_vendor_id','=' , 'vendors.vendor_id')
        ->join('clients', 'medical_test.medical_test_client_id','=' , 'clients.client_id')
        ->get();
    //    echo'<pre>';print_r($data);die;
       return view('pages.medicaltest.edit_medical_test',$data);
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
            'medical_test_vendor_id' => 'required',
        ]);


        if ($request->hasFile('medicaltest_file')) {
            $file_info = MedicalTest::where('medical_test_id', $id)->first();

            if ($file_info->medicaltest_file != null) {

                $path = public_path() . $file_info->medicaltest_file;
                //  print_r($path);die;
                unlink($path);
            }
            $fileName = time() . '.' . $request->medicaltest_file->extension();

            $request->medicaltest_file->move(public_path('uploads'), $fileName);


            // Passport::where('police_clearance_id', $request->police_clearance_id)->update([
            //     'police_clearance_file' => '/uploads/' . $fileName,
            // ]);
        }

        $medicaltest = MedicalTest::where('medical_test_id',$id)->update([

            'medical_test_vendor_id' => $request->medical_test_vendor_id,
            'medical_test_client_id'  => $request->medical_test_client_id,
            'medical_test_processing_cost'  => $request->medical_test_processing_cost,
            'medical_test_client_status' => $request->medical_test_client_status,
            'medical_test_issue_date' => $request->medical_test_issue_date,
            'medical_test_expiry_date' => $request->medical_test_expiry_date,
            'note' => $request->note,
            'medical_test_create_date' => date('Y-m-d'),
            'medical_test_created_by' => Auth::user()->id

        ]);




        // $medicaltest->medical_test_medical_id = $request->medical_test_medical_id;
        // $medicaltest->medical_test_client_id = $request->medical_test_client_id;
        // $medicaltest->medical_test_client_status = $request->medical_test_client_status;

        // $medicaltest->medical_test_create_date = date('Y-m-d');
        // $medicaltest->medical_test_created_by = Auth::user()->id;

        // $medicaltest->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {



        $medicaltest = MedicalTest::where('medical_test_id',$id)->update([
             'medical_test_has_deleted' => 1

        ]);


    }


    public function medicalSearch(Request $request)
    {
        $medicals = Medical::where('medical_name','like',"%{$request->q}%")->orWhere('medical_phone','like',"%{$request->q}%")->get();
        // print_r($clients);
        // die;
        $medical_array = array();
        foreach ($medicals as $medical) {
            $label = $medical['medical_name'];
            $value = intval($medical['medical_id']);
            $medical_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $medical_array);
        echo json_encode($result);
        exit;
    }

    public function ClientsSearch(Request $request)
    {
        $clients = Client::where('client_name','like',"%{$request->q}%")->orWhere('client_phone','like',"%{$request->q}%")->get();
        // print_r($clients);
        // die;
        $client_array = array();
        foreach ($clients as $client) {
            $label = $client['client_name'];
            $value = intval($client['client_id']);
            $client_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $client_array);
        echo json_encode($result);
        exit;
    }
}
