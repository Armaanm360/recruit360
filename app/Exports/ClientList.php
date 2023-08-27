<?php

namespace App\Exports;

use App\Models\Clients\Client;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ClientList implements FromView, WithDrawings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public $client;
    public function __construct($client)
    {
        $this->client = $client;
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('public'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B3');

        return $drawing;
    }
    public function view(): View
    {
        return view('pages.exports.client_list', [
            'client' => $this->client
        ]);
    }
}
