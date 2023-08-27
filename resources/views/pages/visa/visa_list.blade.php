@extends('master')
@section('content')
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">List Of Visa</li>
                    </ol>
                </div>
            </div> <!-- .row end -->
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="fs-5 color-900 mt-1 mb-0">List of Visa.</h1>
                    <small class="text-muted">
                        <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                    </small>
                </div>
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0 text-md-end">
                    <a class="btn btn-primary" href="{{ url('visa/create') }}"><i class="fa fa-plus me-2"></i>Create
                        Visa</a>
                    <!-- daterange picker -->
                    <!-- <div class="input-group">


                                                                                                     <button class="btn btn-secondary" type="button" style="margin-left:46%;color:white" data-bs-toggle="tooltip"
                                                                                                      title="Create Visa"><a href="{{ url('visa/create') }}">Create Visa</a><i class="fa fa-envelope"></i></button>

                                                                                                    </div> -->
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Client Name</th>
                                    <th>visa No</th>
                                    <th>Visa Issue date</th>
                                    <th>Visa Expiry date</th>
                                    <th>Visa Duration(Current Date)</th>
                                    <th>visa job type</th>
                                    <th>Gender</th>
                                    <th>amount</th>
                                    <th>Note</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sl = 1;
                                    
                                @endphp
                                @foreach ($list as $row)
                                    @php
                                        $startTimeStamp = strtotime(date('Y-m-d'));
                                        $endTimeStamp = strtotime($row->visa_expiry_date);
                                        $timeDiff = abs($endTimeStamp - $startTimeStamp);
                                        $numberDays = $timeDiff / 86400; // 86400 seconds in one day
                                        // and you might want to convert to integer
                                        $numberDays = intval($numberDays);
                                    @endphp
                                    <tr>
                                        <td class="sorting_{{ $sl }}}">{{ $sl }}</td>
                                        <td>{{ $row->client_name }}</td>
                                        <td>{{ $row->visa_no }}</td>
                                        <td>{{ $row->visa_issue_date }}</td>
                                        <td>{{ $row->visa_expiry_date }}</td>
                                        <td>{{ $numberDays }}</td>
                                        <td>{{ $row->visa_job_type }}</td>
                                        <td>{{ $row->visa_gender_type }}</td>
                                        <td>{{ $row->visa_amount }}</td>
                                        <td>{{ $row->note }}</td>

                                        <td>
                                            <a href="{{ 'visa/' . $row->visa_id . '/' . 'edit' }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="deleteNow({{ $row->visa_id }})">Delete</button>
                                            {{-- <a href="{{ 'accounts/' . $row->account_id }}" class="btn btn-sm btn-info">View</a> --}}
                                        </td>
                                    </tr>
                                    @php
                                        $sl++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteNow(params) {
            Swal.fire({
                title: 'Do You Want To Delete The Visa?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('#loader').show();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: "visa" + '/' + params,
                        success: function(data) {
                            location.reload();

                        }
                    }).done(function() {
                        $("#success_msg").html("Data Save Successfully");
                        //window.location.href = "{{ url('users') }}/";
                        Swal.fire('Visa Has Been Deleted', '', 'success')
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
