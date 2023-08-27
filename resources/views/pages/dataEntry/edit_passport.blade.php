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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('passport.index') }}">Data
                                Entry</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Passport</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ route('passport.index') }}"><i class="fa fa-list me-2"></i>List
                        Passport</a>
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
                            <h6 class="card-title mb-0">Edit Passport</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="passport_form">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="passport_id" id="passport_id" value="{{ $data->id }}">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="tags"
                                            placeholder="Client"
                                            name=""@if ($clientName) value="{{ $clientName->client_name }}" @endif>
                                        <input type="hidden" class="for m-control form-control-lg" id="hiddenClientId"
                                            placeholder="Client" name="clientId" value="{{ $data->passport_client_id }}">
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
                                {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="tagsvendor"
                                            placeholder="Vendor" name=""
                                            @if ($vendorName) value="{{ $vendorName->vendor_name }}" @endif>
                                        <input type="hidden" class="form-control form-control-lg" id="hiddenVendorId"
                                            placeholder="Vendor" name="passport_vendor_id"
                                            value="{{ $data->passport_vendor_id }}">
                                        <label class="form-label" for="passport_vendor_id">Vendor Name</label>
                                    </span>
                                </div> --}}

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="passport_no"
                                            placeholder="Passport Number" name="passport_no"
                                            value="{{ $data->passport_no }}">
                                        <label class="form-label" for="passport_no">Passport Number</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="passport_name"
                                            placeholder="Name" name="passport_name" value="{{ $data->passport_name }}">
                                        <label class="form-label" for="mobile_number">Name</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="mobile_number"
                                            placeholder="Mobile Number" name="mobile_number"
                                            value="{{ $data->mobile_number }}">
                                        <label class="form-label" for="mobile_number">Mobile Number</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="date_of_birth"
                                            placeholder="DOB" name="date_of_birth" value="{{ $data->date_of_birth }}">
                                        <label class="form-label" for="date_of_birth">Date of Birth</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg"
                                            id="date_of_passport_issue" placeholder="DOI" name="date_of_passport_issue"
                                            value="{{ $data->date_of_passport_issue }}">
                                        <label class="form-label" for="date_of_passport_issue">Date of Issue</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg"
                                            id="date_of_passport_expiry" placeholder="DOE" name="date_of_passport_expiry"
                                            value="{{ $data->date_of_passport_expiry }}">
                                        <label class="form-label" for="date_of_passport_expiry">Date of Expiry</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="duration_left"
                                            placeholder="left" name="duration_left" value="{{ $data->duration_left }}">
                                        <label class="form-label" for="duration_left">Duration</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="email" class="form-control form-control-lg" id="email"
                                            placeholder="Email" name="email" value="{{ $data->email }}">
                                        <label class="form-label" for="email">Email</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg"
                                            id="passport_reference" placeholder="Reference" name="passport_reference"
                                            value="{{ $data->passport_reference }}">
                                        <label class="form-label" for="passport_reference">Reference</label>
                                    </span>
                                </div>
                                {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="passport_amount"
                                            placeholder="Passport Amount" name="passport_amount"
                                            value="{{ $data->passport_amount }}">
                                        <label class="form-label" for="passport_amount">Passport Amount</label>
                                    </span>
                                </div> --}}
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="passport_document"
                                            name="passport_document">
                                        <label class="form-label" for="passport_document">Upload Passport</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="date" id="passport_receive_date"
                                            name="passport_receive_date" value="{{ $data->passport_receive_date }}">
                                        <label class="form-label" for="passport_receive_date">Passport Receive
                                            Date</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="date" id="passport_delivery_date"
                                            name="passport_delivery_date" value="{{ $data->passport_delivery_date }}">
                                        <label class="form-label" for="passport_delivery_date">Passport Delivery
                                            Date</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="date" id="passport_attached_date"
                                            name="passport_attached_date" value="{{ $data->passport_attached_date }}">
                                        <label class="form-label" for="passport_attached_date">Passport Attached
                                            Date</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="text" id="office_name" name="office_name"
                                            value="{{ $data->office_name }}">
                                        <label class="form-label" for="office_name">Office Name</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <textarea name="note" id="note" class="form-control">{{ $data->note }}</textarea>
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
        $("#passport_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#passport_form')[0]);
            let getpassport_id = $("[name=passport_id]").val();
            $('#loader').show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('passport') }}/" + $("[name=passport_id]").val(),
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    window.location.href = "{{ url('passport') }}";
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
            $('#date_of_passport_issue, #date_of_passport_expiry').change(function() {
                let issue = new Date($('#date_of_passport_issue').val());
                let expiry = new Date($('#date_of_passport_expiry').val());
                let text = "";

                // To calculate the time difference of two dates
                let Difference_In_Time = expiry.getTime() - issue.getTime();

                // To calculate the no. of days between two dates
                let Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
                if (Difference_In_Days < 0) {
                    alert('Expiry Date cannot be earlier than Issue Date');
                    $('#duration_left').val(text);

                    let getValue = document.getElementById("date_of_passport_expiry");
                    if (getValue.value != "") {
                        getValue.value = "";
                    }

                } else {
                    $('#duration_left').val(Difference_In_Days);
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
        });
    </script>
@endsection
