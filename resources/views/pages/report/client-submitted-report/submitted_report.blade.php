
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3> Client Submitted Report</h3>
                        </div>
                        <div class="card-body">
                            <h5>Passport</h5>
                            <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Passport Name</th>
                                        <th>Passport No</th>
                                        <th>Mobile Number</th>
                                        <th>Date of Birth</th>
                                        <th>Date of Passport Issue</th>
                                        <th>Date of Passport Expiry</th>
                                        <th>Duration</th>
                                        <th>Email</th>
                                        <th>Passport Reference</th>
                                        <th>Passport Amount</th>
                                        <th>Passport Creation Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($passportData as $data)
                                    <tr>
                                        <td>{{$data->passport_name}}</td>
                                        <td>{{$data->passport_no}}</td>
                                        <td>{{$data->mobile_number}}</td>
                                        <td>{{$data->date_of_birth}}</td>
                                        <td>{{$data->date_of_passport_issue}}</td>
                                        <td>{{$data->date_of_passport_expiry}}</td>
                                        <td>{{$data->duration_left}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->passport_reference}}</td>
                                        <td>{{$data->passport_amount}}</td>
                                        <td>{{$data->passport_creation_date}}</td>

                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                            <br>
                            <br>
                            <br>
                            <h5>Manpower Office</h5>
                            <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Office Name</th>
                                        <th>Office Address</th>
                                        <th>Job Type</th>
                                        <th>Comment</th>
                                        <th>Processing Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($manpowerData as $data)
                                    <tr>
                                        <td>{{$data->office_name}}</td>
                                        <td>{{$data->office_address}}</td>
                                        <td>{{$data->job_type}}</td>
                                        <td>{{$data->comment}}</td>
                                        <td>{{$data->processing_cost}}</td>

                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                            <br>
                            <br>
                            <br>
                            <h5>Visa Information</h5>
                            <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>VISA No</th>
                                        <th>VISA issue Date</th>
                                        <th>VISA Job Type</th>
                                        <th>VISA Gender Type</th>
                                        <th>VISA amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visaData as $data)
                                    <tr>
                                        <td>{{$data->visa_no}}</td>
                                        <td>{{$data->visa_issue_date}}</td>
                                        <td>{{$data->visa_job_type}}</td>
                                        <td>{{$data->visa_gender_type}}</td>
                                        <td>{{$data->visa_amount}}</td>

                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                            <br>
                            <br>
                            <br>
                            <h5>Police Clearence Information</h5>
                            <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Clearence Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($PoliceClearenceData as $data)
                                    <tr>
                                        <td>{{$data->police_clearance_status}}</td>

                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                            <br>
                            <br>
                            <br>
                            <h5>Training Card</h5>
                            <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Training Card Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($TrainingData as $data)
                                    <tr>
                                        <td>{{$data->training_card_status}}</td>

                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                            <br>
                            <br>
                            <br>
                            <h5>Medical Test Data</h5>
                            <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Vendor Name</th>
                                        <th>Vendor Phone</th>
                                        <th>Medical Processing</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($MedicalTestData as $data)
                                    <tr>
                                        <td>{{$data->vendor_name}}</td>
                                        <td>{{$data->vendor_phone}}</td>
                                        <td>{{$data->medical_test_processing_cost}}</td>

                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                            <br>
                            <br>
                            <br>
                            <h5>Final Medical Test Data</h5>
                            <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Vendor Name</th>
                                        <th>Vendor Phone</th>
                                        <th>Medical Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($MedicalTestFinalData as $data)
                                    <tr>
                                        <td>{{$data->vendor_name}}</td>
                                        <td>{{$data->vendor_phone}}</td>
                                        <td>{{$data->final_medical_test_client_status}}</td>

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
