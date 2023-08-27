<?php

namespace App\Http\Controllers\Configuration;


use App\Http\Controllers\Controller;
use App\Models\Medical\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = Medical::whereMedicalHasDeleted('NO')->get();  
        return view('pages.medical.medical_list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.medical.create_medical');
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
            'medical_name' => 'required',
        ]);

        
        $medical = new Medical();

        
        $medical->medical_name = $request->medical_name;
        $medical->medical_phone = $request->medical_phone;
        $medical->medical_remarks = $request->medical_remarks;
        $medical->medical_cost_amount = $request->medical_cost_amount;
        $medical->medical_status = 1;
        $medical->medical_create_date = date('Y-m-d');
        $medical->medical_created_by = Auth::user()->id;
       
        $medical->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medical\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function show(Medical $medical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medical\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['medical'] = Medical::where('medical_id',$id)->first();
       return view('pages.medical.edit_medical',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medical\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'medical_name' => 'required',
        ]);

        
        $medical = Medical::find($id);

        
        $medical->medical_name = $request->medical_name;
        $medical->medical_phone = $request->medical_phone;
        $medical->medical_remarks = $request->medical_remarks;
        $medical->medical_cost_amount = $request->medical_cost_amount;
        $medical->medical_status = 1;
        $medical->medical_create_date = date('Y-m-d');
        $medical->medical_created_by = Auth::user()->id;
       
        $medical->save();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medical\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medical = Medical::find($id);
        $medical->medical_has_deleted = "YES";

        $medical->save();

        //        Medical::where('medical_id', $id)->where('medical_has_deleted', 'NO')->update([
        //     'medical_has_deleted' => 'YES',
        // ]);
    }
}