<?php

namespace App\Http\Controllers\Reports\Ledger;

use App\Http\Controllers\Controller;
use App\Models\Ledger\DeligateLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeligatesLedger extends Controller
{
    public function deligatereportForm()
    {
        return view('pages.report.deligate_ledger.index');
    }
    public function deligateReport(Request $request)
    {
        $deligateId = $request->deligate_id;
        $start_date = date('d/m/Y', strtotime($request->start_date));
        $end_date = date('d/m/Y', strtotime($request->end_date));
        // $start_date = $request->start_date;
        // $end_date = $request->end_date;

    //     echo '<pre>';
    //     print_r($deligateId);
    //     print_r($start_date);
    //     print_r($end_date);
    //     die();
        // $data['ledger'] = DeligateLedger::where('deligate_ledgers.deligate_id', $deligateId)
        // ->whereBetween('deligate_ledgers.deligate_ledger_date', [$start_date, $end_date])
        //     ->get();

        // DB::statement("SET SQL_MODE=''");
        // $data['ledger'] = DeligateLedger::where('deligate_ledgers.deligate_id', $deligateId)
        // ->join('deligates', 'deligates.deligate_id', '=', 'deligate_ledgers.deligate_id')
        // ->join('money_reciept', 'money_reciept.money_reciept_deligate_id', 'deligate_ledgers.deligate_id')
        // ->whereBetween('deligate_ledgers.deligate_ledger_date', [$start_date, $end_date])
        // ->groupBy('deligate_ledgers.deligate_ledger_id')
        // ->get();    
        $data = DB::table('client_ledgers')
        ->where('client_ledgers.client_id',$clientId)
        ->whereBetween('client_ledgers.client_ledger_date',[$start_date,$end_date])
        ->get();
        // $data['ledger'] = SponsorLedger::where('sponsor_ledgers.sponsor_id', $sponsorId)
        // ->join('sponsors', 'sponsors.sponsor_id', '=', 'sponsor_ledgers.sponsor_id')
        // ->join('money_reciept', 'money_reciept.money_reciept_sponsor_id', 'sponsor_ledgers.sponsor_id')
        // ->whereBetween('sponsor_ledgers.sponsor_ledger_date', [$start_date, $end_date])
        // ->groupBy('sponsor_ledgers.sponsor_ledger_id')
        // ->get();
         echo '<pre>';
         print_r($data['ledger']);
        die();
        return view('pages.report.deligate_ledger.deligate_ledger_report',$data);
    }
}
