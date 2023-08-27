<?php
namespace App\Http\Controllers\MedicalTest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalTest\FinalMedicalTest;
use App\Models\Medical\Medical;
use App\Models\MedicalTest\MedicalTest;
use App\Models\Clients\Client;
use Illuminate\Support\Facades\Auth;

class FinalMedicalTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = FinalMedicalTest::whereFinalMedicalTestHasDeleted('NO')
        // table name
        ->join('vendors', 'final_medical_test.final_medical_test_vendor_id','=' , 'vendors.vendor_id')
        ->join('clients', 'final_medical_test.final_medical_test_client_id','=' , 'clients.client_id')
        ->get();
        // echo'<pre>';print_r($data['list']);die;
        return view('pages.final_medical_test.final_medical_test_list',$data);
    }


       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['finalmedicaltest'] = FinalMedicalTest::join('vendors', 'final_medical_test.final_medical_test_vendor_id','=' , 'vendors.vendor_id')
        // ->join('clients', 'final_medical_test.final_medical_test_client_id','=' , 'clients.client_id')
        // ->get();
        return view('pages.final_medical_test.create_final_medical_test');
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
            'final_medical_test_vendor_id' => 'required',
            'medicaltest_file' => 'mimes:pdf,xlx,csv,jpg,png,jpeg|max:2048',
        ]);


        $fileName = time() . '.' . $request->medicaltest_file->extension();

        $request->medicaltest_file->move(public_path('uploads'), $fileName);

        $finalmedicaltest = new FinalMedicalTest();


        $finalmedicaltest->final_medical_test_vendor_id = $request->final_medical_test_vendor_id;
        $finalmedicaltest->final_medical_test_client_id = $request->final_medical_test_client_id;
        $finalmedicaltest->final_medical_test_client_status = $request->final_medical_test_client_status;
        $finalmedicaltest->final_medical_test_processing_cost = $request->final_medical_test_processing_cost;
        $finalmedicaltest->$fileName;
        $finalmedicaltest->medicaltest_file = $request->medicaltest_file;

        $finalmedicaltest->final_medical_test_create_date = date('Y-m-d');
        $finalmedicaltest->final_medical_test_created_by = Auth::user()->id;

        $finalmedicaltest->save();
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
        $data['finalmedicaltest'] = FinalMedicalTest::where('final_medical_test_id',$id)
        ->join('vendors', 'final_medical_test.final_medical_test_vendor_id','=' , 'vendors.vendor_id')
        ->join('clients', 'final_medical_test.final_medical_test_client_id','=' , 'clients.client_id')
        ->get();
    //    echo'<pre>';print_r($data);die;
       return view('pages.final_medical_test.edit_final_medical_test',$data);
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
            'final_medical_test_vendor_id' => 'required',
        ]);

        if ($request->hasFile('medicaltest_file')) {
            $file_info = FinalMedicalTest::where('final_medical_test_id', $id)->first();

            if ($file_info->medicaltest_file != null) {

                $path = public_path() . $file_info->medicaltest_file;
                //  print_r($path);die;
                unlink($path);
            }
            $fileName = time() . '.' . $request->medicaltest_file->extension();

            $request->medicaltest_file->move(public_path('uploads'), $fileName);
        }


        $finalmedicaltest = FinalMedicalTest::where('final_medical_test_id',$id)->update([

            'final_medical_test_vendor_id' => $request->final_medical_test_vendor_id,
            'final_medical_test_client_id'  => $request->final_medical_test_client_id,
            'final_medical_test_processing_cost'  => $request->final_medical_test_processing_cost,
            'final_medical_test_client_status' => $request->final_medical_test_client_status,
            'medicaltest_file' => $fileName,
            'note' => $request->note,
            'final_medical_test_create_date' => date('Y-m-d'),
            'final_medical_test_created_by' => Auth::user()->id

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



        $finalmedicaltest = FinalMedicalTest::where('final_medical_test_id',$id)->update([
             'final_medical_test_has_deleted' => 'YES'

        ]);


    }

}
