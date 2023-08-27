@extends('master')
@section('content')
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('client-overall-data') }}">Client Overall Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Client Overall Data</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('client-overall-data') }}"><i class="fa fa-list me-2"></i>List Client Overall Data</a>
                    {{-- <a class="btn btn-secondary" href="{{ 'agents/create' }}"><i class="fa fa-user me-2"></i>Create
    Agent</a> --}}
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
                            <h6 class="card-title mb-0">Create Client Overall Data</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="client_form" enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="tags"
                                            placeholder="Client" name="">
                                        <input type="hidden" class="form-control form-control-lg" id="hiddenClientId"
                                            placeholder="Client" name="client_id">
                                        <label class="form-label" for="client_id">Client Name</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="mofa_number"
                                            placeholder="Mufa Number" name="mofa_number">
                                        <label class="form-label" for="mofa_number">Mufa Number</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="mofa_file" name="mofa_file">
                                        <label class="form-label" for="mofa_file">Mufa Document</label>
                                    </span>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select name="fingur_status" id="fingur_status" class="form-control">
                                            <option value="">Select One</option>
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                        <label class="form-label" for="fingur_status">Fingerprint Status</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="fingur_file" name="fingur_file">
                                        <label class="form-label" for="fingur_file">Finger Print Document</label>
                                    </span>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select name="bank_statement_status" id="bank_statement_status" class="form-control">
                                            <option value="">Select One</option>
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                        <label class="form-label" for="bank_statement_status">Bank Account Status</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="bank_statement_file" name="bank_statement_file">
                                        <label class="form-label" for="bank_statement_file">Bank Account Document</label>
                                    </span>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select name="bmet_status" id="bmet_status" class="form-control">
                                            <option value="">Select One</option>
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                        <label class="form-label" for="bmet_status">BMET Status</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="bmet_file" name="bmet_file">
                                        <label class="form-label" for="bmet_file">BMET Document</label>
                                    </span>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="flight_airline"
                                            placeholder="Airline" name="flight_airline">
                                        <label class="form-label" for="flight_airline">Airline</label>
                                    </span>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="flight_ticket_number"
                                            placeholder="Air Ticket" name="flight_ticket_number">
                                        <label class="form-label" for="flight_ticket_number">Air Ticket</label>
                                    </span>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="flight_number"
                                            placeholder="Flight Number" name="flight_number">
                                        <label class="form-label" for="flight_number">Flight Number</label>
                                    </span>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="flight_date"
                                            placeholder="Flight Date" name="flight_date">
                                        <label class="form-label" for="flight_date">Flight Date</label>
                                    </span>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="flight_file" name="flight_file">
                                        <label class="form-label" for="flight_file">Flight Document</label>
                                    </span>
                                </div>

                                <div class="col-12">
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
        $("#client_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#client_form')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('client-overall-data') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Client Data has been saved',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    })
                    window.location.href = "{{ url('client-overall-data') }}";
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


         $('#tags').autocomplete({
            html: true,
            source: function (request, response) {
                $.ajax({
                    type: "GET",
                    url: "{{url('search_clients')}}",
                    dataType: "json",
                    data: {
                        q: request.term,
                    },
                    success: function (data) {
                        response(data.content);
                    }
                });
            },
            select: function (event, ui) {
                $(this).val(ui.item.label);
                $('#hiddenClientId').val(ui.item.value);
                return false;
            },
            minLength: 1,
            open: function () {

                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function () {

                if( $('#hiddenClientId').val() == ''){
                    $(this).val('');
                    $('#hiddenClientId').val('');
                }
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
    })
    </script>
@endsection
