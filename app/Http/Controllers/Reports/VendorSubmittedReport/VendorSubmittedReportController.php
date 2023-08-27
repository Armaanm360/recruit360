<?php

namespace App\Http\Controllers\Reports\VendorSubmittedReport;

use App\Http\Controllers\Controller;
use App\Models\Manpower\Manpower;
use App\Models\MedicalTest\FinalMedicalTest;
use App\Models\MedicalTest\MedicalTest;
use App\Models\Passport\Passport;
use App\Models\PoliceClearance\PoliceClearance;
use App\Models\TrainingCard\TrainingCard;
use App\Models\Visa\Visa;
use Illuminate\Http\Request;

class VendorSubmittedReportController extends Controller
{
    public function index()
    {
        return view('pages.report.vendor-submitted-report.index');
    }

    public function vendorSubmittedReport(Request $request)
    {
       $vendor_id = $request->vendor_id;

       $data['passportamount'] = Passport::where('passport_vendor_id',$vendor_id)->where('passport_has_deleted',"NO")->sum('passport_amount');
       $passportList = Passport::where('passports.passport_vendor_id',$vendor_id)->where('passports.passport_has_deleted',"NO")->join('clients','passports.passport_client_id','clients.client_id')->select('passports.*','clients.client_name')->get();
       $data['manpowerData'] = Manpower::where('manpower_vendor_id',$vendor_id)->where('is_deleted',"NO")->sum('processing_cost');
       $manpowerList = Manpower::where('manpowers.manpower_vendor_id',$vendor_id)->where('manpowers.is_deleted',"NO")->join('clients','manpowers.manpower_client_id','clients.client_id')->select('manpowers.*','clients.client_name')->get();
       $data['visaData'] = Visa::where('visa_vendor_id',$vendor_id)->where('visa_has_deleted',"NO")->sum('visa_amount');
       $visaList = Visa::where('visa_information.visa_vendor_id',$vendor_id)->where('visa_information.visa_has_deleted',"NO")->join('clients','visa_information.visa_client_id','clients.client_id')->select('visa_information.*','clients.client_name')->get();
       $data['policeClearenceData'] = PoliceClearance::where('police_clearance_vendor_id',$vendor_id)->where('police_clearance_has_deleted',"NO")->sum('police_clearence_processing_cost');
       $policeClearenceList = PoliceClearance::where('police_clearances.police_clearance_vendor_id',$vendor_id)->where('police_clearances.police_clearance_has_deleted',"NO")->join('clients','police_clearances.police_clearance_client_id','clients.client_id')->select('police_clearances.*','clients.client_name')->get();
       $data['trainingData'] = TrainingCard::where('training_card_vendor_id',$vendor_id)->where('training_card_has_deleted',"NO")->sum('training_card_processing_cost');
       $trainingList = TrainingCard::where('training_cards.training_card_vendor_id',$vendor_id)->where('training_cards.training_card_has_deleted',"NO")->join('clients','training_cards.training_card_client_id','clients.client_id')->select('training_cards.*','clients.client_name')->get();
       $data['medicalTestData'] = MedicalTest::where('medical_test_vendor_id',$vendor_id)->where('medical_test_has_deleted',"NO")->sum('medical_test_processing_cost');
       $medicalListList = MedicalTest::where('medical_test.medical_test_vendor_id',$vendor_id)->where('medical_test.medical_test_has_deleted',"NO")->join('clients','medical_test.medical_test_client_id','clients.client_id')->select('medical_test.*','clients.client_name')->get();
       $data['medicalTestFinalData'] = FinalMedicalTest::where('final_medical_test_vendor_id',$vendor_id)->where('final_medical_test_has_deleted',"NO")->sum('final_medical_test_processing_cost');
       $finalmedicalListList = FinalMedicalTest::where('final_medical_test.final_medical_test_vendor_id',$vendor_id)->where('final_medical_test.final_medical_test_has_deleted',"NO")->join('clients','final_medical_test.final_medical_test_client_id','clients.client_id')->select('final_medical_test.*','clients.client_name')->get();

       return view('pages.report.vendor-submitted-report.submitted_report',$data,compact('passportList','manpowerList','visaList','policeClearenceList','trainingList','trainingList','medicalListList','finalmedicalListList'));
    }
}
