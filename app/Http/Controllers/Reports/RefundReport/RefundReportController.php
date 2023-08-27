<?php

namespace App\Http\Controllers\Reports\RefundReport;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RefundReportController extends Controller
{
    public function index()
    {
        return view('pages.report.refund.index');
    }

    public function RefundReport(Request $request)
    {
       $daterange = $request->daterange;
       $date_range = str_replace(' ', '', $daterange);
       $date_range = explode('-', $date_range);
                 $to = Carbon::parse($date_range[1])->format('Y/m/d');
                 $from = Carbon::parse($date_range[0])->format('Y/m/d');
       $start_date = date('Y-m-d', strtotime( str_replace('/', '-', $from)));
       $end_date = date('Y-m-d', strtotime( str_replace('/', '-', $to)));


       $refundReport = DB::table('refunds')
       ->whereBetween('refund_create_date', [$start_date, $end_date ])
       ->get();

       $totalrefund =  DB::table('refunds')
       ->whereBetween('refund_create_date', [$start_date, $end_date ])
       ->sum('refund_return_price');
       $totalcharge =  DB::table('refunds')
       ->whereBetween('refund_create_date', [$start_date, $end_date ])
       ->sum('refund_charge');

       return view('pages.report.refund.refund_report',compact('refundReport','totalrefund','totalcharge'));
    }
}
