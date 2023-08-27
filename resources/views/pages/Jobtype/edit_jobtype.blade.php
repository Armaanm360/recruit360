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
                        <li class="breadcrumb-item active">Edit Job Type</li>
                    </ol>
                </div>
            </div> <!-- .row end -->
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="fs-5 color-900 mt-1 mb-0">Edit Job Type !</h1>
                    <small class="text-muted">
                        <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                    </small>
                </div>
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0 text-md-end">
                    <a class="btn btn-primary" href="{{ url('jobtype') }}"><i class="fa fa-list me-2"></i>Job Type
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
                            <h4>Job Type Information</h4>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="jobtypeForm">
                                @csrf
                                {{-- ---------Hidden INPUT Primery Id --------------- --}}
                                <input type="hidden" class="form-control form-control-lg" id="jobtype_id" name="jobtype_id"
                                    value="{{ $jobtype->jobtype_id }}">
                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="jobtype"
                                            placeholder="jobtype" name="jobtype" value="{{ $jobtype->jobtype }}">
                                        <label class="form-label" for="medical_test_processing_cost">Job Type</label>
                                    </span>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
        $("#jobtypeForm").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = $('#jobtypeForm').serializeArray();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "PATCH",
                url: "{{ url('jobtype') }}/" + $("[name=jobtype_id]").val(),
                data: data,
                cache: false,
                success: function(data, textStatus, jqXHR) {

                    // alert(data);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Job Type Information has been updated successfully.',
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                    });
                    window.location.href = "{{ url('jobtype') }}";
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
