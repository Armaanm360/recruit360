
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sales Profit</h4>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                       <tr>
                                    <th>Sl</th>
                                    <th>Invoice No.</th>
                                    <th>Client</th>
                                    <th>Phone</th>                                    
                                    <th>SubTotal</th>
                                    <th>Discount</th>
                                    <th>Net Total</th>
                                    <th>Cost</th>
                                    <th>Profit</th>
                                   
                                </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $totalSale = 0;
                                    $totalCost = 0;
                                    $totalProfit = 0;
                                    @endphp
                                    @foreach($sales as $row)
                                    @php
                                    $totalSale+= $row->invoice_net_total;
                                    $totalCost+= $row->invoice_total_cost;
                                    $totalProfit+= $row->invoice_total_profit;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{$row->invoice_no}}</td>
                                        <td>{{$row->client_name}}</td>
                                        <td>{{$row->client_phone}}</td>                                        
                                        <td>{{ $row->invoice_subtotal }}</td>
                                        <td>{{ $row->invoice_discount }}</td>
                                        <td>{{ $row->invoice_net_total }}</td>
                                        <td>{{$row->invoice_total_cost}}</td>
                                        <td>{{$row->invoice_total_profit}}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                                <tfoot>
                                   
                                    <tr>
                                        <td colspan="6" style="text-align: center;font-weight: bold"> Total</td>
                                        <td style="font-weight: bold">{{$totalSale}}</td>
                                        <td style="font-weight: bold">{{$totalCost}}</td>
                                        <td style="font-weight: bold">{{$totalProfit}}</td>
                                       
                                        
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


