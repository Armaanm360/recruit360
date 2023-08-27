@inject('agentSalesReport', 'App\Models\Report\AgentSalesReport\AgentSalesReport')
<!-- Form section -->
<!-- start: page toolbar -->
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
        <div class="row g-3">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3> Agent Wise Sales Report</h3>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Invoice No</th>
                                    <th>Invoice Date</th>
                                    <th>Client</th>
                                    <th>Net Total</th>
                                </tr>
                            </thead>

                            @if ($count_agent > 0)
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $data->invoice_no }}</td>
                                            <td>{{ $data->invoice_sales_date }}</td>
                                            <td>{{ $agentSalesReport->getClientName($data->invoice_client_id) }}</td>
                                            <td>{{ $data->invoice_net_total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <td></td>
                                    <td></td>
                                    <td><span class="text-success">Total Sales:
                                            {{ $agentSalesReport->get_agent_net_sales($data->invoice_agent_id, $from, $to) }}</span>
                                    </td>
                                    <td><span class="text-info">Total Paid:
                                            {{ $agentSalesReport->get_agent_paid_amount($data->invoice_agent_id, $from, $to) }}</span>
                                    </td>
                                    <td><span class="text-danger">Total Due:
                                            {{ $agentSalesReport->get_agent_net_sales($data->invoice_agent_id, $from, $to) - $agentSalesReport->get_agent_paid_amount($data->invoice_agent_id, $from, $to) }}</span>
                                    </td>

                                </tfoot>
                            @else
                                <h2>No Data Found</h2>
                            @endif








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
                    url: 'delegate/clear' + '/' + params,
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
