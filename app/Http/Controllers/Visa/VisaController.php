<?php

namespace App\Http\Controllers\Visa;

use App\Http\Controllers\Controller;
use App\Models\Configuration\status;
use Illuminate\Http\Request;
use App\Models\Visa\Visa;

class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = Visa::whereVisaHasDeleted('NO')->join('clients','visa_information.visa_client_id','clients.client_id')->select('visa_information.*','clients.client_name')->get();
        return view('pages.visa.visa_list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.visa.create_visa');
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
            // 'visa_no' => 'required',
            'visa_issue_date' => 'required',
            'visa_expiry_date' => 'required',
            'visa_job_type' => 'required',
        ]);


        $visa = new Visa();


        $visa->visa_client_id = $request->client_id;
        $visa->visa_vendor_id = $request->vendor_id;
        // $visa->visa_no = $request->visa_no;
        $visa->visa_manual_id = $request->visa_manual_id;
        $visa->visa_issue_date = $request->visa_issue_date;
        $visa->visa_expiry_date = $request->visa_expiry_date;
        $visa->duration = $request->duration;
        $visa->visa_job_type = $request->visa_job_type;
        $visa->visa_gender_type = $request->visa_gender_type;
        $visa->visa_amount = $request->visa_amount;
        $visa->passenger_name = $request->passenger_name;
        $visa->nid_number = $request->nid_number;
        $visa->passport_number = $request->passport_number;
        $visa->reference_name = $request->reference_name;
        $visa->police_clearence_number = $request->police_clearence_number;
        $visa->medical_test_date = $request->medical_test_date;
        $visa->mobile_no = $request->mobile_no;
        $visa->office_date = $request->office_date;
        $visa->note = $request->note;

        $visa->save();
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
        $data['visa'] = Visa::find($id);
       return view('pages.visa.edit_visa',$data);

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
            'visa_no' => 'required',
        ]);

         $visa = Visa::find($id);


        $visa->visa_client_id = $request->client_id;
        $visa->visa_vendor_id = $request->vendor_id;
        // $visa->visa_no = $request->visa_no;
        $visa->visa_issue_date = $request->visa_issue_date;
        $visa->visa_manual_id = $request->visa_manual_id;
        $visa->visa_expiry_date = $request->visa_expiry_date;
        $visa->visa_job_type = $request->visa_job_type;
        $visa->visa_gender_type = $request->visa_gender_type;
        $visa->visa_amount = $request->visa_amount;
        $visa->duration = $request->duration;
        $visa->passenger_name = $request->passenger_name;
        $visa->nid_number = $request->nid_number;
        $visa->passport_number = $request->passport_number;
        // $visa->reference_name = $request->reference_name;
        $visa->police_clearence_number = $request->police_clearence_number;
        $visa->medical_test_date = $request->medical_test_date;
        $visa->mobile_no = $request->mobile_no;
        $visa->office_date = $request->office_date;
        $visa->note = $request->note;

        $visa->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visa = Visa::find($id);
        $visa->visa_has_deleted = "YES";

        $visa->save();
    }

    public function visaStatusIndex()
    {
        $visastatus = status::where('status_for','VISA')->where('status_has_deleted','NO')->get();
        $visa = Visa::where('visa_has_deleted','NO')->get();
        return view('pages.dataEntry.visa_status',compact('visastatus','visa'));
    }
    public function visaStatusEdit($id)
    {
        $data['visa'] = Visa::where('visa_id',$id)->first();
        $data['visastatus'] = status::where('status_for','VISA')->where('status_has_deleted','NO')->get();
        return view('pages.dataEntry.visa_status_form',$data);
    }
    public function visaStatusUpdate(Request $request)
    {
        Visa::where('visa_id',$request->visa_id)->update([
            'visa_status_action'=>1,
            'visa_status'=>$request->visa_status,
            'visa_status_date'=>$request->visa_status_date,
        ]);
    }
}
