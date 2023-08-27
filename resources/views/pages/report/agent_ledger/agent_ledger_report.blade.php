<!-- Form section -->
<!-- start: page toolbar -->
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
        <div class="row g-3">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3> Agent Ledger</h3>
                        <p><a href="{{url('agentsledger-excel-export')}}/{{$agentId}}/{{$start_date}}/{{$end_date}}">Export to Excel</a></p>
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
