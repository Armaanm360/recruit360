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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('sponser') }}">Sponsor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Sponsor</li>
                    </ol>
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
                            <h6 class="card-title mb-0">Edit Sponsor</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="add_form">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="sponsor_id" value="{{$data->sponsor_id}}" >
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="sponsor_name"
                                            placeholder="Name" name="sponsor_name" value="{{$data->sponsor_name}}">
                                        <label class="form-label" for="TextInput">Name</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="sponsor_entry_id"
                                            placeholder="sponsor Entry Id" name="sponsor_entry_id" value="{{$data->sponsor_entry_id}}" readonly>
                                        <label class="form-label" for="TextInput">sponsor Entry ID</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <select class="form-control form-control-lg custom-select"
                                                name="sponsor_country_id" id="sponsor_country_id">
                                                <option value="" disabled selected>
                                                    {{ __('Select Country') }}
                                                </option>
                                                @foreach ($country as $country)
                                                    <option value="{{$country->id}}" @if ($country->id==$data->sponsor_country_id) selected @endif>{{$country->name}}</option>
                                                @endforeach
                                        </select>
                                        <label class="form-label" for="sponsor_country_id">Select sponsor Country</label>
                                        <input type="hidden" class="form-control form-control-lg" id="sponsor_country_name"
                                            placeholder="Country" value="{{$data->sponsor_country_name}}" name="sponsor_country_name">
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="sponsor_phone"
                                            placeholder="Phone" name="sponsor_phone" value="{{$data->sponsor_phone}}">
                                        <label class="form-label" for="sponsor_phone">Phone</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="email" class="form-control form-control-lg" id="sponsor_email"
                                            placeholder="Email" name="sponsor_email" value="{{$data->sponsor_email}}">
                                        <label class="form-label" for="sponsor_email">Email</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="sponsor_licence_no"
                                            placeholder="Address" name="sponsor_licence_no" value="{{$data->sponsor_licence_no}}">
                                        <label class="form-label" for="sponsor_licence_no">License</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="sponsor_licence_file" name="sponsor_licence_file">
                                        <label class="form-label" for="sponsor_licence_file">sponsor License File</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="sponsor_picture" name="sponsor_picture">
                                        <label class="form-label" for="sponsor_picture">sponsor Image</label>
                                    </span>
                                </div>

                                {{-- <div class="row mt-3">
                                    <div class="col-6">
                                        <label class="form-group float-label">
                                            <select class="form-control form-control-lg custom-select"
                                                name="sponsor_transaction_type" id="opbalance">
                                                <option value="" disabled selected>
                                                    {{ __('Select Opening Balance') }}
                                                </option>
                                                <option value="advance"  @if ($data->sponsor_transaction_type=="advance") selected @endif>Advance</option>
                                                <option value="due" @if ($data->sponsor_transaction_type=="due") selected @endif>Due</option>
                                            </select>
                                            <span>Opening Balance</span>
                                        </label>
                                    </div>

                                    <div class="col-6" id="full_div">
                                        <span class="float-label">
                                            <input type="number" class="form-control form-control-lg" id="balance"
                                                name="sponsor_transaction_opening_balance" @if($payments->sponsor_ledger_dr) value="{{$payments->sponsor_ledger_dr}}" @endif>
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
        $("#add_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#add_form')[0]);
            let getuser_id = $("[name=sponsor_id]").val();
            $('#loader').show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('sponser') }}/" + $("[name=sponsor_id]").val(),
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'sponsor Updated Successful',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,

                    })
                }
            }).done(function() {
                $("#success_msg").html("Data Saved Successfully");
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

        $('#sponsor_country_id').change(function() {

$var = $( "#sponsor_country_id option:selected" ).text();

$('#sponsor_country_name').val($var);

 });
    </script>
@endsection
