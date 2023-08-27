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
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('expense') }}">Expense</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Expense</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('expense') }}"><i class="fa fa-list me-2"></i>List Expense</a>
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
                            <h6 class="card-title mb-0">Edit Expense</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 maskking-form" id="expense_form_edit">
                                @csrf
                                @method('PUT')
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        {{-- <input type="text" class="form-control form-control-lg" id="tags"
                                            placeholder="Client"> --}}
                                        <input type="text" class="form-control form-control-lg" id="hiddenClientId"
                                            placeholder="Client" name="client_name" value="{{ $expense->client_name }}">
                                        <input type="hidden" class="form-control form-control-lg" id="hiddenClientId"
                                            placeholder="Client" name="client_id" value="{{ $expense->client_id }}">
                                        <label class="form-label" for="client_id">Client Name</label>

                                        <input type="hidden" id="expense_id" name="expense_id"
                                            value="{{ $expense->expense_id }}">
                                    </span>
                                </div>
                                {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="form-group float-label">
                                        <select class="form-control form-control-lg custom-select" name="expense_head"
                                            id="expense_head">
                                            <option value="" disabled selected>
                                                {{ __('Select Expense Head') }}
                                            </option>

                                            @foreach ($head as $head)
                                                @if ($expense->expense_head_name == $head->head_name)
                                                    <option value="{{ $expense->expense_head_id }}" selected>
                                                        {{ $expense->expense_head_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $head->head_id }}">
                                                        {{ $head->head_name }}
                                                    </option>
                                                @endif
                                            @endforeach


                                        </select>
                                        <span>Expense Head</span>
                                    </label>
                                </div> --}}

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="form-group float-label">
                                        <select class="form-control form-control-lg custom-select" name="expense_purpose"
                                            id="expense_head">
                                            <option value="" disabled selected>
                                                {{ __('Select Expense Head') }}
                                            </option>

                                            @foreach ($subhead as $subhead)
                                                @if ($expense->expense_sub_head_name == $subhead->sub_head_name)
                                                    <option value="{{ $expense->expense_sub_head_id }}" selected>
                                                        {{ $expense->expense_sub_head_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $subhead->subhead_id }}">
                                                        {{ $subhead->sub_head_name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <span>Expense Purpose</span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="expense_amount"
                                            placeholder="Amount" name="expense_amount"
                                            value="{{ $expense->expense_amount }}">
                                        <label class="form-label" for="NidInput">Expense Amount</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <textarea name="expense_note" cols="10" rows="3" class="form-control form-control-lg" placeholder="Note">{{ $expense->expense_note }}</textarea>
                                        <label class="form-label" for="PhoneInput">Note</label>
                                    </span>
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
        $("#expense_form_edit").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#expense_form_edit')[0]);
            let getexpense_id = $("[name=expense_id]").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('expense') }}/" + getexpense_id,
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Expense Edited Successful',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,

                    })
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


        $('#expense_head').change(function() {
            let expense_head = $('#expense_head').val();


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('expense-subhead') }}/" + expense_head,
                cache: false,
                success: function(data, textStatus, jqXHR) {
                    $('#expense_sub_head').html(data);
                    $('#expense_sub_head_name').val(data);
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

        $(function() {
            $('#tags').autocomplete({
                html: true,
                source: function(request, response) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('search_clients') }}",
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
        });
    </script>
@endsection
