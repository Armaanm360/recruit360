
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Accounts Collection</h4>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Client</th>
                                        <th>Amount</th>
                                        <th>Discount</th>
                                        <th>Method</th>
                                        <th>Details</th>
                                        <th>Collected By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($moneyReceipt as $receipt)
                                    @php
                                        $client = "";
                                        $receipt_by = "";
                                        $clientName = App\User::clientName($receipt->money_reciept_created_by);
                                        if ($clientName) {
                                            $receipt_by = $clientName->name;
                                        }

                                        if($receipt->money_reciept_payment_type == "CLIENT_PAYMENT")
                                        {
                                            $clientName = App\Models\Clients\Client::clientName($receipt->money_reciept_client_id);
                                            if ($clientName) {
                                                $client = $clientName->client_name;
                                            }
                                        }
                                        if($receipt->money_reciept_payment_type == "AGENT_PAYMENT")
                                        {
                                            $clientName = App\Models\Agents\Agent::clientName($receipt->money_reciept_agent_id);
                                            if ($clientName) {
                                                $client = $clientName->agent_name;
                                            }
                                        }
                                        if($receipt->money_reciept_payment_type == "SPONSOR_PAYMENT")
                                        {
                                            $clientName = App\Models\Sponsors\Sponsors::clientName($receipt->money_reciept_sponsor_id);
                                            if ($clientName) {
                                                $client = $clientName->sponsor_name;
                                            }
                                        }
                                        if($receipt->money_reciept_payment_type == "deligate_PAYMENT")
                                        {
                                            $clientName = App\Models\Deligates\Deligate::clientName($receipt->money_reciept_deligate_id);

                                            if ($clientName) {
                                                $client = $clientName->deligate_name;
                                            }
                                        }

                                    @endphp
                                    <tr>
                                        <td>{{$receipt->money_reciept_payment_date}}</td>
                                        <td>{{$client}}</td>
                                        <td>{{$receipt->money_reciept_total_amount }}</td>
                                        <td>{{$receipt->money_reciept_total_discount }}</td>
                                        <td>{{$receipt->money_reciept_payment_type }}</td>
                                        <td>{{$receipt->money_reciept_note }}</td>
                                        <td>{{$receipt_by}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>

                                    <tr>
                                        <td colspan="3" style="text-align: center;font-weight: bold"> Total Sale</td>
                                        <td style="font-weight: bold"> {{$totalSales}}</td>
                                        <td colspan="3" style="text-align: center;font-weight: bold"> Total Discount</td>
                                        <td style="font-weight: bold"> {{$totaldiscounts}}</td>


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



