<?php

namespace App\Http\Controllers\Reports\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientLedgerExport;
use Illuminate\Support\Facades\DB;

class ClientLedger extends Controller
{
    public function clientreportForm()
    {
        return view('pages.report.client_ledger.index');
    }
    public function clientReport(Request $request)
    {
        $clientId = $request->client_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        // echo '<pre>';
        // print_r($clientId);
        // print_r($start_date);
        // print_r($end_date);
        // die();
        $data = DB::table('client_ledgers')
        ->where('client_ledgers.client_id',$clientId)
        ->whereBetween('client_ledgers.client_ledger_date',[$start_date,$end_date])
        ->get();
        //  echo '<pre>';
        //  print_r($data);
        // die();
        return view('pages.report.client_ledger.client_ledger_report',compact('data','clientId','start_date','end_date'));
    }
    public function clientLedgerExcel($id1,$id2,$id3)
    {
        $data = DB::table('client_ledgers')
        ->where('client_ledgers.client_id',$id1)
        ->whereBetween('client_ledgers.client_ledger_date',[$id2,$id3])
        ->get();
        return Excel::download(new ClientLedgerExport($data), 'client-ledger.xlsx');

    }

}
