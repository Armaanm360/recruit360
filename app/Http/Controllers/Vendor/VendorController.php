<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor\Vendor;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vendor::where('vendor_status',1)->get();
        return view('pages.vendor.vendor_list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.vendor.create_vendor');
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
            'vendor_name' => 'required',
        ]);


        $vendor = new Vendor();
        $vendor->vendor_name = $request->vendor_name;
        $vendor->vendor_entry_id = $request->vendor_entry_id;
        $vendor->vendor_nid = $request->vendor_nid;
        $vendor->vendor_company_name = $request->vendor_company_name;
        $vendor->vendor_phone = $request->vendor_phone;
        $vendor->vendor_email = $request->vendor_email;
        $vendor->vendor_address = $request->vendor_address;
        $vendor->vendor_create_date = date("Y-m-d");
        $vendor->vendor_created_by = Auth::user()->id;
        $vendor->vendor_status = true;
        $vendor->save();
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
       $data['data'] = Vendor::where('vendor_id',$id)->first();
       return view('pages.vendor.edit_vendor',$data);
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
        Vendor::where('vendor_id',$request->vendor_id)->update([
            'vendor_name' => $request->vendor_name,
            'vendor_entry_id' => $request->vendor_entry_id,
            'vendor_nid' => $request->vendor_nid,
            'vendor_company_name' => $request->vendor_company_name,
            'vendor_phone' => $request->vendor_phone,
            'vendor_email' => $request->vendor_email,
            'vendor_address' => $request->vendor_address,
            'vendor_updated_by' => Auth::user()->id,
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

    public function vendorClear($id)
    {
        Vendor::where('vendor_id',$id)->update([
            'vendor_status' => 0,
            'vendor_deleted_by' => Auth::user()->id,
            'vendor_has_deleted' => "YES",
        ]);
    }

    public function vendorSearch(Request $request)
    {
        $vendors = Vendor::where('vendor_name','like',"%{$request->q}%")->orWhere('vendor_entry_id','like',"%{$request->q}%")->orWhere('vendor_phone','like',"%{$request->q}%")->get();
        // print_r($clients);
        // die;
        $vendor_array = array();
        foreach ($vendors as $vendor) {
            $label = $vendor['vendor_name'] . '(' . $vendor['vendor_entry_id'] . ')';
            $value = intval($vendor['vendor_id']);
            $vendor_array[] = array("label" => $label, "value" => $value);
        }
        $result = array('status' => 'ok', 'content' => $vendor_array);
        echo json_encode($result);
        exit;
    }
}
