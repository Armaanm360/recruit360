<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use App\Models\Configuration\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CompanyInfo::where('is_deleted','=','NO')->get();
        return view('pages.company.company_list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.company.add_company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        // die();


        // $request->validate([
        //     'company_name' => 'required',
        //     'company_phone' => 'required|max:15',
        //     'company_email' => 'required'
        // ]);
        $request->validate([
            'company_logo' => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        $fileName = time().'.'.$request->company_logo->extension();

        $request->company_logo->move(public_path('company_image'), $fileName);

        $company = new CompanyInfo;

        $company->company_name = $request->company_name;
        $company->company_phone = $request->company_phone;
        $company->company_email = $request->company_email;
        $company->company_website = $request->company_website;
        $company->company_facebook_page = $request->company_facebook_page;
        $company->company_currency = $request->company_currency;
        $company->company_database_backup_email = $request->company_database_backup_email;
        $company->company_passport_limit = $request->company_passport_limit;
        $company->company_user_limit = $request->company_user_limit;
        $company->company_multiple_phone = $request->company_multiple_phone;
        $company->recruting_license_no = $request->recruting_license_no;

        $company->company_address = $request->company_address;
        $company->company_logo_width = $request->company_logo_width;
        $company->company_logo_height = $request->company_logo_height;
        $company->company_logo = '/company_image/'.$fileName;
        $company->created_by = Auth::user()->id;
        $company->company_status = 1;
        $company->is_deleted = "NO";
        $company->save();
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
        $data['data'] = CompanyInfo::where('company_id',$id)->first();
        return view('pages.company.edit_company',$data);
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

        // $company = CompanyInfo::find($id);





        // $company->company_name = $request->company_name;
        // $company->company_phone = $request->company_phone;
        // $company->company_email = $request->company_email;
        // $company->company_website = $request->company_website;
        // $company->company_facebook_page = $request->company_facebook_page;
        // $company->company_currency = $request->company_currency;
        // $company->company_database_backup_email = $request->company_database_backup_email;
        // $company->company_passport_limit = $request->company_passport_limit;
        // $company->company_user_limit = $request->company_user_limit;

        // $company->company_address = $request->company_address;
        // $company->company_logo_width = $request->company_logo_width;
        // $company->company_logo_height = $request->company_logo_height;
        // if ($request->company_logo) {
        //     $imageName = time() . '.' . $request->company_logo->extension();
        //     $request->company_logo->move(public_path('company_image'), $imageName);
        //     $company->company_logo = $imageName;
        // }

        // $company->update();

        $request->validate([
            'company_logo' => 'mimes:pdf,xlx,csv,jpg,png,jpeg|max:2048',
        ]);

        if($request->hasFile('company_logo'))
        {
            $file_info= CompanyInfo::where('company_id',$request->company_id)->first();

            if($file_info->company_logo !=null){

                $path = public_path().$file_info->company_logo;
                if (file_exists($path)) {
                    unlink($path);
                }
                //  print_r($path);die;

            }
            $fileName = time().'.'.$request->company_logo->extension();

            $request->company_logo->move(public_path('company_image'), $fileName);


            CompanyInfo::where('company_id',$request->company_id)->update([
                'company_logo' =>'/company_image/'.$fileName,
            ]);
        }
        CompanyInfo::where('company_id',$request->company_id)->update([
            'company_name' => $request->company_name,
            'company_phone' => $request->company_phone,
            'company_email' => $request->company_email,
            'company_website' => $request->company_website,
            'company_facebook_page' => $request->company_facebook_page,
            'company_multiple_phone' => $request->company_multiple_phone,
            'recruting_license_no' => $request->recruting_license_no,
            'company_currency' => $request->company_currency,
            'company_database_backup_email' => $request->company_database_backup_email,
            'company_passport_limit' => $request->company_passport_limit,
            'company_user_limit' => $request->company_user_limit,
            'company_address' => $request->company_address,
            'company_logo_width' => $request->company_logo_width,
            'company_logo_height' => $request->company_logo_height,
            'updated_by' => Auth::user()->id,
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

       return $id;

    }
    public function companyClear($id)
    {
        CompanyInfo::where('company_id',$id)->update([
            'deleted_by' => Auth::user()->id,
            'company_status' => 0,
            'is_deleted' => "YES",
        ]);
    }
}
