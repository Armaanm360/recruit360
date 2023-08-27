<?php

namespace App\Http\Controllers\Reports\Ledger;

use App\Exports\AgentLedgerExport;
use App\Http\Controllers\Controller;
use App\Models\Ledger\AgentLedger;
use Carbon\Carbon;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentsLedgerController extends Controller
{
    public function agentreportForm()
    {
        return view('pages.report.agent_ledger.index');
    }
    public function agentReport(Request $request)
    {
        $agentId = $request->agent_id;
        // $start_date = date('Y-m-d', strtotime($request->start_date));
        // $end_date = date('Y-m-d', strtotime($request->end_date));


        $date_range = $request->daterange;
        $date_range = str_replace(' ', '', $date_range);
        $date_range = explode('-', $date_range);
        $to = Carbon::parse($date_range[1])->format('Y/m/d');
        $from = Carbon::parse($date_range[0])->format('Y/m/d');
        $start_date = date('Y-m-d', strtotime(str_replace('/', '-', $from)));
        $end_date   = date('Y-m-d', strtotime(str_replace('/', '-', $to)));

        //    echo '<pre>';
        //     // print_r($agentId);
        //     print_r($start_date);
        //     print_r($end_date);
        //        die();
        // return Invoice::whereInvoiceHasDeleted("NO")->whereDate('invoice_sales_date', '>=', $from)
        // ->whereDate('invoice_sales_date', '<=', $to)->sum("invoice_net_total");
        $data['data'] = AgentLedger ::where('agents_ledgers.agent_id', $agentId)
            ->whereDate('agent_ledger_date', '>=', $start_date)->whereDate('agent_ledger_date', '<=', $end_date)
            //->join('agents','agents_ledgers.agent_id','agents.agent_id')
            // ->join('invoices','agents_ledgers.agent_ledger_invoice_id','invoices.invoice_id')
            // ->join('agent_transections','agents_ledgers.agent_transaction_id','agent_transections.agent_transaction_id')

        // ->select('agents_ledgers.*','invoices.invoice_no','invoices.invoice_discount','agent_transections.*')
        ->get();


        //  echo '<pre>';
        //  print_r($data['data']);
        // die();
        return view('pages.report.agent_ledger.agent_ledger_report',$data,compact('agentId','start_date','end_date'));
    }
    public function agentLedgerExcel($id1,$id2,$id3)
    {
        $data = AgentLedger ::where('agents_ledgers.agent_id', $id1)
        ->whereDate('agent_ledger_date', '>=', $id2)->whereDate('agent_ledger_date', '<=', $id3)
        //->join('agents','agents_ledgers.agent_id','agents.agent_id')
        // ->join('invoices','agents_ledgers.agent_ledger_invoice_id','invoices.invoice_id')
        // ->join('agent_transections','agents_ledgers.agent_transaction_id','agent_transections.agent_transaction_id')

    // ->select('agents_ledgers.*','invoices.invoice_no','invoices.invoice_discount','agent_transections.*')
       ->get();
       return Excel::download(new AgentLedgerExport($data), 'agent-ledger.xlsx');
    }
}
