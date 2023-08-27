<?php

namespace App\Http\Controllers\Manpower;

use App\Http\Controllers\Controller;
use App\Models\Manpower\Manpower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManpowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manpowerData = Manpower::where('manpowers.is_deleted','=',0)->join('clients','manpowers.manpower_client_id','clients.client_id')->select('manpowers.*','clients.client_name')->get();
        return view('pages.dataEntry.manpower_list',compact('manpowerData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dataEntry.create_manpower_office');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = '';
        if($request->office_name)
        {
            $new_str = str_replace(' ', '-', $request->office_name);
            $slug = $new_str ;
        }
        $manpower = new Manpower();

        $manpower->manpower_client_id = $request->manpower_client_id;
        // $manpower->manpower_vendor_id = $request->manpower_vendor_id;
        $manpower->office_name = $request->office_name;
        $manpower->office_slug = $slug;
        $manpower->office_address = $request->office_address;
        $manpower->manpower_manual_id = $request->manpower_manual_id;
        $manpower->manpower_issue_date = $request->manpower_issue_date;
        $manpower->manpower_expiry_date = $request->manpower_expiry_date;
        $manpower->duration = $request->duration;
        $manpower->passenger_name = $request->passenger_name;
        $manpower->nid_number = $request->nid_number;
        $manpower->police_clearence_number = $request->police_clearence_number;
        $manpower->medical_test_date = $request->medical_test_date;
        $manpower->mobile_no = $request->mobile_no;
        $manpower->office_date = $request->office_date;
        $manpower->passport_number = $request->passport_number;
        $manpower->manpower_gender_type = $request->manpower_gender_type;
        $manpower->job_type = $request->job_type;
        $manpower->comment = $request->comment;
        // $manpower->processing_cost = $request->processing_cost;
        $manpower->note = $request->note;
        $manpower->office_status = 1;
        $manpower->created_by = Auth::user()->id;
        $manpower->is_deleted = "NO";
        $manpower->save();
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
        $data['data'] = Manpower::where('id',$id)->first();
        return view('pages.dataEntry.edit_manpower_office',$data);
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
        Manpower::where('id',$request->manpower_office_id)->update([
            'manpower_client_id' => $request->manpower_client_id,
            'manpower_vendor_id' => $request->manpower_vendor_id,
            'office_name' => $request->office_name,
            'office_address' => $request->office_address,
            'manpower_manual_id' => $request->manpower_manual_id,
            'manpower_issue_date' => $request->manpower_issue_date,
            'manpower_expiry_date' => $request->manpower_expiry_date,
            'duration' => $request->duration,
            'passenger_name' => $request->passenger_name,
            'nid_number' => $request->nid_number,
            'passport_number' => $request->passport_number,
            'police_clearence_number' => $request->police_clearence_number,
            'medical_test_date' => $request->medical_test_date,
            'mobile_no' => $request->mobile_no,
            'manpower_gender_type' => $request->manpower_gender_type,
            'office_date' => $request->office_date,
            'job_type' => $request->job_type,
            'comment' => $request->comment,
            'note' => $request->note,
            'processing_cost' => $request->processing_cost,
            'updated_by' => Auth::user()->id,
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
        //
    }
    public function officeClear($id)
    {
        Manpower::where('id',$id)->update([
            'office_status' => 0,
            'deleted_by' => Auth::user()->id,
            'is_deleted' => "YES",
        ]);
    }
}
