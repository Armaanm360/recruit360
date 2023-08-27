<?php

namespace App\Http\Controllers\Passport;

use App\Http\Controllers\Controller;
use App\Models\Configuration\status;
use App\Models\Passport\Passport;
use App\Models\Vendor\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passportData = Passport::join('users','passports.created_by','users.id')
        ->select('passports.*','users.name')
        ->where('passports.passport_has_deleted','=',"NO")
        ->get();
        return view('pages.dataEntry.passport_list',compact('passportData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dataEntry.create_passport');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
// $data = Auth::users()->id;

        $request->validate([
            'passport_no' => 'required',
            'passport_name' => 'required',
            'date_of_passport_issue' => 'required',
            'date_of_passport_expiry' => 'required',
        ]);

        $fileName = '';
if($request->hasFile('passport_document'))
{
    $fileName = time().'.'.$request->passport_document->extension();

    $request->passport_document->move(public_path('uploads'), $fileName);
}


        $passport = new Passport();

        $passport->passport_client_id = $request->clientId;
        $passport->passport_vendor_id = $request->passport_vendor_id;
        $passport->passport_no = $request->passport_no;
        $passport->passport_name = $request->passport_name;
        $passport->mobile_number = $request->mobile_number;
        $passport->date_of_birth = $request->date_of_birth;
        $passport->date_of_passport_issue = $request->date_of_passport_issue;
        $passport->email = $request->email;
        $passport->passport_reference = $request->passport_reference;
        $passport->passport_amount = $request->passport_amount;
        $passport->passport_document ='/uploads/'.$fileName;
        $passport->date_of_passport_expiry = $request->date_of_passport_expiry;
        $passport->passport_delivery_date = $request->passport_delivery_date;
        $passport->passport_receive_date = $request->passport_receive_date;
        $passport->passport_attached_date = $request->passport_attached_date;
        $passport->office_name = $request->office_name;

        // $startTimeStamp = strtotime($request->visa_issue_date);
        // $endTimeStamp = strtotime($request->visa_expiry_date);
        // $timeDiff = abs($endTimeStamp - $startTimeStamp);
        // $numberDays = $timeDiff / 86400; // 86400 seconds in one day
        // // and you might want to convert to integer
        // $numberDays = intval($numberDays);
        $passport->duration_left = $request->duration_left;
        $passport->note = $request->note;

        $passport->passport_creation_date = date("Y/m/d");
        $passport->created_by = Auth::user()->id;
        $passport->status = 1;
        $passport->passport_has_deleted = 'NO';
        $passport->save();
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
        $data['data'] = Passport::where('id',$id)->first();
        $data['clientName'] = Passport::join('clients','passports.passport_client_id','clients.client_id')
        ->select('clients.client_name')->where('passports.id',$id)->first();
        $data['vendorName'] = Passport::join('vendors','passports.passport_vendor_id','vendors.vendor_id')
        ->select('vendors.vendor_name')->where('passports.id',$id)->first();
        return view('pages.dataEntry.edit_passport',$data);
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
            'passport_no' => 'required',
            'passport_name' => 'required',
        ]);

        if($request->hasFile('passport_document'))
        {
            $file_info= Passport::where('id',$request->passport_id)->first();

            if($file_info->passport_document !=null){

                $path = public_path().$file_info->passport_document;
                //  print_r($path);die;
                unlink($path);
            }
            $fileName = time().'.'.$request->passport_document->extension();

            $request->passport_document->move(public_path('uploads'), $fileName);


            Passport::where('id',$request->passport_id)->update([
                'passport_document' =>'/uploads/'.$fileName,
            ]);
        }
        Passport::where('id',$request->passport_id)->update([
            'passport_client_id' => $request->clientId,
            'passport_vendor_id' => $request->passport_vendor_id,
            'passport_no' => $request->passport_no,
            'passport_name' => $request->passport_name,
            'mobile_number' => $request->mobile_number,
            'date_of_birth' => $request->date_of_birth,
            'date_of_passport_issue' => $request->date_of_passport_issue,
            'date_of_passport_expiry' => $request->date_of_passport_expiry,
            'duration_left' => $request->duration_left,
            'email' => $request->email,
            'note' => $request->note,
            'duration_left' => $request->numberDays,
            'passport_reference' => $request->passport_reference,
            'passport_amount' => $request->passport_amount,
            'passport_delivery_date' => $request->passport_delivery_date,
            'passport_receive_date' => $request->passport_receive_date,
            'passport_attached_date' => $request->passport_attached_date,
            'office_name' => $request->office_name,
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

    public function passportClear($id)
    {
        Passport::where('id',$id)->update([
            'deleted_by' => Auth::user()->id,
            'status' => 0,
            'passport_has_deleted' => "YES",
        ]);
    }

    public function passportStatusIndex()
    {
        $passportstatus = status::where('status_for','PASSPORT')->where('status_has_deleted','NO')->get();
        $passport = Passport::where('passport_has_deleted','NO')->get();
        return view('pages.dataEntry.passport_status',compact('passportstatus','passport'));
    }
    public function passportStatusEdit($id)
    {
        $data['passport'] = Passport::where('id',$id)->first();
        $data['passportstatus'] = status::where('status_for','PASSPORT')->where('status_has_deleted','NO')->get();
        return view('pages.dataEntry.passport_status_form',$data);
    }
    public function passportStatusUpdate(Request $request)
    {
        Passport::where('id',$request->passport_id)->update([
            'passport_status_action'=>1,
            'passport_status'=>$request->passport_status,
            'passport_status_date'=>$request->passport_status_date,
        ]);
    }

}
