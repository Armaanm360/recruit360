@extends('master')
@section('content')
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/visa') }}">Visa</a></li>
                        <li class="breadcrumb-item active">Create Visa</li>
                    </ol>
                </div>
            </div> <!-- .row end -->
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="fs-5 color-900 mt-1 mb-0">Create Visa !</h1>
                    <small class="text-muted">
                        <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                    </small>
                </div>
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0 text-md-end">
                    <a class="btn btn-primary" href="{{ url('visa') }}"><i class="fa fa-list me-2"></i>Visa List</a>
                </div>
            </div>
        </div>
    </div>

    <!-- start: page body -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-3">


                <!-- Form Validation -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Visa Information</h4>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="visaForm">
                                @csrf
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="tags"
                                            placeholder="Client" name="">
                                        <input type="hidden" class="form-control form-control-lg" id="hiddenClientId"
                                            placeholder="Client" name="client_id">
                                        <label class="form-label" for="client_id">Client Name</label>
                                    </span>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <span class="float-label">
                                        <select class="form-control" name="agent_id" id="agent_id">

                                        </select>
                                        <label class="form-label" for="agentID">Agent</label>
                                    </span>
                                </div>
                                {{-- <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="tagsvendor"
                                            placeholder="Vendor" name="">
                                        <input type="hidden" class="form-control form-control-lg" id="hiddenVendorId"
                                            placeholder="Vendor" name="vendor_id">
                                        <label class="form-label" for="vendor_id">Vendor Name</label>
                                    </span>
                                </div> --}}
                                {{-- <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="visa_no"
                                            placeholder="Visa No" name="visa_no">
                                        <label class="form-label" for="TextInput">Visa No. <span
                                                class="text-danger">*</span></label>
                                    </span>
                                </div> --}}
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="visa_manual_id"
                                            placeholder="Visa No" name="visa_manual_id">
                                        <label class="form-label" for="TextInput">Visa Manual ID <span
                                                class="text-danger">*</span></label>
                                    </span>
                                </div>

                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="visa_issue_date"
                                            placeholder="Bank name" name="visa_issue_date">
                                        <label class="form-label" for="visa_issue_date">Visa Issue Date<span
                                                class="text-danger">*</span></label>
                                    </span>
                                </div>

                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="visa_expiry_date"
                                            placeholder="Visa Expiry Date" name="visa_expiry_date">
                                        <label class="form-label" for="visa_expiry_date">Visa Expiry Date<span
                                                class="text-danger">*</span></label>
                                    </span>
                                </div>

                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="duration"
                                            placeholder="Visa Duration" name="duration" readonly>
                                        <label class="form-label" for="duration">Visa Duration</label>
                                    </span>
                                </div>

                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="passenger_name"
                                            placeholder="Passenger Name" name="passenger_name">
                                        <label class="form-label" for="passenger_name">Passenger Name</label>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="nid_number"
                                            placeholder="NID Number" name="nid_number">
                                        <label class="form-label" for="nid_number">NID Number</label>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="passport_number"
                                            placeholder="Passport Number" name="passport_number">
                                        <label class="form-label" for="visa_issue_date">Passport Number</label>
                                    </span>
                                </div>
                                {{-- <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="reference_name"
                                            placeholder="Reference Name" name="reference_name">
                                        <label class="form-label" for="reference_name">Reference Name</label>
                                    </span>
                                </div> --}}
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg"
                                            id="police_clearence_number" placeholder="Police Clearence No"
                                            name="police_clearence_number">
                                        <label class="form-label" for="police_clearence_number">Police Clearence
                                            No</label>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="medical_test_date"
                                            placeholder="Medical test Date" name="medical_test_date">
                                        <label class="form-label" for="medical_test_date">Medical test Date</label>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="mobile_no"
                                            placeholder="Mobile No" name="mobile_no">
                                        <label class="form-label" for="mobile_no">Mobile No</label>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="office_date"
                                            placeholder="Office Date" name="office_date">
                                        <label class="form-label" for="office_date">Office Date</label>
                                    </span>
                                </div>

                                <div class="col-6">
                                    <label class="form-group float-label">
                                        <input type="text" class="form-control form-control-lg custom-select"
                                            name="visa_job_type" id="visa_job_type">
                                        <span>Visa Job Type<span class="text-danger">*</span></span>
                                    </label>
                                </div>
                                <div class="col-6">
                                    <label class="form-group float-label">
                                        <select class="form-control form-control-lg custom-select" name="visa_gender_type"
                                            id="visa_gender_type">
                                            <option value="" disabled selected>
                                                Select
                                            </option>
                                            <option value="man">Man</option>
                                            <option value="woman">Women</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <span>Gender</span>
                                    </label>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <textarea name="note" id="note" class="form-control"></textarea>
                                        <label class="form-label" for="note">note</label>
                                    </span>
                                </div>

                                {{-- <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="visa_amount"
                                            placeholder="Account Balance" name="visa_amount">
                                        <label class="form-label" for="visa_amount">Visa Amount</label>
                                    </span>
                                </div> --}}

                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- .row end -->

        </div>
    </div>
    <!-- end form section -->

    <script type="text/javascript">
        // $('#agentname').keyup(function() {
        //  let rand = $('#agentname').val();
        //  let x = Math.floor((Math.random() * 100000) + 1);

        //  $('#agent_entry_id').val(rand + x);

        // });

        $(function() {
            $('#visa_issue_date,#visa_expiry_date').change(function() {
                let issue = new Date($('#visa_issue_date').val());
                let expiry = new Date($('#visa_expiry_date').val());
                let text = "";

                // To calculate the time difference of two dates
                let Difference_In_Time = expiry.getTime() - issue.getTime();

                // To calculate the no. of days between two dates
                let Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
                if (Difference_In_Days < 0) {
                    alert('Expiry Date cannot be earlier than Issue Date');
                    $('#duration').val(text);

                    let getValue = document.getElementById("date_of_passport_expiry");
                    if (getValue.value != "") {
                        getValue.value = "";
                    }

                } else {
                    $('#duration').val(Difference_In_Days);
                }



            });
        });

        $("#visaForm").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#visaForm')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('visa') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Visa has been created successfully.',
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                    })
                    window.location.href = "{{ url('visa') }}";
                }
            }).done(function() {
                $("#success_msg").html("Data Save Successfully");
                // window.location.href = "{{ url('agents') }}";
                // location.reload();
            }).fail(function(data, textStatus, jqXHR) {
                $("#loader").hide();
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='margin-top: 66px;color: red;font-weight: 600';>" +
                        value +
                        "</span>");
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tagsvendor').autocomplete({
                html: true,
                source: function(request, response) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('search-vendors') }}",
                        dataType: "json",
                        data: {
                            q: request.term,
                        },
                        success: function(data) {
                            response(data.content);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $('#hiddenVendorId').val(ui.item.value);
                    return false;
                },
                minLength: 1,
                open: function() {

                    $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                },
                close: function() {

                    if ($('#hiddenVendorId').val() == '') {
                        $(this).val('');
                        $('#hiddenVendorId').val('');
                    }
                    $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
            });
            $('#tags').autocomplete({
                html: true,
                source: function(request, response) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('search_clients') }}",
                        dataType: "json",
                        data: {
                            q: request.term,
                        },
                        success: function(data) {
                            response(data.content);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $('#hiddenClientId').val(ui.item.value);
                    $.ajax({
                    method: "GET",
                    url: "{{ url('get-agent-id') }}/" + ui.item.value,
                    success: function(data, textStatus, jqXHR) {
                        $('#agent_id').html(data);
                        // $('#expense_sub_head_get').attr('selected');

                    }
                    });
                    return false;
                },
                minLength: 1,
                open: function() {

                    $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                },
                close: function() {

                    if ($('#hiddenClientId').val() == '') {
                        $(this).val('');
                        $('#hiddenClientId').val('');
                    }
                    $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
            });
        })
    </script>
@endsection
