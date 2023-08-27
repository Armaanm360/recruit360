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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('expense') }}">Refund</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Refund</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('refund') }}"><i class="fa fa-list me-2"></i>List Refunds</a>
                    {{-- <a class="btn btn-secondary" href="{{ 'agents/create' }}"><i class="fa fa-user me-2"></i>Create
    Agent</a> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- start: page body -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row g-2">
                <div class="col-12">
                    <div class="card overflow-hidden">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="32"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="23"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="13"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="7"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="card-body">
                            <div class="row g-3">
                                <form id="search_client_refund">
                                    @csrf
                                    <div class="col-12 fs-6">
                                        <div class="form-check form-check-inline">
                                            <span class="float-label">
                                                <input type="text" class="form-control form-control-lg" id="tags"
                                                    placeholder="Client">
                                                <input type="hidden" class="form-control form-control-lg"
                                                    id="hiddenClientId" placeholder="Client" name="client">
                                                <label class="form-label" for="NidInput">Client</label>
                                            </span>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <span class="float-label">
                                                <input type="text" class="form-control form-control-lg"
                                                    id="invoice_number" placeholder="Invoice Number">
                                                <input type="hidden" class="form-control form-control-lg"
                                                    id="hiddenClientId_invoice" placeholder="Client"
                                                    name="hiddenClientId_invoice">
                                                <label class="form-label" for="NidInput">Invoice Number</label>
                                            </span>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <button type="submit" class="btn btn-lg btn-primary">Confirm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Row end  -->
                        </div>
                    </div>
                </div>
                <div class="col-12" id="renderPurpose">

                </div>
            </div> <!-- Row end  -->
        </div>
        <!-- end form section -->

        <script type="text/javascript">
            // $('#select_type').change(function() {
            //     let select_type = $('#select_type').val();


            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         url: "{{ url('create-expense-render') }}/" + select_type,
            //         success: function(data, textStatus, jqXHR) {
            //             $('#renderPurpose').html(data);
            //         }
            //     }).done(function() {
            //         $("#success_msg").html("Data Save Successfully");
            //         // window.location.href = "{{ url('agents') }}";
            //         // location.reload();
            //     }).fail(function(data, textStatus, jqXHR) {
            //         var json_data = JSON.parse(data.responseText);
            //         $.each(json_data.errors, function(key, value) {
            //             $("#" + key).after(
            //                 "<span class='error_msg' style='color: red;font-weigh: 600'>" + value +
            //                 "</span>");
            //         });
            //     });





            // });

            $("#search_client_refund").submit(function(e) {
                e.preventDefault();

                let client = $('#hiddenClientId').val();
                let invoice = $('#hiddenClientId_invoice').val();
                $(".error_msg").html('');
                var data = new FormData($('#search_client_refund')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: "{{ url('refund-data-get') }}",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, textStatus, jqXHR) {


                        $('#renderPurpose').html(data);
                        // Swal.fire({
                        //     position: 'top-end',
                        //     icon: 'success',
                        //     title: 'Expense Created Successful',
                        //     showConfirmButton: false,
                        //     timer: 2000,
                        //     timerProgressBar: true,

                        // })
                        // $('#expense_form')[0].reset();
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


            // $('#expense_head').change(function() {
            //     let expense_head = $('#expense_head').val();


            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         url: "{{ url('expense-subhead') }}/" + expense_head,
            //         cache: false,
            //         success: function(data, textStatus, jqXHR) {
            //             $('#expense_sub_head').html(data);
            //             $('#expense_sub_head_name').val(data);
            //         }
            //     }).done(function() {
            //         $("#success_msg").html("Data Save Successfully");
            //         // window.location.href = "{{ url('agents') }}";
            //         // location.reload();
            //     }).fail(function(data, textStatus, jqXHR) {
            //         var json_data = JSON.parse(data.responseText);
            //         $.each(json_data.errors, function(key, value) {
            //             $("#" + key).after(
            //                 "<span class='error_msg' style='color: red;font-weigh: 600'>" + value +
            //                 "</span>");
            //         });
            //     });


            // });

            $(function() {

                $('#tags').autocomplete({
                    html: true,

                    source: function(request, response) {
                        $.ajax({
                            type: "GET",
                            url: "{{ url('search_clients') }}/",
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
                        $('#hiddenClientId').val(ui.item.value);
                        $('#hiddenClientId_invoice').val(ui.item.value);
                        return false;
                    },
                    minLength: 1,
                    open: function() {

                        $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                    },
                    close: function() {

                        if ($('#hiddenClientId').val() == '') {
                            $(this).val('');
                            $('#hiddenClientId').val('');
                        }
                        $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                    }
                });


                // $('#invoice_number').focus(function() {

                // });

                $('#invoice_number').autocomplete({
                    html: true,
                    source: function(request, response) {
                        let hiddenClientId = $('#hiddenClientId').val();
                        $.ajax({
                            type: "GET",
                            url: "{{ url('search_client_wise_invoice') }}/",
                            dataType: "json",
                            data: {
                                q: hiddenClientId,
                            },
                            success: function(data) {
                                response(data.content);
                            }
                        });
                    },
                    select: function(event, ui) {
                        $(this).val(ui.item.label);
                        $('#hiddenClientId_invoice').val(ui.item.value);
                        return false;
                    },
                    minLength: 1,
                    open: function() {

                        $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                    },
                    close: function() {

                        if ($('#hiddenClientId_invoice').val() == '') {
                            $(this).val('');
                            $('#hiddenClientId_invoice').val('');
                        }
                        $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                    }
                });
            });







            $(function() {




                // $('#invoice_number').autocomplete({
                //     html: true,

                //     source: function(request, response) {
                //         $.ajax({
                //             type: "GET",
                //             url: "{{ url('search_client_wise_invoice') }}/",
                //             dataType: "json",
                //             data: {
                //                 q: hiddenClientId_invoice,
                //             },
                //             success: function(data) {
                //                 response(data.content);
                //             }
                //         });
                //     },
                //     select: function(event, ui) {
                //         $(this).val(ui.item.label);
                //         $('#hiddenClientId_invoice').val(ui.item.value);
                //         return false;
                //     },
                //     minLength: 1,
                //     open: function() {

                //         $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                //     },
                //     close: function() {

                //         if ($('#hiddenClientId_invoice').val() == '') {
                //             $(this).val('');
                //             $('#hiddenClientId_invoice').val('');
                //         }
                //         $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                //     }
                // });
            });
        </script>
    @endsection
