<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice\Invoice;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function sales_profit() {
       return view('pages.report.sales_profit.index'); 
    }
    
    public function get_sales_profit(Request $request) {
     $date_range = $request->daterange;
		$date_range = str_replace(' ', '', $date_range);
		$date_range = explode('-', $date_range);
                  $to = Carbon::parse($date_range[1])->format('Y/m/d');
                  $from = Carbon::parse($date_range[0])->format('Y/m/d');
		$data['from'] = date('Y-m-d', strtotime( str_replace('/', '-', $from)));
		$data['to'] = date('Y-m-d', strtotime( str_replace('/', '-', $to)));                
		$data['client_id'] = $request->client_id;                
		$data['client_name'] = $request->client_name;    
    if($request->client_id != ""){
                $data['sales'] = Invoice::whereInvoiceClientId($request->client_id)->whereDate('invoice_sales_date','>=', $data['from'])
            ->whereDate('invoice_sales_date','<=', $data['to'])
                    ->join("clients","clients.client_id","=","invoices.invoice_client_id")    
                        ->get();
  }else{
        $data['sales'] = Invoice::whereDate('invoice_sales_date','>=', $data['from'])
            ->whereDate('invoice_sales_date','<=', $data['to'])
                ->join("clients","clients.client_id","=","invoices.invoice_client_id")   
                ->get();  
  }
//                $data['collection'] = MoneyReciept::whereMoneyRecieptClientId($request->client_id)
//                        ->whereDate('money_reciept_payment_date','>=', $data['from'])
//            ->whereDate('money_reciept_payment_date','<=', $data['to'])->get();
//                echo '<pre>';print_r($data);die;
        return view('pages.report.sales_profit.get_sales_profit',$data);
    }
}
