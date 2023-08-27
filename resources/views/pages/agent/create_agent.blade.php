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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('agents') }}">Agent</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Agent</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('agents') }}"><i class="fa fa-list me-2"></i>List Agent</a>
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
                            <h6 class="card-title mb-0">Create Agent</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="agent_form">
                                @csrf
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="agent_name"
                                            placeholder="Name" name="agent_name">
                                        <label class="form-label" for="TextInput">Name</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="agent_entry_id"
                                            placeholder="AgentEntry Id" name="agent_entry_id">
                                        <label class="form-label" for="TextInput">AgentEntry ID</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="agent_nid"
                                            placeholder="Nid" name="agent_nid">
                                        <label class="form-label" for="NidInput">Nid</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="formFile" name="agent_nid_front">
                                        <label class="form-label" for="formFile">Agent NID Front</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="formFile" name="agent_nid_back">
                                        <label class="form-label" for="formFile">Agent NID Back</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="date" id="formFile" name="agent_birthdate">
                                        <label class="form-label" for="formFile">Agent Birthday</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="agent_phone"
                                            placeholder="Phone" name="agent_phone">
                                        <label class="form-label" for="PhoneInput">Phone</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="email" class="form-control form-control-lg" id="agent_email"
                                            placeholder="Email" name="agent_email">
                                        <label class="form-label" for="emailInput">Email</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="agent_address"
                                            placeholder="Address" name="agent_address">
                                        <label class="form-label" for="AddressInput">Address</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="formFile" name="image">
                                        <label class="form-label" for="formFile">Agent Image</label>
                                    </span>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label class="form-group float-label">
                                            <select class="form-control form-control-lg custom-select"
                                                name="transaction_type" id="opbalance">
                                                <option value="" disabled selected>
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
                                                name="agent_opening_balance">
                                            <label class="form-label" for="emailInput">Balance</label>
                                        </span>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-6" id="select_account">
                                            <label class="form-group float-label">
                                                <select class="form-control form-control-lg custom-select"
                                                    name="accounts">
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
        $('#agent_name').keyup(function() {
            // let rand = $('#agent_name').val();
            let rand = 'agent';
            let x = Math.floor((Math.random() * 100000) + 1);

            $('#agent_entry_id').val(rand + '-' + x);

        });


        let balance = $('#full_div').hide();
        let select_account = $('#select_account').hide();

        let selectaccount = $('#selectaccount').hide();

        $('#opbalance').change(function() {

            let balance = $('#full_div').show();
            let selectaccount = $('#selectaccount').show();

            let selectedAccount = $(this).children("option:selected").val();



            if (selectedAccount == 'advance') {

                $('#select_account').show();

            } else {
                $('#select_account').hide();
            }






        });








        $("#agent_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#agent_form')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('agents') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Agent Created Successful',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,

                    })
                    $('#agent_form')[0].reset();
                    window.location.href = "{{ url('agents') }}";
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
    </script>
@endsection
