@extends('master')
@section('content')
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('expense') }}">Expense</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List Agent</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('expense/create') }}"><i class="fa fa-list me-2"></i>Create
                        Expense</a>
                    {{-- <a class="btn btn-secondary" href="{{ 'agents/create' }}"><i class="fa fa-user me-2"></i>Create
                        Agent</a> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- start: page body -->
    <div class="bigtab m-3">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Expense List</h3>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Expense Head</th>
                                    <th>Expense SubHead</th>
                                    <th>Client</th>
                                    <th>Client Transection ID</th>
                                    <th>Expense Amount</th>
                                    <th>Expense Date</th>
                                    <th>Expense Note</th>
                                    <th>Expense Create Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expense as $expense)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $expense->expense_head_name }}</td>
                                        <td>{{ $expense->expense_sub_head_name }}</td>
                                        <td>{{ $expense->client_name }}</td>
                                        <td>{{ $expense->expense_client_transection_id }}</td>
                                        <td>{{ $expense->expense_amount }}</td>
                                        <td>{{ $expense->expense_date }}</td>
                                        <td>{{ $expense->expense_note }}</td>
                                        <td>{{ $expense->expense_create_date }}</td>
                                        <td><a href="{{ 'expense/' . $expense->expense_id . '/' . 'edit' }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="deleteUser({{ $expense->expense_id }})">Delete</button>
                                            <a href="{{ 'expense_id/' . $expense->expense_id }}"
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
        function deleteUser(params) {
            Swal.fire({
                title: 'Do You Want To Delete The Agent?',
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
                        url: "agents" + '/' + params,
                        success: function(data) {
                            window.location.href = "{{ url('agents') }}/";

                        }
                    }).done(function() {
                        $("#success_msg").html("Data Save Successfully");
                        //window.location.href = "{{ url('users') }}/";
                        Swal.fire('Agent Has Been Deleted', '', 'success')
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
@endsection
