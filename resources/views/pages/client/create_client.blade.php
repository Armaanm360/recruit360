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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('clients') }}">Client</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Client</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('clients') }}"><i class="fa fa-list me-2"></i>List Client</a>
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
                            <h6 class="card-title mb-0">Create Client</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="client_form">
                                @csrf
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="client_name"
                                            placeholder="Name" name="client_name">
                                        <label class="form-label" for="TextInput">Client Name</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="client_entry_id"
                                            placeholder="Client Entry Id" name="client_entry_id" required>
                                        <label class="form-label" for="TextInput">Client EntryID <span style="color: red">*</span></label>
                                    </span>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="agentID"
                                            placeholder="Search Agent" name="agent_name">
                                        <label class="form-label" for="agentID">Search Agent </label>
                                    </span>
                                    <input type="hidden" id="hiddenAgentID" name="agent_id">
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="searchDeligate"
                                            placeholder="Search Deligate" name="deligate_name">
                                        <label class="form-label" for="deligateID">Search Deligate </label>
                                    </span>
                                    <input type="hidden" id="hiddenDeligateID" name="deligate_id">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="client_nid"
                                            placeholder="Client NID" name="client_nid">
                                        <label class="form-label" for="NidInput">NID</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="formFile" name="client_nid_front">
                                        <label class="form-label" for="formFile">Client NID Front</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="formFile" name="client_nid_back">
                                        <label class="form-label" for="formFile">Client NID Back</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="client_phone"
                                            placeholder="Phone" name="client_phone">
                                        <label class="form-label" for="PhoneInput">Phone</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="email" class="form-control form-control-lg" id="client_email"
                                            placeholder="Email" name="client_email">
                                        <label class="form-label" for="emailInput">Email</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control" name="client_job_type" id="client_job_type">
                                            <option selected disabled>Select Job Type</option>
                                            @foreach ($client_job_type as $client_job_type)
                                                <option value="{{ $client_job_type->jobtype_id }}">
                                                    {{ $client_job_type->jobtype }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label" for="client_job_type">Client Job Type</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="date_of_birth"
                                            placeholder="Date of Birth" name="client_date_of_birth">
                                        <label class="form-label" for="date_of_birth">Date of Birth</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="present_age"
                                            placeholder="Age" name="present_age">
                                        <label class="form-label" for="present_age">Present Age</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="client_address"
                                            placeholder="Address" name="client_address">
                                        <label class="form-label" for="AddressInput">Address</label>
                                    </span>
                                </div>


                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="father_name"
                                            placeholder="Father Name" name="father_name">
                                        <label class="form-label" for="father_name">Father Name</label>
                                    </span>
                                </div>


                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="mother_name"
                                            placeholder="Mother Name" name="mother_name">
                                        <label class="form-label" for="mother_name">Mother Name</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="spouse_name"
                                            placeholder="Spouse Name" name="spouse_name">
                                        <label class="form-label" for="spouse_name">Spouse Name</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control" name="martial_status" id="martial_status">
                                            <option selected disabled>Select One</option>
                                            <option value="MARRIED">Married</option>
                                            <option value="UNMARRIED">Unmarried</option>
                                        </select>
                                        <label class="form-label" for="exp_tc">Martial Status</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="target_country"
                                            placeholder="Target Country" name="target_country">
                                        <label class="form-label" for="target_country">Target Country</label>
                                    </span>
                                </div>


                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="visa_type"
                                            placeholder="Visa Type" name="visa_type">
                                        <label class="form-label" for="visa_type">Visa Type</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="village_house"
                                            placeholder="Village/House" name="village_house">
                                        <label class="form-label" for="village_house">Village/House</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="ward"
                                            placeholder="ward" name="ward">
                                        <label class="form-label" for="ward">Ward</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="district"
                                            placeholder="district" name="district">
                                        <label class="form-label" for="district">District</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="police_station"
                                            placeholder="Police Station" name="police_station">
                                        <label class="form-label" for="police_station">Police Station</label>
                                    </span>
                                </div>


                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="religion"
                                            placeholder="religion" name="religion">
                                        <label class="form-label" for="religion">Religion</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="remarks"
                                            placeholder="remarks" name="remarks">
                                        <label class="form-label" for="remarks">Remarks</label>
                                    </span>
                                </div>



                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control" name="musaned" id="musaned">
                                            <option value="">Select One</option>
                                            <option value="DONE">DONE</option>
                                            <option value="INCOMPLETE">INCOMPLETE</option>
                                        </select>
                                        <label class="form-label" for="musaned">Musaned</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="musaned_number"
                                            placeholder="Musaned Number" name="musaned_number">
                                        <label class="form-label" for="musaned_number">Musaned#</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="musaned_date"
                                            placeholder="Musaned Date" name="musaned_date">
                                        <label class="form-label" for="musaned_date">Musaned Date</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="musaned_file"
                                            name="musaned_file">
                                        <label class="form-label" for="musaned_file">Musaned File</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control" name="exp_tc" id="exp_tc">
                                            <option selected disabled>Select One</option>
                                            <option value="EXP">EXP</option>
                                            <option value="TC">TC</option>
                                        </select>
                                        <label class="form-label" for="exp_tc">EXP/TC</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="mofa"
                                            placeholder="MOFA" name="mofa">
                                        <label class="form-label" for="MOFA">MOFA#</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control" name="e_chek" id="e_chek">
                                            <option selected disabled>Select One</option>
                                            <option value="NEGATIVE">NEGATIVE</option>
                                            <option value="POSITIVE">POSITIVE</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                        <label class="form-label" for="E-Chek">E-Chek</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control" name="client_gender" id="client_gender">
                                            <option selected disabled>Select One</option>
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>
                                            <option value="OTHERS">OTHERS</option>
                                        </select>
                                        <label class="form-label" for="E-Chek">Client Gender</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="formFile" name="image">
                                        <label class="form-label" for="formFile">Image</label>
                                    </span>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label class="form-group float-label">
                                            <select class="form-control form-control-lg custom-select"
                                                name="transaction_type" id="opbalance">
                                                <option disabled selected>
                                                    {{ __('Select Opening Balance') }}
                                                </option>
                                                <option value="advance">Advance</option>
                                                <option value="due">Due</option>
                                            </select>
                                            <span>Opening Balance</span>
                                        </label>
                                    </div>

                                    <div class="col-6" id="full_div">
                                        <span class="float-label">
                                            <input type="number" class="form-control form-control-lg" id="balance"
                                                name="client_opening_balance">
                                            <label class="form-label" for="emailInput">Balance</label>
                                        </span>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <span class="float-label">
                                            <input type="text" class="form-control form-control-lg"
                                                id="emergency_person_contact_no" placeholder="Emergency Person Contact No"
                                                name="emergency_person_contact_no">
                                            <label class="form-label" for="emergency_person_contact_no">Emergency Person
                                                Contact No</label>
                                        </span>
                                    </div>


                                </div>


                                <div class="row mt-3">
                                    <div class="col-6" id="select_account">
                                        <label class="form-group float-label">
                                            <select class="form-control form-control-lg custom-select" name="accounts">
                                                <option disabled selected>
                                                    {{ __('Select Account') }}
                                                </option>
                                                @foreach ($accounts as $accounts)
                                                    <option value="{{ $accounts->account_id }}">
                                                        {{ $accounts->account_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span>Accounts</span>
                                        </label>
                                    </div>
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
    $(document).ready(function(){
        $('#searchDeligate').autocomplete({
                html: true,
                source: function(request, response) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('search-deligate') }}",
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
                    $('#hiddenDeligateID').val(ui.item.value);
                    return false;
                },
                minLength: 1,
                open: function() {

                    $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                },
                close: function() {

                    if ($('#hiddenDeligateID').val() == '') {
                        $(this).val('');
                        $('#hiddenDeligateID').val('');
                    }
                    $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
        });

        $('#agentID').autocomplete({
                html: true,
                source: function(request, response) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('search-agent') }}",
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
                    $('#hiddenAgentID').val(ui.item.value);
                    return false;
                },
                minLength: 1,
                open: function() {

                    $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                },
                close: function() {

                    if ($('#hiddenAgentID').val() == '') {
                        $(this).val('');
                        $('#hiddenAgentID').val('');
                    }
                    $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                }
        });
        $('#client_name').keyup(function() {
            let rand = 'client';
            let x = Math.floor((Math.random() * 100000) + 1);

            $('#client_entry_id').val(rand + '-' + x);

        });
        $('#date_of_birth').change(function() {
            let dob = new Date($('#date_of_birth').val());
            let today = new Date();
            var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
            $('#present_age').val(age);
        });


        let balance = $('#full_div').hide();
        let select_account = $('#select_account').hide();
        let selectaccount = $('#selectaccount').hide();

        $('#opbalance').change(function() {

            let balance = $('#full_div').show();
            let selectaccount = $('#selectaccount').show();
            //let select_account = $('#select_account').show();

            let selectedAccount = $(this).children("option:selected").val();



            if (selectedAccount == 'advance') {

                $('#select_account').show();

            } else {
                $('#select_account').hide();
            }
        });

        $("#client_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#client_form')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('clients') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Client Created Successful',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,

                    })
                    $('#client_form')[0].reset();
                    $('#full_div').hide();
                    $('#select_account').hide();
                    window.location.href = "{{ url('clients') }}";
                }
            }).done(function() {
                $("#success_msg").html("Data Save Successfully");
                // window.location.href = "{{ url('agents') }}";
                // location.reload();
            }).fail(function(data, textStatus, jqXHR) {
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" + value +
                        "</span>");
                });
            });
        });
    });
    </script>
@endsection
