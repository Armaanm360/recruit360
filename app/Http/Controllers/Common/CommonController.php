<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Clients\Client;
use App\Models\Configuration\Head;
use App\Models\Configuration\Subhead;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function clientInfo($clientid)
    {
        $data['clientData'] = Client::where('clients.client_id', $clientid)->join('client_ledgers', 'client_ledgers.client_id', '=', 'clients.client_id')->join('client_transections', 'client_transections.client_transaction_account_id', '=', 'clients.client_id')->get();

     return $data['clientData'][0];

        
    }

    

    public function expenseSubHead($headid)
    {
        $sub = Subhead::where('head_id',$headid)->get();
            $output = '';
            $output .= '';
            foreach ($sub as $sub) {
                $output .= '<option class="text-bold" value="' . $sub->subhead_id  . '">' . $sub->sub_head_name . '</option>';
            }
            return $output;

      
    }

    public function normalCheck()
    {
        $html = view('pages.expense.test')->render();
        return $html;
    }




    
}
