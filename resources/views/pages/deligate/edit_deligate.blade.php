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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('deligates') }}">Delegates</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Delegate</li>
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
                            <h6 class="card-title mb-0">Edit Delegate</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="add_form">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{$data->deligate_id}}" name="deligate_id">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="deligate_name"
                                            placeholder="Name" name="deligate_name" value="{{$data->deligate_name}}">
                                        <label class="form-label" for="TextInput">Name</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="deligate_entry_id"
                                            placeholder="Deligate Entry Id" name="deligate_entry_id" value="{{$data->deligate_entry_id}}" readonly>
                                        <label class="form-label" for="TextInput">Delegate Entry ID</label>
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
                                                    <option value="{{$country->id}}" @if ($country->id==$data->deligate_country_id) selected @endif>{{$country->name}}</option>
                                                @endforeach
                                        </select>
                                        <label class="form-label" for="deligate_country_id">Select Deligate Country</label>
                                        <input type="hidden" class="form-control form-control-lg" id="deligate_country_name"
                                            placeholder="Country" value="{{$data->deligate_country_name}}" name="deligate_country_name">
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="deligate_phone"
                                            placeholder="Phone" name="deligate_phone" value="{{$data->deligate_phone}}">
                                        <label class="form-label" for="deligate_phone">Phone</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="email" class="form-control form-control-lg" id="deligate_email"
                                            placeholder="Email" name="deligate_email" value="{{$data->deligate_email}}">
                                        <label class="form-label" for="deligate_email">Email</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="deligate_licence_no"
                                            placeholder="Address" name="deligate_licence_no" value="{{$data->deligate_licence_no}}">
                                        <label class="form-label" for="deligate_licence_no">License</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="deligate_licence_file" name="deligate_licence_file">
                                        <label class="form-label" for="deligate_licence_file">Delegate License File</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input class="form-control" type="file" id="deligate_picture" name="deligate_picture">
                                        <label class="form-label" for="deligate_picture">Delegate Image</label>
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
                                                <option value="advance"  @if ($data->deligate_transaction_type=="advance") selected @endif>Advance</option>
                                                <option value="due" @if ($data->deligate_transaction_type=="due") selected @endif>Due</option>
                                            </select>
                                            <span>Opening Balance</span>
                                        </label>
                                    </div>

                                    <div class="col-6" id="full_div">
                                        <span class="float-label">
                                            <input type="number" class="form-control form-control-lg" id="balance"
                                                name="deligate_transaction_opening_balance" value="{{$data->deligate_transaction_opening_balance}}">
                                            <label class="form-label" for="emailInput">Balance</label>
                                        </span>
                                    </div>

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
        $("#add_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#add_form')[0]);
            let getuser_id = $("[name=deligate_id]").val();
            $('#loader').show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('deligates') }}/" + $("[name=deligate_id]").val(),
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Delegate Updated Successful',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,

                    })
                }
            }).done(function() {
                $("#success_msg").html("Data Saved Successfully");
                window.location.href = "{{ url('deligates') }}/";
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
