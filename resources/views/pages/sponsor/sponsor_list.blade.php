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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('sponser') }}">Sponsors</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List of Sponsor</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('sponser/create') }}"><i class="fa fa-list me-2"></i>Create
                        Sponsor</a>
                    {{-- <a class="btn btn-secondary" href="{{ 'agents/create' }}"><i class="fa fa-user me-2"></i>Create
                        Agent</a> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- start: page body -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3> Sponsor List</h3>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    {{-- <th>Photo</th> --}}
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Sponsor Entry ID</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sponserData as $sponsor)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        {{-- <td><img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG.png"
                                                class="rounded" alt="Cinque Terre" height="50px" width="50px"></td> --}}
                                        <td>{{ $sponsor->sponsor_name }}</td>
                                        <td>{{ $sponsor->sponsor_phone }}</td>
                                        <td>{{ $sponsor->sponsor_email }}</td>
                                        <td>{{ $sponsor->sponsor_entry_id }}</td>
                                        <td>Current balance</td>
                                        <td><a href="{{ 'sponser/' . $sponsor->sponsor_id . '/' . 'edit' }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                                <button class="btn btn-sm btn-danger"
                                                onclick="deleteUser({{ $sponsor->sponsor_id }})">Delete</button>
                                            {{-- <a href="{{ 'sponser/' . $sponsor->sponsor_id }}"
                                                class="btn btn-sm btn-info">View</a> --}}
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
                title: 'Do You Want To Delete The Sponsor?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let getuser_id = $("[name=sponsor_id]").val();
                    $('#loader').show();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: 'sponser/clear'+ '/' + params,
                        success: function(data) {
                            window.location.href = "{{ url('sponser') }}/";

                        }
                    }).done(function() {
                        $("#success_msg").html("Data Save Successfully");
                        //window.location.href = "{{ url('users') }}/";
                        Swal.fire('Sponsor Has Been Deleted', '', 'success')
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
