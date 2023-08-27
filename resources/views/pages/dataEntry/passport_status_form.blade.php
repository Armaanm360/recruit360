@extends('master')
@section('content')
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="javascript:void()">Passport Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Passport Status Form</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ route('passport.create') }}"><i class="fa fa-list me-2"></i>Create
                        Passport</a>
                    {{-- <a class="btn btn-secondary" href="{{ 'agents/create' }}"><i class="fa fa-user me-2"></i>Create
                    Agent</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3 maskking-form" id="passport_form">
                            @csrf
                            <input type="hidden" name="passport_id" id="passport_id" value="{{ $passport->id }}">
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <span class="float-label">
                                    <select class="form-control" name="passport_status" id="passport_status">
                                        <option value="" disabled selected>Select One</option>
                                        @foreach ($passportstatus as $item)
                                            <option value="{{$item->id}}" @if($item->id ==$passport->passport_status) selected @endif>{{$item->status}}</option>
                                        @endforeach
                                    </select>
                                    <label class="form-label" for="client_id">Select Status</label>
                                </span>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <span class="float-label">
                                    <input type="date" class="form-control" name="passport_status_date" id="passport_status_date">
                                    <label class="form-label" for="agentID">Date</label>
                                </span>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            <div class="col-12">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("#passport_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#passport_form')[0]);
            let getpassport_id = $("[name=passport_id]").val();
            $('#loader').show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('passport/status/update') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    window.location.href = "{{ url('passport-status') }}";
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
    {{-- <script type="text/javascript">
        function deleteUser(params) {
            Swal.fire({
                title: 'Do You Want To Delete The Passport?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let getuser_id = $("[name=id]").val();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: 'passport/clear' + '/' + params,
                        success: function(data) {
                            window.location.href = "{{ url('passport') }}/";

                        }
                    }).done(function() {
                        $("#success_msg").html("Data Saved Successfully");
                        //window.location.href = "{{ url('users') }}/";
                        Swal.fire('Passport Has Been Deleted', '', 'success')
                    }).fail(function(data, textStatus, jqXHR) {
                        $('#loader').hide();
                        var json_data = JSON.parse(data.responseText);
                        $.each(json_data.errors, function(key, value) {
                            $("#" + key).after(
                                "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                                value +
                                "</span>");
                        });
                    });


                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }



        (document).on();
    </script> --}}
    {{-- <script>
        $('#getmodal').click(function() {

            let id = $(this).attr('passport_id');
            $.ajax({
                    type: "GET",
                    url : "{{ url('edit/passport/status') }}/" + id,
                    success: function(msg){
                        $('#passport_id').val(msg.id);
                    }
                });





});
    </script> --}}
@endsection
