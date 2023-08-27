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
                        <li class="breadcrumb-item"><a class="text-secondary" href="javascript:void()">Data Entry</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Manpower Office</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('manpowers') }}"><i class="fa fa-list me-2"></i>List Manpower
                        Office</a>
                    {{-- <a class="btn btn-secondary" href="{{ 'agents/create' }}"><i class="fa fa-user me-2"></i>Create
                        Agent</a> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- start: page body -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container">
            <div class="row g-3">


                <!-- Form Validation -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Edit Manpower Office</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="manpower_office_form">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="manpower_office_id" id="manpower_office_id"
                                    value="{{ $data->id }}">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="tags"
                                            placeholder="Client" name="">
                                        <input type="hidden" class="form-control form-control-lg" id="hiddenClientId"
                                            placeholder="Client" name="manpower_client_id" value="{{ $data->manpower_client_id }}">
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

                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="manpower_manual_id"
                                            placeholder="Manpower No" name="manpower_manual_id" value="{{ $data->manpower_manual_id }}">
                                        <label class="form-label" for="TextInput">Manpower Manual ID <span
                                                class="text-danger">*</span></label>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="office_name"
                                            placeholder="Manpower Office" name="office_name" value="{{ $data->office_name }}">
                                        <label class="form-label" for="TextInput">Manpower Office <span
                                                class="text-danger">*</span></label>
                                    </span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="office_address"
                                            placeholder="Office Address" name="office_address" value="{{ $data->office_address }}">
                                        <label class="form-label" for="office_address">Office Address</label>
                                    </span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="job_type"
                                            placeholder="Job Type" name="job_type" value="{{ $data->job_type }}">
                                        <label class="form-label" for="job_type">Job Type</label>
                                    </span>
                                </div>

                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="manpower_issue_date"
                                            placeholder="Bank name" name="manpower_issue_date" value="{{ $data->manpower_issue_date }}">
                                        <label class="form-label" for="visa_issue_date">Manpower Issue Date<span
                                                class="text-danger">*</span></label>
                                    </span>
                                </div>

                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="manpower_expiry_date"
                                            placeholder="Visa Expiry Date" name="manpower_expiry_date" value="{{ $data->manpower_expiry_date }}">
                                        <label class="form-label" for="manpower_expiry_date">Manpower Expiry Date<span
                                                class="text-danger">*</span></label>
                                    </span>
                                </div>

                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="duration"
                                            placeholder="Visa Duration" name="duration" value="{{ $data->duration }}" readonly>
                                        <label class="form-label" for="duration">Manpower Duration</label>
                                    </span>
                                </div>

                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="passenger_name"
                                            placeholder="Passenger Name" name="passenger_name" value="{{ $data->passenger_name }}">
                                        <label class="form-label" for="passenger_name">Passenger Name</label>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="nid_number"
                                            placeholder="NID Number" name="nid_number" value="{{ $data->nid_number }}">
                                        <label class="form-label" for="nid_number">NID Number</label>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="passport_number"
                                            placeholder="Passport Number" name="passport_number" value="{{ $data->passport_number }}">
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
                                            name="police_clearence_number" value="{{ $data->police_clearence_number }}">
                                        <label class="form-label" for="police_clearence_number">Police Clearence
                                            No</label>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="medical_test_date"
                                            placeholder="Medical test Date" name="medical_test_date" value="{{ $data->medical_test_date }}">
                                        <label class="form-label" for="medical_test_date">Medical test Date</label>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="mobile_no"
                                            placeholder="Mobile No" name="mobile_no" value="{{ $data->mobile_no }}">
                                        <label class="form-label" for="mobile_no">Mobile No</label>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="office_date"
                                            placeholder="Office Date" name="office_date" value="{{ $data->office_date }}">
                                        <label class="form-label" for="office_date">Office Date</label>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <label class="form-group float-label">
                                        <select class="form-control form-control-lg custom-select" name="manpower_gender_type"
                                            id="manpower_gender_type">
                                            <option value="" disabled selected>
                                                Select
                                            </option>
                                            <option value="man" @if ($data->manpower_gender_type == 'man') selected @endif>Man</option>
                                            <option value="woman" @if ($data->manpower_gender_type == 'woman') selected @endif>Women</option>
                                            <option value="other" @if ($data->manpower_gender_type == 'other') selected @endif>Other</option>
                                        </select>
                                        <span>Gender</span>
                                    </label>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <textarea name="note" id="note" class="form-control">{!!$data->note!!}</textarea>
                                        <label class="form-label" for="note">note</label>
                                    </span>
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
        $("#manpower_office_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#manpower_office_form')[0]);
            let getoffice_id = $("[name=manpower_office_id]").val();
            $('#loader').show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('manpowers') }}/" + $("[name=manpower_office_id]").val(),
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    window.location.href = "{{ url('manpowers') }}";
                }
            }).done(function() {
                $("#success_msg").html("Data Save Successfully");
                //window.location.href = "{{ url('users') }}/";
                // location.reload();
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
