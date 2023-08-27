<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
        <div class="row g-3">
            <div class="col-12 mt-4">
                <div class="card">
                    {{-- <div class="card-header">
                        <h3> Client Ledger</h3>
                        <p><a href="{{url('clientsledger-excel-export')}}/{{$clientId}}/{{$start_date}}/{{$end_date}}">Export to Excel</a></p>
                    </div> --}}
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Date</th>
                                    <th>Particular</th>
                                    <th>Vouchar No</th>
                                    <th>PAX Name</th>
                                    <th>Discount</th>
                                    <th>Tr. Type</th>
                                    <th>Amount</th>
                                    <th>Pre Amount</th>
                                    <th>Dr.</th>
                                    <th>Cr.</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    @php
                                        $pax_name = "";
                                        $sub_Head = "";
                                        $voucharNo = "";
                                        $discount = "";
                                        $transactionType = "";
                                        $transactionAmount = "";
                                        $paxName = App\Models\Passport\Passport::paxName($data->client_id);

                            if (($data->client_ledger_type == 'REFUND')||($data->client_ledger_type == 'SALE')||($data->client_ledger_type == 'SALE UPDATED'))  {
                                            $vouchar = App\Models\Invoice\Invoice::voucharNo($data->client_ledger_invoice_id);
                                            if($vouchar)
                                            {
                                                $voucharNo =  $vouchar->invoice_no;
                                                $discount =  $vouchar->invoice_discount;
                                            }

                                         }
                                        if ($data->client_ledger_type == 'EXPENSE_CREATED')  {
                                            $subhead = App\Models\Expense\Expense::subHead($data->client_transaction_id);
                                            if($subhead)
                                            {
                                                $sub_Head =  $subhead->expense_sub_head_name;
                                            }

                                         }
                                        if ($data->client_ledger_type == 'CLIENT_PAYMENT')  {
                                            $trnx = App\Models\Clients\ClientTransaction::txntype($data->client_transaction_id);
                                            if($trnx)
                                            {
                                                $transactionType =  $trnx->client_transaction_type;
                                                $transactionAmount =  $trnx->client_transaction_amount;
                                            }
                                         }


                                            if($paxName)
                                            {
                                                $pax_name =  $paxName->passport_name;
                                            }



                                    @endphp

                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->client_ledger_date }}</td>
                                        <td>{{ $data->client_ledger_type }}({{$sub_Head}})</td>
                                        <td>
                                            {{$voucharNo}}
                                        </td>
                                        <td>
                                            {{$pax_name}}
                                        </td>
                                        <td>
                                            {{$discount}}
                                        </td>
                                        <td>
                                            {{$transactionType}}
                                        </td>
                                        <td>
                                            {{$transactionAmount}}
                                        </td>
                                        <td>{{ $data->client_ledger_last_balance }}</td>
                                        <td>{{ $data->client_ledger_dr }}</td>
                                        <td>{{ $data->client_ledger_cr }}</td>
                                        <td>{{ $data->client_ledger_last_balance }}</td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
