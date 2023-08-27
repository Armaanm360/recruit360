<!-- Form section -->
<!-- start: page toolbar -->
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
        <div class="row g-3">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Date</th>
                                    <th>Particular</th>
                                    <th>Vouchar No</th>
                                    <th>Discount</th>
                                    <th>Tr. Type</th>
                                    <th>Amount</th>
                                    <th>Pre Amount</th>
                                    <th>Dr.</th>
                                    <th>Cr.</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            @php

                            @endphp
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->agent_ledger_date }}</td>
                                        <td>{{ $data->agent_ledger_type }}</td>
                                        <td>{{ $data->agent_ledger_money_receipt_id }}</td>
                                        <td></td>
                                        <td>{{ $data->agent_ledger_type }}</td>
                                        <td>{{ $data->agent_ledger_last_balance }}</td>
                                        <td>{{ $data->agent_ledger_last_balance }}</td>
                                        <td>{{ $data->agent_ledger_last_balance }}</td>
                                        <td>{{ $data->agent_ledger_dr }}</td>
                                        <td>{{ $data->agent_ledger_cr }}</td>
                                        <td>{{ $data->agent_transaction_last_balance }}</td>

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


