<?php

namespace App\Http\Controllers\Configuration\JobType;

use App\Http\Controllers\Controller;
use App\Models\Configuration\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = JobType::whereJobTypeHasDeleted('NO')->get();
        return view('pages.jobtype.list_of_jobtype', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.jobtype.create_jobtype');
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
            'jobtype' => 'required',
        ]);

        $jobtype = new JobType();
        $jobtype->jobtype = $request->jobtype;
        $jobtype->jobtype_status = 1;
        $jobtype->jobtype_create_date = date('Y-m-d');
        $jobtype->jobtype_created_by = Auth::user()->id;
        $jobtype->save();
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
        $data['jobtype'] = JobType::where('jobtype_id', $id)->first();
        return view('pages.jobtype.edit_jobtype', $data);
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
            'jobtype' => 'required',
        ]);


        $jobtype = JobType::find($id);


        $jobtype->jobtype = $request->jobtype;
        $jobtype->jobtype_status = 1;
        $jobtype->jobtype_create_date = date('Y-m-d');
        $jobtype->jobtype_created_by = Auth::user()->id;

        $jobtype->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobtype = JobType::find($id);
        $jobtype->job_type_has_deleted = "YES";
        $jobtype->save();
    }
}
