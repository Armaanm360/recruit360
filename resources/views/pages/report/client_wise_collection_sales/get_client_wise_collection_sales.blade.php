
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sales</h4>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                       <tr>
                                    <th>Sl</th>
                                    <th>Invoice No.</th>
                                    <th>SubTotal</th>
                                    <th>Net Total</th>
                                   
                                </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $totalSale = 0;
                                    @endphp
                                    @foreach($sales as $row)
                                    @php
                                    $totalSale+= $row->invoice_net_total;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{$row->invoice_no}}</td>
                                        <td>{{ $row->invoice_subtotal }}</td>
                                        <td>{{ $row->invoice_net_total }}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                                <tfoot>
                                   
                                    <tr>
                                        <td colspan="3" style="text-align: center;font-weight: bold"> Total Sale</td>
                                        <td style="font-weight: bold">{{$totalSale}}</td>
                                       
                                        
                                    </tr>
                                   
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h4>Collection</h4>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                       <tr>
                                    <th>Sl</th>
                                    <th>Voucher No.</th>
                                    <!--<th>Client</th>-->
                                    <th>Discount</th>
                                    <th>Amount</th>
                                    
                                   
                                </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $totalCollection = 0;
                                    @endphp
                                    @foreach($collection as $row)
                                    @php
                                    $totalCollection+= $row->money_reciept_total_amount;
                                    @endphp
                                    <tr>
                                       <td>{{ $loop->index + 1 }}</td>
                                        <td>{{$row->money_reciept_voucher_no}}</td>
                                        <!--<td>{{ $row->client_name }}</td>-->                                        
                                        <td>{{ $row->money_reciept_total_discount }}</td>
                                        <td>{{ $row->money_reciept_total_amount }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                 <tfoot>
                                   
                                    <tr>
                                        <td colspan="3" style="text-align: center;font-weight: bold"> Total Collection</td>
                                        <td style="font-weight: bold">{{$totalCollection}}</td>
                                       
                                        
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


    <script type="text/javascript">
        function deleteUser(params) {
            Swal.fire({
                title: 'Do You Want To Delete The Deligate?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let getuser_id = $("[name=deligate_id]").val();
                    $('#loader').show();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: 'delegate/clear'+ '/' + params,
                        success: function(data) {
                            window.location.href = "{{ url('deligates') }}/";

                        }
                    }).done(function() {
                        $("#success_msg").html("Data Deleted Successfully");
                        //window.location.href = "{{ url('users') }}/";
                        Swal.fire('Deligate Has Been Deleted', '', 'success')
                    }).fail(function(data, textStatus, jqXHR) {
                        $('#loader').hide();
                        var json_data = JSON.parse(data.responseText);
                        $.each(json_data.errors, function(key, value) {
                            $("#" + key).after(
                                "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                                value +
                                "</span>");
                        });
                    });


                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }
        $(document).ready(function() {


        });


        (document).on();
    </script>
