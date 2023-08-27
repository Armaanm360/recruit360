@extends('master')
@section('content')
<!-- Form section -->
<!-- start: page toolbar -->
<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
    <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{url('/dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{url('/visa')}}">Medical</a></li>
                    <li class="breadcrumb-item active">Create Medical</li>
                </ol>
            </div>
        </div> <!-- .row end -->
        <div class="row align-items-center">
            <div class="col">
                <h1 class="fs-5 color-900 mt-1 mb-0">Create Medical !</h1>
                <small class="text-muted">
                    <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                </small>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0 text-md-end">
                <a class="btn btn-primary" href="{{url('medical')}}"><i class="fa fa-list me-2"></i>Medical List</a>
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
                        <h4>Medical Information</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 maskking-form" id="medicalForm">
                            @csrf
                            <div class="col-6">
                                <span class="float-label">
                                    <input type="text" class="form-control form-control-lg" id="medical_name"
                                        placeholder="Name" name="medical_name">
                                    <label class="form-label" for="TextInput">Name</label>
                                </span>
                            </div>
                            <div class="col-6">
                                <span class="float-label">
                                    <input type="number" class="form-control form-control-lg" id="medical_phone"
                                        placeholder="Phone" name="medical_phone">
                                    <label class="form-label" for="numberInput">Phone</label>
                                </span>
                            </div>
                            <div class="col-6">
                                <span class="float-label">
                                    <input type="number" class="form-control form-control-lg" id="medical_cost_amount"
                                        placeholder="Amount" name="medical_cost_amount">
                                    <label class="form-label" for="textInput">Amount</label>
                                </span>
                            </div>
                            <div class="col-6">
                                <span class="float-label">
                                    <input type="text" class="form-control form-control-lg" id="medical_remarks"
                                        placeholder="Remarks" name="medical_remarks">
                                    <label class="form-label" for="TextInput">Remarks</label>
                                </span>
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

<script type="text/javascript">
    // $('#agentname').keyup(function() {
    //  let rand = $('#agentname').val();
    //  let x = Math.floor((Math.random() * 100000) + 1);

    //  $('#agent_entry_id').val(rand + x);

    // });

    $("#medicalForm").submit(function (e) {
        e.preventDefault();
        $(".error_msg").html('');
        var data = new FormData($('#medicalForm')[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "{{ url('medical') }}",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Medical has been created successfully.',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                })
                window.location.href = "{{ url('medical') }}";
            }
        }).done(function () {
            $("#success_msg").html("Data Save Successfully");
            // window.location.href = "{{ url('agents') }}";
            // location.reload();
        }).fail(function (data, textStatus, jqXHR) {
            $("#loader").hide();
            var json_data = JSON.parse(data.responseText);
            $.each(json_data.errors, function (key, value) {
                $("#" + key).after(
                    "<span class='error_msg' style='color: red;font-weigh: 600'>" + value +
                    "</span>");
            });
        });
    });

</script>
@endsection
