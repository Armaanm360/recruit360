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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('client-overall-data') }}">Client Overall Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List Client Overall Data</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('client-overall-data/create') }}"><i class="fa fa-list me-2"></i>Create
                        Client Data</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>List of Client Data</h3>

                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Mofa No</th>
                                    <th>Fingurprint</th>
                                    <th>Bank Statement</th>
                                    <th>BMET</th>
                                    <th>Flight No</th>
                                    <th>Airplane</th>
                                    <th>Flight Date</th>
                                    <th>Ticket No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientData as $client)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $client->client_name }} [{{ $client->client_entry_id }}]</td>
                                        <td>{{ $client->mofa_number }}</td>
                                        <td>{{ $client->fingur_status }}</td>
                                        <td>{{ $client->bank_statement_status }}</td>
                                        <td>{{$client->bmet_status}}</td>
                                        <td>{{$client->flight_number}}</td>
                                        <td>{{$client->flight_airline}}</td>
                                        <td>{{ $client->flight_date }}</td>
                                        <td>{{ $client->flight_ticket_number }}</td>
                                        <td><a href="{{ 'client-overall-data/' . $client->client_overall_id . '/' . 'edit' }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="deleteUser({{ $client->client_overall_id }})">Delete</button>
                                            <a href="{{ 'client-overall-data/' . $client->client_overall_id }}"
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

    <script type="text/javascript">

        function deleteUser(params) {
            Swal.fire({
                title: 'Do You Want To Delete The Client?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let getuser_id = $("[name=client_overall_id]").val();
                    $('#loader').show();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: "client-overall-data" + '/' + params,
                        cache: false,
                        success: function(data) {
                            window.location.href = "{{ url('client-overall-data') }}/";

                        }
                    }).done(function() {
                        $("#success_msg").html("Data Save Successfully");
                        //window.location.href = "{{ url('users') }}/";
                        Swal.fire('Client Has Been Deleted', '', 'success')
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
