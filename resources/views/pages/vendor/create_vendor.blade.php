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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('vendors') }}">Vendor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Vendor</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('vendors') }}"><i class="fa fa-list me-2"></i>List of Vendor</a>
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
                            <h6 class="card-title mb-0">Create Vendor</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="vendor_form">
                                @csrf
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="vendor_name"
                                            placeholder="Name" name="vendor_name">
                                        <label class="form-label" for="TextInput">Vendor Name</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="vendor_entry_id"
                                            placeholder="Vendor Entry Id" name="vendor_entry_id">
                                        <label class="form-label" for="TextInput">Vendor Entry ID</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="vendor_company_name"
                                            placeholder="Vendor Entry Id" name="vendor_company_name" readonly>
                                        <label class="form-label" for="TextInput">Vendor Company</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="vendor_nid"
                                            placeholder="Vendor NID" name="vendor_nid">
                                        <label class="form-label" for="NidInput">Nid</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="vendor_phone"
                                            placeholder="Phone" name="vendor_phone">
                                        <label class="form-label" for="PhoneInput">Phone</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="email" class="form-control form-control-lg" id="vendor_email"
                                            placeholder="Email" name="vendor_email">
                                        <label class="form-label" for="emailInput">Email</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="vendor_address"
                                            placeholder="Address" name="vendor_address">
                                        <label class="form-label" for="AddressInput">Address</label>
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
        $('#vendor_name').keyup(function() {
            let rand = $('#vendor_name').val();
            let x = Math.floor((Math.random() * 100000) + 1);

            $('#vendor_entry_id').val(rand + x);

        });



        $("#vendor_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#vendor_form')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('vendors') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Vendor Created Successful',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,

                    })
                    $('#vendor_form')[0].reset();
                    $('#full_div').hide();
                    $('#select_account').hide();
                    window.location.href = "{{ url('vendors') }}";
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
