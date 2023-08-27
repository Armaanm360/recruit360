@extends('master')
@section('content')
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="javascript:void(0)">Data Entry</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manpower Office / Vendor Wise Manpower
                            Clients Collections </li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('manpowers/create') }}"><i class="fa fa-list me-2"></i>Create
                        Manpower Office</a>
                    {{-- <a class="btn btn-secondary" href="{{ 'agents/create' }}"><i class="fa fa-user me-2"></i>Create
                    Agent</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <h1> <strong class="text-info">Vendor - </strong>
                                {{ get_vendor_name($manpowerData[0]->manpower_vendor_id) }}</h1>
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Client Name</th>
                                    <th>Office Name</th>
                                    <th>Address</th>
                                    <th>Processing Cost</th>
                                    <th>Job Type</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($manpowerData as $manpower)
                                    <tr>
                                        <td class="sorting_1">{{ $loop->index + 1 }}</td>
                                        <td>{{ get_client_name($manpower->manpower_client_id) }}</td>
                                        <td><a
                                                href="{{ url('users/' . $manpower->manpower_vendor_id) }}">{{ get_vendor_name($manpower->manpower_vendor_id) }}</a>
                                        </td>
                                        <td>{{ $manpower->office_address }}</td>
                                        <td>{{ $manpower->processing_cost }}</td>
                                        <td>{{ $manpower->job_type }}</td>
                                        <td>{{ $manpower->note }}</td>
                                        <td class="dt-body-left">
                                            <a type="button" href="{{ 'manpowers/' . $manpower->id . '/' . 'edit' }}"
                                                class="btn btn-link btn-sm text-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i class="fa fa-gear"></i></a>
                                            <a type="button" class="btn btn-link btn-sm text-danger"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                onclick="deleteUser({{ $manpower->id }})"><i class="fa fa-trash"></i></a>
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
                title: 'Do You Want To Delete The Manpower Office?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let getuser_id = $("[name=id]").val();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: 'manpower/clear' + '/' + params,
                        success: function(data) {
                            window.location.href = "{{ url('manpowers') }}/";

                        }
                    }).done(function() {
                        $("#success_msg").html("Data Saved Successfully");
                        //window.location.href = "{{ url('users') }}/";
                        Swal.fire('Manpower Office Has Been Deleted', '', 'success')
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
