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
                        <li class="breadcrumb-item"><a class="text-secondary" href="javascript:void()">Deligates</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Deligate</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('deligates') }}"><i class="fa fa-list me-2"></i>List Deligates</a>
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
                            <h6 class="card-title mb-0">Create Deligate</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="deligate_form">
                                @csrf
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="deligate_name"
                                            placeholder="Name" name="deligate_name">
                                        <label class="form-label" for="TextInput">Name</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="deligate_entry_id"
                                            placeholder="Deligate Entry Id" name="deligate_entry_id">
                                        <label class="form-label" for="TextInput">Deligate Entry ID</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control form-control-lg custom-select"
                                                name="deligate_country_id" id="deligate_country_id">
                                                <option value="" disabled selected>
                                                    {{ __('Select Country') }}
                                                </option>
                                                @foreach ($country as $country)
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                        </select>
                                        <label class="form-label" for="deligate_country_id">Select Deligate Country</label>
                                        <input type="hidden" class="form-control form-control-lg" id="deligate_country_name"
                                            placeholder="Country" name="deligate_country_name">
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="deligate_phone"
                                            placeholder="Phone" name="deligate_phone">
                                        <label class="form-label" for="deligate_phone">Phone</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="email" class="form-control form-control-lg" id="deligate_email"
                                            placeholder="Email" name="deligate_email">
                                        <label class="form-label" for="deligate_email">Email</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="deligate_licence_no"
                                            placeholder="Address" name="deligate_licence_no">
                                        <label class="form-label" for="deligate_licence_no">License</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="filecheck" name="deligate_licence_file" accept=".pdf,.xlx,.csv,.jpg,.png,.jpeg">
                                        <label class="form-label" for="deligate_licence_file">Deligate License File</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="filecheck" name="deligate_picture" accept=".jpg,.png,.jpeg">
                                        <label class="form-label" for="deligate_picture">Deligate Image</label>
                                    </span>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label class="form-group float-label">
                                            <select class="form-control form-control-lg custom-select"
                                                name="deligate_transaction_type" id="opbalance">
                                                <option value="" disabled selected>
                                                    {{ __('Select Opening Balance') }}
                                                </option>
                                                <option value="credit">Advance</option>
                                                <option value="debit">Due</option>
                                            </select>
                                            <span>Opening Balance</span>
                                        </label>
                                    </div>

                                    <div class="col-6" id="full_div">
                                        <span class="float-label">
                                            <input type="number" class="form-control form-control-lg" id="balance"
                                                name="deligate_transaction_opening_balance">
                                            <label class="form-label" for="emailInput">Balance</label>
                                        </span>
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
        $('#deligate_name').keyup(function() {
            let rand = $('#deligate_name').val();
            let x = Math.floor((Math.random() * 100000) + 1);

            $('#deligate_entry_id').val(rand + x);

        });

        $('#deligate_country_id').change(function() {

           $var = $( "#deligate_country_id option:selected" ).text();

           $('#deligate_country_name').val($var);

            });


        let balance = $('#full_div').hide();
        let selectaccount = $('#selectaccount').hide();

        $('#opbalance').change(function() {

            let balance = $('#full_div').show();
            let selectaccount = $('#selectaccount').show();

        });

        $("#deligate_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#deligate_form')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('deligates') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Deligate Data Saved Successfully',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,

                    })
                }
            }).done(function() {
                $("#success_msg").html("Data Saved Successfully");
                window.location.href = "{{ url('deligates') }}";
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

        var uploadField = document.getElementById("filecheck");

            uploadField.onchange = function() {
                if(this.files[0].size > 2097152){
                alert("File is too big!");
                this.value = "";
                };
            };
    </script>

@endsection
