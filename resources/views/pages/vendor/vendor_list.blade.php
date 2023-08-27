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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('vendors ') }}">Vendors</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List of Vendors</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('vendors/create ') }}"><i class="fa fa-list me-2"></i>Create
                        Vendor</a>
                    {{-- <a class="btn btn-secondary" href="{{ 'agents/create' }}"><i class="fa fa-user me-2"></i>Create
                        Agent</a> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- start: page body -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3> Vendor List</h3>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Entry ID</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $data->vendor_name }}</td>
                                        <td>{{ $data->vendor_phone }}</td>
                                        <td>{{ $data->vendor_email }}</td>
                                        <td>{{ $data->vendor_entry_id }}</td>
                                        <td>{{ $data->vendor_address }}</td>
                                        <td><a href="{{ 'vendors/' . $data->vendor_id . '/' . 'edit' }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                                <button class="btn btn-sm btn-danger"
                                                onclick="deleteUser({{ $data->vendor_id }})">Delete</button>
                                            {{-- <a href="{{ 'vendors/' . $data->vendor_id }}"
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
                title: 'Do You Want To Delete The Vendor?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let getuser_id = $("[name=vendor_id]").val();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: 'vendor/clear'+ '/' + params,
                        success: function(data) {
                           window.location.href = "{{ url('vendors') }}/";

                        }
                    }).done(function() {
                        $("#success_msg").html("Data Saved Successfully");
                        //window.location.href = "{{ url('users') }}/";
                        Swal.fire('Vendor Has Been Deleted', '', 'success')
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



        (document).on();
    </script>
@endsection
