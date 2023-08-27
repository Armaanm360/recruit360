@extends('master')
@section('content')
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('invoice') }}">Invoice</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List of Invoice</li>
                    </ol>
                </div>


                @include('layouts.frontend.today_statistics')

               
            </div>
        </div>
    </div>

    <!-- start: page body -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>List of Invoice</h3>

                        <div class="col text-md-end">
                            <a class="btn btn-primary" href="{{ url('invoice/create') }}"><i class="fa fa-list me-2"></i>Create
                                Invoice</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Invoice No.</th>
                                    <th>SubTotal</th>
                                    <th>Net Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{$row->invoice_no}}</td>
                                        <td>{{ $row->invoice_subtotal }}</td>
                                        <td>{{ $row->invoice_net_total }}</td>
                                        <td><a href="{{ 'invoice/' . $row->invoice_id . '/' . 'edit' }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="deleteInvoice({{ $row->invoice_id }})">Delete</button>
                                            <a href="{{ 'invoice/' . $row->invoice_id }}"
                                                class="btn btn-sm btn-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end form section -->


    <script type="text/javascript">
        function deleteInvoice(params) {
            Swal.fire({
                title: 'Do You Want To Delete The Invoice?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let getuser_id = $("[name=id]").val();
                    $('#loader').show();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: "invoice" + '/' + params,
                        success: function(data) {
                            window.location.href = "{{ url('invoice') }}/";

                        }
                    }).done(function() {
                        $("#success_msg").html("Data Save Successfully");
                        Swal.fire('Invoice Has Been Deleted', '', 'success')
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
      
    </script>
@endsection

