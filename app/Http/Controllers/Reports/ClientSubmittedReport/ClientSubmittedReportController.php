<?php

namespace App\Http\Controllers\Reports\ClientSubmittedReport;

use App\Http\Controllers\Controller;
use App\Models\Manpower\Manpower;
use App\Models\MedicalTest\FinalMedicalTest;
use App\Models\MedicalTest\MedicalTest;
use App\Models\Passport\Passport;
use App\Models\PoliceClearance\PoliceClearance;
use App\Models\TrainingCard\TrainingCard;
use App\Models\Visa\Visa;
use Illuminate\Http\Request;

class ClientSubmittedReportController extends Controller
{
    public function index()
    {
        return view('pages.report.client-submitted-report.index');
    }

    public function clientSubmittedReport(Request $request)
    {
       $client_id = $request->client_id;

       $passportData = Passport::where('passport_client_id',$client_id)->get();
       $manpowerData = Manpower::where('manpower_client_id',$client_id)->get();
       $visaData = Visa::where('visa_client_id',$client_id)->get();
       $PoliceClearenceData = PoliceClearance::where('police_clearance_client_id',$client_id)->get();
       $TrainingData = TrainingCard::where('training_card_client_id',$client_id)->get();
       $MedicalTestData = MedicalTest::where('medical_test.medical_test_client_id',$client_id)->join('vendors','medical_test.medical_test_vendor_id','vendors.vendor_id')->select('medical_test.*','vendors.*')->get();
       $MedicalTestFinalData = FinalMedicalTest::where('final_medical_test.final_medical_test_client_id',$client_id)
       ->join('vendors','final_medical_test.final_medical_test_vendor_id','vendors.vendor_id')
       ->select('vendors.*','final_medical_test.*')
       ->get();

       return view('pages.report.client-submitted-report.submitted_report',compact('passportData','manpowerData','visaData','PoliceClearenceData','TrainingData','MedicalTestData','MedicalTestFinalData'));
    }
}
