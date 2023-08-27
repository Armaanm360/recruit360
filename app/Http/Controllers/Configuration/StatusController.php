<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use App\Models\Configuration\status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
   public function index()
   {
    $status = status::where('status_has_deleted','NO')->get();
    return view('pages.status.status_list',compact('status'));
   }
   public function create()
   {
    return view('pages.status.create_status');
   }
   public function store(Request $request)
   {
        status::insert([
            'status_entry'=>$request->status_entry,
            'status'=>$request->status,
            'status_for'=>$request->status_for,
            'status_created_by'=>Auth::user()->id,
            'status_create_date'=>date('y/m/d'),
            'created_at'=>Carbon::now(),
        ]);
   }
   public function edit($id)
   {
       $data['status'] = status::where('id',$id)->first();
       return view('pages.status.edit_status',$data);
   }
   public function updatedata(Request $request)
    {
        status::where('id',$request->status_id)->update([
            'status_entry'=>$request->status_entry,
            'status'=>$request->status,
            'status_for'=>$request->status_for,
            'status_updated_by'=>Auth::user()->id,
            'updated_at'=>Carbon::now(),
        ]);
    }
    public function deletedata($id)
    {
        status::where('id',$id)->update([
            'status_has_deleted'=>'YES',
            'status_deleted_by'=>Auth::user()->id,
        ]);
    }

}
