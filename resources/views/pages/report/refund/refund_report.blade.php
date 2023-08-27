
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Refund Report</h4>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Date</th>
                                        <th>Invoice</th>
                                        <th>Client</th>
                                        <th>Refund Charge</th>
                                        <th>Refund Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($refundReport as $report)
                                    @php
                                        $client = "";
                                        $invoice = "";
                                        $receipt_by = "";
                                        $clientName = App\Models\Clients\Client::clientName($report->refund_client_id);
                                            if ($clientName) {
                                                $client = $clientName->client_name;
                                            }
                                        $invoiceNumber = App\Models\Invoice\Invoice::invoice($report->refund_invoice_id);
                                            if ($invoiceNumber) {
                                                $invoice = $invoiceNumber->invoice_no;
                                            }



                                    @endphp
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$report->refund_create_date}}</td>
                                        <td>{{$invoice}}</td>
                                        <td>{{$client}}</td>
                                        <td>{{$report->refund_charge }}</td>
                                        <td>{{$report->refund_return_price}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>

                                    <tr>

                                        <td colspan="3" style="text-align: center;font-weight: bold"> Total Refund Charge</td>
                                        <td style="font-weight: bold"> {{$totalcharge}}</td>
                                        <td colspan="3" style="text-align: center;font-weight: bold"> Total Refund</td>
                                        <td style="font-weight: bold"> {{$totalrefund}}</td>


                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

    <!-- start: page body -->

    <!-- end form section -->



