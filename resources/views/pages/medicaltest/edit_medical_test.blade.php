@extends('master')
@section('content')
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/medical_test') }}">Medical
                                Test</a></li>
                        <li class="breadcrumb-item active">Edit Medical Test</li>
                    </ol>
                </div>
            </div> <!-- .row end -->
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="fs-5 color-900 mt-1 mb-0">Edit Medical Test !</h1>
                    <small class="text-muted">
                        <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                    </small>
                </div>
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0 text-md-end">
                    <a class="btn btn-primary" href="{{ url('medicaltest') }}"><i class="fa fa-list me-2"></i>Medical Test
                        List</a>
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
                            <h4>Medical Test Information</h4>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="MedicalTestForm">
                                @csrf
                                {{-- ---------Hidden INPUT Primery Id --------------- --}}
                                <input type="hidden" class="form-control form-control-lg" id="medical_test_id"
                                    name="medical_test_id" value="{{ $medicaltest[0]->medical_test_id }}">

                                {{-- <div class="col-6">

                                    <span class="float-label">


                                        <input type="text" class="form-control form-control-lg"
                                            id="medical_test_vendor_name" placeholder="Medical Id"
                                            name="medical_test_vendor_name" value="{{ $medicaltest[0]->vendor_name }}">

                                        <input type="hidden" class="form-control form-control-lg"
                                            id="medical_test_vendor_id" name="medical_test_vendor_id"
                                            value="{{ $medicaltest[0]->medical_test_vendor_id }}">

                                        <label class="form-label" for="medical_test_medical_id"
                                            value="{{ $medicaltest[0]->medical_test_id }}">Vendor Name</label>
                                    </span>
                                </div> --}}
                                <div class="col-6">


                                    <span class="float-label">

                                        <!--------- Input 2 ---------->


                                        <input type="text" class="form-control form-control-lg"
                                            id="medical_test_client_name" placeholder="Client Name"
                                            value="{{ $medicaltest[0]->client_name }}">

                                        <input type="hidden" class="form-control form-control-lg"
                                            id="medical_test_client_id" placeholder="Client Name"
                                            name="medical_test_client_id"
                                            value="{{ $medicaltest[0]->medical_test_client_id }}">

                                        <label class="form-label" for="medical_test_client_id">Client Name</label>
                                    </span>
                                </div>

                                <div class="col-lg-3 col-sm-12">
                                    <span class="float-label">
                                        <select class="form-control" name="agent_id" id="agent_id">

                                        </select>
                                        <label class="form-label" for="agentID">Agent</label>
                                    </span>
                                </div>

                                <div class="col-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="formFile" name="medical_test_file">
                                        <label class="form-label" for="formFile">Upload Attachment</label>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <label class="form-group float-label">
                                        <select class="form-control form-control-lg custom-select"
                                            name="medical_test_client_status" id="medical_test_client_status"
                                            value="{{ $medicaltest[0]->medical_test_client_id }}">
                                            <option value="" disabled selected>
                                                Select
                                            </option>
                                            <option value="fit" @if ($medicaltest[0]->medical_test_client_status == 'fit') selected @endif>Fit
                                            </option>
                                            <option value="unfit" @if ($medicaltest[0]->medical_test_client_status == 'unfit') selected @endif>Unfit
                                            </option>
                                        </select>
                                        <span>Medical Test Status</span>
                                    </label>
                                </div>
                                {{-- <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="visa_amount"
                                            placeholder="Cost" name="medical_test_processing_cost"
                                            value="{{ $medicaltest[0]->medical_test_processing_cost }}">
                                        <label class="form-label" for="medical_test_processing_cost">Processing Cost</label>
                                    </span>
                                </div> --}}

                                     <div class="col-lg-4 col-md-6 col-sm-6" id="note">
                                    <span class="float-label">
                                        <textarea name="note" id="" class="form-control">{{ $medicaltest[0]->note }}</textarea>
                                        <label class="form-label" for="note">note</label>
                                    </span>
                                    </div>


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

        // let note = $('#note').hide();

        $('#medical_test_client_status').change(function() {

            let note = $('#note').hide();
            // let selectaccount = $('#selectaccount').show();
            //let select_account = $('#select_account').show();

            let selectedValue = $(this).children("option:selected").val();



            if (selectedValue == 'fit') {

                $('#note').hide();

            } else {
                $('#note').show();
            }
        });
        $("#MedicalTestForm").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = $('#MedicalTestForm').serializeArray();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "PATCH",
                url: "{{ url('medicaltest') }}/" + $("[name=medical_test_id]").val(),
                data: data,
                cache: false,
                success: function(data, textStatus, jqXHR) {

                    // alert(data);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Medical Test Information has been updated successfully.',
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                    });
                    window.location.href = "{{ url('medicaltest') }}";
                }
            }).done(function() {
                $("#success_msg").html("Data Save Successfully");
            }).fail(function(data, textStatus, jqXHR) {
                $('#loader').hide();
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" + value +
                        "</span>");
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {


            $('#medical_test_medical_name').autocomplete({
                html: true,
                source: function(request, response) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('search-medical') }}",
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
                    $('#medical_test_id').val(ui.item.value);

                    return false;
                },
                minLength: 1,
                open: function() {

                    $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                },
                close: function() {

                    if ($('#medical_test_id').val() == '') {
                        $(this).val('');
                        $('#medical_test_id').val('');
                    }
                    $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
            });

            $('#medical_test_client_name').autocomplete({
                html: true,
                source: function(request, response) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('search-clients') }}",
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
                    $('#medical_test_client_id').val(ui.item.value);
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

                    if ($('#medical_test_client_id').val() == '') {
                        $(this).val('');
                        $('#medical_test_client_id').val('');
                    }
                    $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
            });
            $('#medical_test_vendor_name').autocomplete({
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
        })
    </script>
@endsection
