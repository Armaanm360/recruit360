<?php

namespace App\Http\Controllers\Reports\ClientWiseSalesCollection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice\Invoice;
use App\Models\MoneyReciept\MoneyReciept;
use Illuminate\Support\Carbon;

class ClientWiseSalesCollectionController extends Controller
{
    public function index() {
        return view('pages.report.client_wise_collection_sales.index');
    }
    
    public function get_report(Request $request) {
      
        	$date_range = $request->daterange;
		$date_range = str_replace(' ', '', $date_range);
		$date_range = explode('-', $date_range);
                  $to = Carbon::parse($date_range[1])->format('Y/m/d');
                  $from = Carbon::parse($date_range[0])->format('Y/m/d');
		$data['from'] = date('Y-m-d', strtotime( str_replace('/', '-', $from)));
		$data['to'] = date('Y-m-d', strtotime( str_replace('/', '-', $to))); 
                $data['client_id'] = $request->client_id;
                $data['client_name'] = $request->client_name;
                $data['sales'] = Invoice::whereInvoiceClientId($request->client_id)->whereDate('invoice_sales_date','>=', $data['from'])
            ->whereDate('invoice_sales_date','<=', $data['to'])->get();
                $data['collection'] = MoneyReciept::whereMoneyRecieptClientId($request->client_id)
                        ->whereDate('money_reciept_payment_date','>=', $data['from'])
            ->whereDate('money_reciept_payment_date','<=', $data['to'])->get();
//                echo '<pre>';print_r($data);die;
        return view('pages.report.client_wise_collection_sales.get_client_wise_collection_sales',$data);
    }
}
