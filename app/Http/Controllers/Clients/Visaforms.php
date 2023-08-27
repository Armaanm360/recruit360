<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Clients\Client;
use App\Models\Clients\ClientOverAll;
use App\Models\Passport\Passport;
use App\Models\Visa\Visa;
use App\Models\Configuration\CompanyInfo;
use Illuminate\Http\Request;

class Visaforms extends Controller
{
    public function saudiClient()
    {
        $data['client'] = Client::where('client_status', 1)->whereClientHasDeleted('NO')->orderBy('client_id','DESC')->get();
        return view('pages.visa_forms.client_list_saudi', $data);
    }
    public function saudiForms($id)
    {
        $data['client'] = Client::where('client_id',$id)->first();
        $data['passportData'] = Passport::where('passport_client_id',$id)->first();
       $data['client_extra'] = ClientOverAll::where('client_id',$id)->first();
       $data['visaData'] = Visa::where('visa_client_id',$id)->first();
       $data['company'] = CompanyInfo::where('company_id',1)->first();


       return view('pages.visa_forms.view_visa_form_saudi', $data);
    }
}
