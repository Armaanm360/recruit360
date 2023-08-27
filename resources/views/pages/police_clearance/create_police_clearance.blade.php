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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/police-clearance') }}">Police
                                Clearance</a></li>
                        <li class="breadcrumb-item active">Create Police Clearance</li>
                    </ol>
                </div>
            </div> <!-- .row end -->
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="fs-5 color-900 mt-1 mb-0">Create Police Clearance !</h1>
                    <small class="text-muted">
                        <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                    </small>
                </div>
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0 text-md-end">
                    <a class="btn btn-primary" href="{{ url('police-clearance') }}"><i class="fa fa-list me-2"></i>Police
                        Clearance
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
                            <h4>Police Clearance Information</h4>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="PoliceClearanceForm">
                                @csrf

                                <div class="col-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg"
                                            id="police_clearance_client_id" placeholder="Client Name"
                                            name="police_clearance_client_id">

                                        <input type="hidden" class="form-control form-control-lg"
                                            id="hidden_police_clearance_client_id" placeholder="Client Name"
                                            name="police_clearance_client_id">

                                        <label class="form-label" for="police_clearance_client_id">Client Name</label>
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
                                        <input type="text" class="form-control form-control-lg" id="police_clearance_no"
                                            placeholder="Police Clearance No" name="police_clearance_no">

                                        <label class="form-label" for="police_clearance_client_id">Police Clearance
                                            No</label>
                                    </span>
                                </div>
                                {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="tagsvendor"
                                            placeholder="Vendor" name="">
                                        <input type="hidden" class="form-control form-control-lg" id="hiddenVendorId"
                                            placeholder="Vendor" name="police_clearance_vendor_id">
                                        <label class="form-label" for="police_clearance_vendor_id">Vendor Name</label>
                                    </span>
                                </div> --}}
                                <div class="col-6">
                                    <label class="form-group float-label">
                                        <select class="form-control form-control-lg custom-select"
                                            name="police_clearance_status" id="police_clearance_status">
                                            <option value="" disabled selected>
                                                Select
                                            </option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        <span>Police Clearance Status</span>
                                    </label>
                                </div>
                                {{-- <div class="col-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="visa_amount"
                                            placeholder="Cost" name="police_clearence_processing_cost">
                                        <label class="form-label" for="police_clearence_processing_cost">Processing
                                            Cost</label>
                                    </span>
                                </div> --}}

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <textarea name="note" id="note" class="form-control"></textarea>
                                        <label class="form-label" for="note">note</label>
                                    </span>
                                </div>

                                <div class="row m-3">
                                    <div class="col-6">
                                        <span class="float-label">
                                            <input class="form-control" type="file" id="police_clearance_file"
                                                name="police_clearance_file" accept="image/*" onchange="loadFile(event)">
                                            <label class="form-label" for="police_clearance_file">Attach Document</label>
                                        </span>
                                    </div>
                                    <div class="col-6">
                                        <img id="output"
                                            src="https://cdn.pixabay.com/photo/2017/03/08/21/21/file-2127833__340.png" />
                                    </div>
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


    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script type="text/javascript">
        // $('#agentname').keyup(function() {
        //  let rand = $('#agentname').val();
        //  let x = Math.floor((Math.random() * 100000) + 1);

        //  $('#agent_entry_id').val(rand + x);

        // });

        $("#PoliceClearanceForm").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#PoliceClearanceForm')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('police-clearance') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Police Clearance has been created successfully.',
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                    })
                    window.location.href = "{{ url('police-clearance') }}";
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
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" + value +
                        "</span>");
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $('#police_clearance_client_id').autocomplete({
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
                    $('#hidden_police_clearance_client_id').val(ui.item.value);
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

                    if ($('#hidden_police_clearance_client_id').val() == '') {
                        $(this).val('');
                        $('#hidden_police_clearance_client_id').val('');
                    }
                    $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
            });



            // $('#police_clearance_client_id').autocomplete({
            //     html: true,
            //     source: function(request, response) {
            //         $.ajax({
            //             type: "GET",
            //             url: "{{ url('search-clients') }}",
            //             dataType: "json",
            //             data: {
            //                 q: request.term,
            //             },
            //             success: function(data) {
            //                 response(data.content);
            //             }
            //         });
            //     },
            //     select: function(event, ui) {
            //         $(this).val(ui.item.label);
            //         $('#hidden_police_clearance_client_id').val(ui.item.value);
            //         return false;
            //     },
            //     minLength: 1,
            //     open: function() {

            //         $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            //     },
            //     close: function() {

            //         if ($('#hidden_police_clearance_client_id').val() == '') {
            //             $(this).val('');
            //             $('#hidden_police_clearance_client_id').val('');
            //         }
            //         $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            //     }
            // });
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
        })
    </script>
@endsection
