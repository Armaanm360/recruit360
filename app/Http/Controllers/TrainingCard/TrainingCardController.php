<?php

namespace App\Http\Controllers\TrainingCard;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingCard\TrainingCard;
use App\Models\Clients\Client;
use Illuminate\Support\Facades\Auth;

class TrainingCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = TrainingCard::whereTrainingCardHasDeleted('NO')
        // table name
        // ->join('medicals', 'final_medical_test.final_medical_test_medical_id','=' , 'medicals.medical_id')
        ->join('clients', 'training_cards.training_card_client_id','=' , 'clients.client_id')
        ->get();
        // echo'<pre>';print_r($data['list']);die;
        return view('pages.training_card.training-card-list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['trainingcard'] = TrainingCard::
        // join('medicals', 'final_medical_test.final_medical_test_medical_id','=' , 'medicals.medical_id')
        join('clients', 'training_cards.training_card_client_id','=' , 'clients.client_id')
        ->get();
        return view('pages.training_card.create-training-card');
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
            'training_card_client_id' => 'required',
            'training_card_file' => 'mimes:pdf,xlx,csv,jpg,png,jpeg|max:2048',
        ]);
        $fileName = time().'.'.$request->training_card_file->extension();

        $request->training_card_file->move(public_path('uploads'), $fileName);

        $trainingcard = new TrainingCard();


        $trainingcard->training_card_client_id = $request->training_card_client_id;
        $trainingcard->training_card_vendor_id = $request->training_card_vendor_id;
        $trainingcard->training_card_status = $request->training_card_status;
        $trainingcard->training_card_processing_cost = $request->training_card_processing_cost;
        $trainingcard->training_card_file = '/uploads/'.$fileName;

        $trainingcard->training_card_create_date = date('Y-m-d');
        $trainingcard->training_card_created_by = Auth::user()->id;

        $trainingcard->save();
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
        $data['trainingcard'] = TrainingCard::where('training_card_id',$id)
        // join('medicals', 'final_medical_test.final_medical_test_medical_id','=' , 'medicals.medical_id')
        ->join('clients', 'training_cards.training_card_client_id','=' , 'clients.client_id')
        ->get();
        return view('pages.training_card.edit-training-card', $data);
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
            'training_card_client_id' => 'required',
            'training_card_file' => 'mimes:pdf,xlx,csv,jpg,png,jpeg|max:2048',
        ]);

         if($request->hasFile('training_card_file'))
        {
            $file_info= TrainingCard::where('training_card_id',$request->training_card_id)->first();

            if($file_info->training_card_file !=null){

                $path = public_path().$file_info->training_card_file;
                //  print_r($path);die;
                unlink($path);
            }
            $fileName = time().'.'.$request->training_card_file->extension();

            $request->training_card_file->move(public_path('uploads'), $fileName);


            TrainingCard::where('training_card_id',$request->training_card_id)->update([
                'training_card_file' =>'/uploads/'.$fileName,
            ]);
        }



        $trainingcard = TrainingCard::where('training_card_id',$id)->update([

            'training_card_id' => $request->training_card_id,
            'training_card_client_id'  => $request->training_card_client_id,
            'training_card_vendor_id'  => $request->training_card_vendor_id,
            'training_card_status' => $request->training_card_status,
            'training_card_processing_cost' => $request->training_card_processing_cost,
            'training_card_create_date' => date('Y-m-d'),
            'training_card_created_by' => Auth::user()->id

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
        $trainingcard = TrainingCard::where('training_card_id',$id)->update([
             'training_card_has_deleted' => 'YES'

        ]);
    }
}
