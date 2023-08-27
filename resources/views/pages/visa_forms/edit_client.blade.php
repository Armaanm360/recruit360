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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('clients') }}">client</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create client</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('clients') }}"><i class="fa fa-list me-2"></i>Edit client</a>
                    {{-- <a class="btn btn-secondary" href="{{ 'clients/create' }}"><i class="fa fa-user me-2"></i>Create
                        client</a> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- start: page body -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Edit User</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="add_form">
                                @csrf
                                @method('PUT')
                                <div class="col-lg-6 col-md-6 col-sm-6">

                                    <input type="hidden" name="client_id" value="{{ $clientData->client_id }}">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="clientname"
                                            placeholder="Name" name="client_name" value="{{ $clientData->client_name }}">
                                        <label class="form-label" for="TextInput">Name</label>
                                    </span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="client_entry_id"
                                            placeholder="clientEntry Id" name="client_entry_id"
                                            value="{{ $clientData->client_entry_id }}" readonly>
                                        <label class="form-label" for="TextInput">clientEntry ID</label>
                                    </span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="NidInput"
                                            placeholder="Nid" name="client_nid" value="{{ $clientData->client_nid }}">
                                        <label class="form-label" for="NidInput">Nid</label>
                                    </span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="PhoneInput"
                                            placeholder="Phone" name="client_phone" value="{{ $clientData->client_phone }}">
                                        <label class="form-label" for="PhoneInput">Phone</label>
                                    </span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control" name="client_job_type" id="client_job_type">
                                            <option selected disabled>Select Job Type</option>
                                            @foreach ($jobtype as $jobtype)
                                                <option value="{{ $jobtype->jobtype_id }}"
                                                    @if ($clientData->client_job_type == $jobtype->jobtype_id) selected @endif>
                                                    {{ $jobtype->jobtype }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label" for="PhoneInput">Job Type</label>
                                    </span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="email" class="form-control form-control-lg" id="emailInput"
                                            placeholder="Email" name="client_email"
                                            value="{{ $clientData->client_email }}">
                                        <label class="form-label" for="emailInput">Email</label>
                                    </span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="AddressInput"
                                            placeholder="Address" name="client_address"
                                            value="{{ $clientData->client_address }}">
                                        <label class="form-label" for="AddressInput">Address</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="date_of_birth"
                                            placeholder="Date of Birth" name="client_date_of_birth"
                                            value="{{ $clientData->client_date_of_birth }}">
                                        <label class="form-label" for="date_of_birth">Date of Birth</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="father_name"
                                            placeholder="Father Name" name="father_name"
                                            value="{{ $clientData->father_name }}">
                                        <label class="form-label" for="father_name">Father Name</label>
                                    </span>
                                </div>


                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="mother_name"
                                            placeholder="Mother Name" name="mother_name"
                                            value="{{ $clientData->mother_name }}">
                                        <label class="form-label" for="mother_name">Mother Name</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="spouse_name"
                                            placeholder="Spouse Name" name="spouse_name"
                                            value="{{ $clientData->spouse_name }}">
                                        <label class="form-label" for="spouse_name">Spouse Name</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control" name="martial_status" id="martial_status">
                                            <option selected disabled>Select One</option>
                                            <option value="MARRIED" @if ($clientData->martial_status == 'MARRIED') selected @endif>
                                                Married</option>
                                            <option value="UNMARRIED" @if ($clientData->martial_status == 'UNMARRIED') selected @endif>
                                                Unmarried</option>
                                        </select>
                                        <label class="form-label" for="exp_tc">Martial Status</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="target_country"
                                            placeholder="Target Country" name="target_country"
                                            value="{{ $clientData->target_country }}">
                                        <label class="form-label" for="target_country">Target Country</label>
                                    </span>
                                </div>


                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="visa_type"
                                            placeholder="Visa Type" name="visa_type"
                                            value="{{ $clientData->visa_type }}">
                                        <label class="form-label" for="visa_type">Visa Type</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="village_house"
                                            placeholder="Village/House" name="village_house"
                                            value="{{ $clientData->village_house }}">
                                        <label class="form-label" for="village_house">Village/House</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="ward"
                                            placeholder="ward" name="ward" value="{{ $clientData->ward }}">
                                        <label class="form-label" for="ward">Ward</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="district"
                                            placeholder="district" name="district" value="{{ $clientData->district }}">
                                        <label class="form-label" for="district">District</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="police_station"
                                            placeholder="Police Station" name="police_station"
                                            value="{{ $clientData->police_station }}">
                                        <label class="form-label" for="police_station">Police Station</label>
                                    </span>
                                </div>


                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="religion"
                                            placeholder="religion" name="religion" value="{{ $clientData->religion }}">
                                        <label class="form-label" for="religion">Religion</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="remarks"
                                            placeholder="remarks" name="remarks" value="{{ $clientData->remarks }}">
                                        <label class="form-label" for="remarks">Remarks</label>
                                    </span>
                                </div>



                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control" name="musaned" id="musaned">
                                            <option value="">Select One</option>
                                            <option value="DONE" @if ($clientData->musaned == 'DONE') selected @endif>DONE
                                            </option>
                                            <option value="INCOMPLETE" @if ($clientData->musaned == 'INCOMPLETE') selected @endif>
                                                INCOMPLETE</option>
                                        </select>
                                        <label class="form-label" for="musaned">Musaned</label>
                                    </span>
                                </div>


                                {{-- new remarks --}}
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="father_name"
                                            placeholder="Father Name" name="father_name"
                                            value="{{ $clientData->father_name }}">
                                        <label class="form-label" for="father_name">Father Name</label>
                                    </span>
                                </div>


                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="mother_name"
                                            placeholder="Mother Name" name="mother_name"
                                            value="{{ $clientData->mother_name }}">
                                        <label class="form-label" for="mother_name">Mother Name</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="spouse_name"
                                            placeholder="Spouse Name" name="spouse_name"
                                            value="{{ $clientData->spouse_name }}">
                                        <label class="form-label" for="spouse_name">Spouse Name</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control" name="martial_status" id="martial_status">
                                            <option selected disabled>Select One</option>
                                            <option value="EXP" @if ($clientData->martial_status == 'EXP') selected @endif>
                                                Married</option>
                                            <option value="TC" @if ($clientData->martial_status == 'TC') selected @endif>TC
                                            </option>
                                        </select>
                                        <label class="form-label" for="exp_tc">Martial Status</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="target_country"
                                            placeholder="Target Country" name="target_country"
                                            value="{{ $clientData->target_country }}">
                                        <label class="form-label" for="target_country">Target Country</label>
                                    </span>
                                </div>


                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="visa_type"
                                            placeholder="Visa Type" name="visa_type"
                                            value="{{ $clientData->visa_type }}">
                                        <label class="form-label" for="visa_type">Visa Type</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="village_house"
                                            placeholder="Village/House" name="village_house"
                                            value="{{ $clientData->village_house }}">
                                        <label class="form-label" for="village_house">Village/House</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="ward"
                                            placeholder="ward" name="ward" value="{{ $clientData->ward }}">
                                        <label class="form-label" for="ward">Ward</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="district"
                                            placeholder="district" name="district" value="{{ $clientData->district }}">
                                        <label class="form-label" for="district">District</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="police_station"
                                            placeholder="Police Station" name="police_station"
                                            value="{{ $clientData->police_station }}">
                                        <label class="form-label" for="police_station">Police Station</label>
                                    </span>
                                </div>


                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="religion"
                                            placeholder="religion" name="religion" value="{{ $clientData->religion }}">
                                        <label class="form-label" for="religion">Religion</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="remarks"
                                            placeholder="remarks" name="remarks" value="{{ $clientData->remarks }}">
                                        <label class="form-label" for="remarks">Remarks</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg"
                                            id="emergency_person_contact_no" placeholder="Emergency Person Contact No"
                                            name="emergency_person_contact_no"
                                            value="{{ $clientData->emergency_person_contact_no }}">
                                        <label class="form-label" for="emergency_person_contact_no">Emergency Person
                                            Contact No</label>
                                    </span>
                                </div>

                                {{-- end --}}


                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="musaned_number"
                                            placeholder="Musaned Number" name="musaned_number"
                                            value="{{ $clientData->musaned_number }}">
                                        <label class="form-label" for="musaned_number">Musaned#</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="musaned_date"
                                            placeholder="Musaned Date" name="musaned_date"
                                            value="{{ $clientData->musaned_date }}">
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
                                            <option value="">Select One</option>
                                            <option value="EXP" @if ($clientData->exp_tc == 'EXP') selected @endif>EXP
                                            </option>
                                            <option value="TC" @if ($clientData->exp_tc == 'TC') selected @endif>TC
                                            </option>
                                        </select>
                                        <label class="form-label" for="exp_tc">EXP/TC</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="mofa"
                                            placeholder="MOFA" name="mofa" value="{{ $clientData->mofa }}">
                                        <label class="form-label" for="MOFA">MOFA#</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control" name="e_chek" id="e_chek">
                                            <option value="">Select One</option>
                                            <option value="NEGATIVE" @if ($clientData->e_chek == 'NEGATIVE') selected @endif>
                                                NEGATIVE</option>
                                            <option value="POSITIVE" @if ($clientData->e_chek == 'POSITIVE') selected @endif>
                                                POSITIVE</option>
                                            <option value="N/A" @if ($clientData->e_chek == 'N/A') selected @endif>N/A
                                            </option>
                                        </select>
                                        <label class="form-label" for="E-Chek">E-Chek</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control" name="client_gender" id="client_gender">
                                            <option value="">Select One</option>
                                            <option value="MALE" @if ($clientData->client_gender == 'MALE') selected @endif>MALE
                                            </option>
                                            <option value="FEMALE" @if ($clientData->client_gender == 'FEMALE') selected @endif>
                                                FEMALE
                                            </option>
                                            <option value="OTHERS" @if ($clientData->client_gender == 'OTHERS') selected @endif>
                                                OTHERS
                                            </option>
                                        </select>
                                        <label class="form-label" for="E-Chek">Client Gender</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="present_age"
                                            placeholder="Age" name="present_age" value="{{ $clientData->present_age }}"
                                            readonly>
                                        <label class="form-label" for="present_age">Present Age</label>
                                    </span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="formFile" name="image">
                                        <label class="form-label" for="formFile">Image</label>
                                    </span>
                                </div>

                                {{-- <div class="row mt-3">
                                    <div class="col-6">
                                        <label class="form-group float-label">
                                            <select class="form-control form-control-lg custom-select"
                                                name="transaction_type" id="opbalance">
                                                <option value="" disabled selected>
                                                    {{ __('Select Opening Balance') }}
                                                </option>
                                                @if ($clientData->client_transaction_type == 'advance')
                                                    <option value="advance" selected>Advance</option>
                                                    <option value="due">Due</option>
                                                @elseif ($clientData->client_transaction_type == 'due')
                                                    <option value="advance">Advance</option>
                                                    <option value="due" selected>Due</option>
                                                @endif


                                            </select>
                                            <span>Opening Balance</span>
                                        </label>
                                    </div>

                                    <div class="col-6" id="full_div">
                                        <span class="float-label">
                                            <input type="number" class="form-control form-control-lg" id="balance"
                                                name="client_opening_balance"
                                                value="{{ $clientData->client_opening_balance }}">
                                            <label class="form-label" for="emailInput">Balance</label>
                                        </span>
                                    </div>

                                </div> --}}



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
        $('#date_of_birth').change(function() {
            let dob = new Date($('#date_of_birth').val());
            let today = new Date();
            var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
            $('#present_age').val(age);
        });
        $("#add_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#add_form')[0]);
            let getuser_id = $("[name=client_id]").val();
            $('#loader').show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('clients') }}/" + $("[name=client_id]").val(),
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'client Updated Successful',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,

                    });
                    window.location.href = "{{ url('clients') }}/";
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
@endsection
