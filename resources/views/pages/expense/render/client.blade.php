                            <form class="row g-3 maskking-form" id="expense_form">
                                @csrf
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="tags"
                                            placeholder="Client">
                                        <input type="hidden" class="form-control form-control-lg" id="hiddenClientId"
                                            placeholder="Client" name="client">
                                        <label class="form-label" for="client_id">Client Name</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="form-group float-label">
                                        <select class="form-control form-control-lg custom-select"
                                            name="expense_purpose" id="expense_head">
                                            <option value="" disabled selected>
                                                {{ __('Select Expense Head') }}
                                            </option>
                                            @foreach ($subhead as $subhead)
                                                <option value="{{ $subhead->subhead_id }}">{{ $subhead->sub_head_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span>Expense Purpose</span>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="expense_amount"
                                            placeholder="Amount" name="expense_amount">
                                        <label class="form-label" for="NidInput">Expense Amount</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <textarea name="expense_note" cols="10" rows="3" class="form-control form-control-lg" placeholder="Note"></textarea>
                                        <label class="form-label" for="PhoneInput">Note</label>
                                    </span>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>


                            <script>
                                $("#expense_form").submit(function(e) {
                                    e.preventDefault();
                                    $(".error_msg").html('');
                                    var data = new FormData($('#expense_form')[0]);
                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        method: "POST",
                                        url: "{{ url('expense') }}",
                                        data: data,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data, textStatus, jqXHR) {
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'success',
                                                title: 'Expense Created Successful',
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
