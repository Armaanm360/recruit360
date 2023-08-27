@extends('master')
@section('content')
    @inject('ClientInfo', 'App\Models\Clients\Client')
    @inject('jobName', 'App\Models\Configuration\jobType')
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('clients') }}">Client</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List of Client CV</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('clients/create') }}"><i class="fa fa-list me-2"></i>Create
                        Client</a>
                    <a class="btn btn-secondary" href="{{ 'clients/create' }}"><i class="fa fa-user me-2"></i>Create
                        Client</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>List of Clients</h3>

                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Client Job Type</th>
                                    <th>Email</th>
                                    <th>Client Entry ID</th>
                                    <th>Age</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client as $client)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><a
                                                href="{{ url('clients/') . '/' . $client->client_id }}">{{ $client->client_name }}</a>
                                        </td>
                                        <td>{{ $client->client_phone }}</td>
                                        <td>{{ $jobName->jobName($client->client_job_type) }}</td>
                                        <td>{{ $client->client_email }}</td>
                                        <td>{{ $client->client_entry_id }}</td>
                                        <td>{{ $client->present_age }}</td>
                                        <td>
                                            <a href="{{url('view/client')}}/{{$client->client_id}}"
                                                class="btn btn-sm btn-info">View</a>
                                            <a href="{{url('view/client/cv')}}/{{$client->client_id}}"
                                                class="btn btn-sm btn-info">View CV</a>
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
                    let getuser_id = $("[name=id]").val();
                    $('#loader').show();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: "clients" + '/' + params,
                        cache: false,
                        success: function(data) {
                            window.location.href = "{{ url('clients') }}/";

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
