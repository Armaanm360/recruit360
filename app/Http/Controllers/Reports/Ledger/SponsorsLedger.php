<?php

namespace App\Http\Controllers\Reports\Ledger;

use App\Http\Controllers\Controller;
use App\Models\Ledger\SponsorLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SponsorsLedger extends Controller
{
    public function sponsorreportForm()
    {
        return view('pages.report.sponsor_ledger.index');
    }
    public function sponsorReport(Request $request)
    {
        $sponsorId = $request->sponsor_id;
        $start_date = date('d/m/Y', strtotime($request->start_date));
        $end_date = date('d/m/Y', strtotime($request->end_date));
        // $start_date = $request->start_date;
        // $end_date = $request->end_date;

        //     echo '<pre>';
        //     print_r($sponsorId);
        //     print_r($start_date);
        //     print_r($end_date);
        //    die();
      DB::statement("SET SQL_MODE=''");
    $data['ledger'] = SponsorLedger::where('sponsor_ledgers.sponsor_id',$sponsorId)
    ->join('sponsors','sponsors.sponsor_id','=','sponsor_ledgers.sponsor_id')
    ->join('sponsor_transactions','sponsor_ledgers.sponsor_transaction_id','=','sponsor_transactions.sponsor_transaction_id')
    ->join('money_reciept', 'money_reciept.money_reciept_sponsor_id', 'sponsor_ledgers.sponsor_id')
    ->whereBetween('sponsor_ledgers.sponsor_ledger_date', [$start_date, $end_date])
    ->groupBy('sponsor_ledgers.sponsor_ledger_id')
    ->get();
    // $data['ledger'] = $ledger->unique('sponsor_ledgers.sponsor_id');
    // $data['ledger'] = array_slice($data['ledger']->values()->all(), 0, 5, true);

    //     echo '<pre>';
    //     print_r($sponsorId);
    //     print_r($start_date);
    //     print_r($data['ledger']);
    //    die();
    return view('pages.report.sponsor_ledger.sponsor_ledger_report',$data);
    }
}
