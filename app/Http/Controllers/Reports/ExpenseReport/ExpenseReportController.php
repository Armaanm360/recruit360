<?php

namespace App\Http\Controllers\Reports\ExpenseReport;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseReportController extends Controller
{
    public function index()
    {
        return view('pages.report.expense.index');
    }

    public function ExpenseReport(Request $request)
    {
       $daterange = $request->daterange;
       $date_range = str_replace(' ', '', $daterange);
       $date_range = explode('-', $date_range);
                 $to = Carbon::parse($date_range[1])->format('Y/m/d');
                 $from = Carbon::parse($date_range[0])->format('Y/m/d');
       $start_date = date('Y-m-d', strtotime( str_replace('/', '-', $from)));
       $end_date = date('Y-m-d', strtotime( str_replace('/', '-', $to)));


       $expenseReport = DB::table('expenses')
       ->whereBetween('expense_date', [$start_date, $end_date ])
       ->get();

       $totalexpense =  DB::table('expenses')
       ->whereBetween('expense_date', [$start_date, $end_date ])
       ->sum('expense_amount');

       return view('pages.report.expense.expense_report',compact('expenseReport','totalexpense'));
    }
}
