<?php

namespace App\Exports;

use App\Models\AgentLedger;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class AgentLedgerExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function view(): View
    {
        return view('pages.exports.agent_ledger', [
            'data' => $this->data
        ]);
    }
}
