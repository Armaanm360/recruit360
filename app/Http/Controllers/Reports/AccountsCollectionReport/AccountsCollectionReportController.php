<?php

namespace App\Http\Controllers\Reports\AccountsCollectionReport;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountsCollectionReportController extends Controller
{
    public function index()
    {
        // echo 1;
        // die;
        return view('pages.report.accounts-collection.index');
    }

    public function AccountsReport(Request $request)
    {
       $daterange = $request->daterange;
       $date_range = str_replace(' ', '', $daterange);
       $date_range = explode('-', $date_range);
                 $to = Carbon::parse($date_range[1])->format('Y/m/d');
                 $from = Carbon::parse($date_range[0])->format('Y/m/d');
       $start_date = date('Y-m-d', strtotime( str_replace('/', '-', $from)));
       $end_date = date('Y-m-d', strtotime( str_replace('/', '-', $to)));


       $moneyReceipt = DB::table('money_reciept')
       ->whereBetween('money_reciept_payment_date', [$start_date, $end_date ])
       ->get();

       $totalSales =  DB::table('money_reciept')
       ->whereBetween('money_reciept_payment_date', [$start_date, $end_date ])
       ->sum('money_reciept_total_amount');
       $totaldiscounts =  DB::table('money_reciept')
       ->whereBetween('money_reciept_payment_date', [$start_date, $end_date ])
       ->sum('money_reciept_total_discount');

       return view('pages.report.accounts-collection.collection_report',compact('moneyReceipt','totalSales','totaldiscounts'));
    }
}
