@extends('master')
@section('content')
<style>
    thead input {
        width: 100%;
    }
</style>
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="javascript:void()">Passport Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Passport Status</li>
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
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Passport Number</th>
                                    <th>Client</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($passport as $passport)
                                @php
                                    $client_name = '';
                                    $status = '';
                                    $clientData = App\Models\Clients\Client::clientdetails($passport->passport_client_id);
                                    $statusData = App\Models\Configuration\status::data($passport->passport_status);
                                    if($clientData)
                                    {
                                        $client_name=  $clientData->client_name;
                                    }
                                    if($statusData)
                                    {
                                        $status=  $statusData->status;
                                    }
                                @endphp
                                    <tr>
                                        <td class="sorting_1">{{ $loop->index + 1 }}</td>
                                        <td>{{ $passport->passport_name }}</td>
                                        <td>{{ $passport->passport_no }}</td>
                                        <td>{{ $client_name }}</td>
                                        <td>
                                            @if($passport->passport_status_action == 0)
                                                <span style="color:red">Unknown</span>
                                            @endif
                                            @if($passport->passport_status_action == 1)
                                                <span style="color:green">{{$status}} | {{$passport->passport_status_date}} </span>
                                            @endif
                                        </td>
                                        <td class="dt-body-left">
                                            <a href="{{url('change/passport/status')}}/{{$passport->id}}" class="btn btn-sm btn-info"">Change Status</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

<script>
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).addClass('filters').appendTo( '#example thead' );
    var table = $('#example').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function() {
            var api = this.api();
            // For each column
            api.columns().eq(0).each(function(colIdx) {
                // Set the header cell to contain the input element
                var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                var title = $(cell).text();
                $(cell).html( '<input type="text" placeholder="'+title+'" />' );
                // On every keypress in this input
                $('input', $('.filters th').eq($(api.column(colIdx).header()).index()) )
                    .off('keyup change')
                    .on('keyup change', function (e) {
                        e.stopPropagation();
                        // Get the search value
                        $(this).attr('title', $(this).val());
                        var regexr = '({search})'; //$(this).parents('th').find('select').val();
                        var cursorPosition = this.selectionStart;
                        // Search the column for that value
                        api
                            .column(colIdx)
                            .search((this.value != "") ? regexr.replace('{search}', '((('+this.value+')))') : "", this.value != "", this.value == "")
                            .draw();
                        $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                    });
            });
        }
    } );
} );
</script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
@endsection


