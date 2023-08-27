@extends('master')
@section('content')
    @inject('ClientInfo', 'App\Models\Clients\Client')
    @inject('jobName', 'App\Models\Configuration\jobType')
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('clients') }}">Client</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Client CV</li>
                    </ol>
                </div>
                <div class="col text-md-end">
                    <a class="btn btn-primary" href="{{ url('clients/create') }}"><i class="fa fa-list me-2"></i>Create
                        Client</a>
                    <a class="btn btn-secondary" href="{{ 'clients/create' }}"><i class="fa fa-user me-2"></i>Create
                        Client</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>View CV</h3>

                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-12">
                                <div class="card table-design">
                                    <div class="card-header">
                                        <h3 class="card-title m-0">Delegate Name : <span>M360ICT Recruitment Company</span></h3>
                                        <!-- widgest: Card more action icon -->
                                        <div class="dropdown morphing scale-left">
                                            <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i
                                                    class="icon-size-fullscreen"></i></a>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="table-responsive border-top">
                                                <table class="table card-table table-nowrap mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <img src="https://placehold.co/300x300" alt="">
                                                            </td>


                                                        </tr>



                                                    </tbody>
                                                </table>
                                                <table class="table card-table table-nowrap mb-0">
                                                    <h5 class="table-design-title">DETAILS OF APPLICANT</h5>
                                                    <tbody>
                                                        <tr>
                                                            <td>NATIONALITY</td>
                                                            <td>Bangladeshi</td>
                                                        </tr>
                                                        <tr>
                                                            <td>RELIGION</td>
                                                            <td>Islam</td>
                                                        </tr>
                                                        <tr>
                                                            <td>DATE OF BIRTH</td>
                                                            <td>15-10-1988</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLACE OF BIRTH</td>
                                                            <td>Dhaka</td>
                                                        </tr>
                                                        <tr>
                                                            <td>LIVING TOWN</td>
                                                            <td>Dhaka</td>
                                                        </tr>
                                                        <tr>
                                                            <td>CIVIL STATUS</td>
                                                            <td>Senior</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NO. OF CHILDREN</td>
                                                            <td>3</td>
                                                        </tr>
                                                        <tr>
                                                            <td>WEIGHT</td>
                                                            <td>70Kg</td>
                                                        </tr>
                                                        <tr>
                                                            <td>HEIGHT</td>
                                                            <td>5 Feet 8 inch</td>
                                                        </tr>
                                                        <tr>
                                                            <td>COMPLEXTION</td>
                                                            <td>Medium Black</td>
                                                        </tr>
                                                        <tr>
                                                            <td>AGE</td>
                                                            <td>30</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PHYSICAL FITNESS</td>
                                                            <td>Good</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Expected Salary</td>
                                                            <td>$ 10000</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p class="p-3" style="text-align:justify">I do hereby commit myself to work as good housemaid
                                                    in KSA after arrival without creating problems or
                                                    making troubles to my employer. I promise to be good
                                                    and in my duties as a house maid during my contract
                                                    period which is 2 years for jobs assigned to me by my
                                                    employer.
                                                    Truly I declare my details information’s to the following
                                                    CV. Please give me a chance for this job.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="table-responsive border-top">
                                                <table class="table card-table table-nowrap mb-0">
                                                    <tbody>
                                                        <tr>

                                                            <td>
                                                                <img src="https://placehold.co/300x300" alt="">
                                                            </td>

                                                        </tr>



                                                    </tbody>
                                                </table>
                                                <table class="table card-table table-nowrap mb-0">
                                                    <h5 class="table-design-title">DATE: 23-05-2023</h5>
                                                    <tbody>
                                                        <tr>
                                                            <td>REF:</td>
                                                            <td>Md.Shofikul Islam</td>
                                                        </tr>
                                                        <tr>
                                                            <td>MANUAL</td>
                                                            <td>Yes</td>
                                                        </tr>
                                                        <tr>
                                                            <td>JOB</td>
                                                            <td>Engineer</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NAME</td>
                                                            <td>Md.Shofikul Islam</td>
                                                        </tr>
                                                        <tr>
                                                            <td>FATHER’S NAME</td>
                                                            <td>Md.Talikder</td>
                                                        </tr>
                                                        <tr>
                                                            <td>MOTHER’S NAME</td>
                                                            <td>Mrs. Talukdar</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <table class="table card-table table-nowrap mb-0">
                                                    <h5 class="table-design-title">PASSPORT DETAILS</h5>
                                                    <tbody>
                                                        <tr>
                                                            <td>PASSPORT NUMBER</td>
                                                            <td>564545454454Mdfsff</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ISSUE DATE</td>
                                                            <td>15-09-2023</td>
                                                        </tr>
                                                        <tr>
                                                            <td>EXP.DATE</td>
                                                            <td>27-01-2050</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PLACE</td>
                                                            <td>Bangladesh</td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                                <table class="table card-table table-nowrap mb-0">
                                                    <h5 class="table-design-title">LANGUAGES</h5>
                                                    <tbody>
                                                        <tr>
                                                            <td class="fw-bold">SPEAKING</td>
                                                            <td class="fw-bold">FLUENCY</td>
                                                            <td class="fw-bold">WRITING</td>
                                                            <td class="fw-bold">FLUENCY</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ARABIC</td>
                                                            <td>Slow</td>
                                                            <td>ARABIC</td>
                                                            <td>Slow</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ENGLISH</td>
                                                            <td>Poor</td>
                                                            <td>ENGLISH</td>
                                                            <td>Poor</td>
                                                        </tr>
                                                        <tr>
                                                            <td>OTHERS</td>
                                                            <td>No</td>
                                                            <td>OTHERS</td>
                                                            <td>No</td>
                                                        </tr>


                                                    </tbody>

                                                </table>
                                                <table class="table card-table table-nowrap mb-0">

                                                    <h5 class="table-design-title">EDUCATIONAL QUALIFICATION</h5>
                                                    <tbody>
                                                        <tr>
                                                            <td>Last Educational Qualification</td>
                                                            <td>M.B.A</td>

                                                        </tr>



                                                    </tbody>
                                                </table>
                                                <table class="table card-table table-nowrap mb-0">

                                                    <h5 class="table-design-title">PLACE OF WORKED EXPERIENCE</h5>
                                                    <tbody>
                                                        <tr>
                                                            <td class="fw-bold">COUNTRY</td>
                                                            <td class="fw-bold">YEARS OF EXPERIENCE</td>

                                                        </tr>
                                                        <tr>
                                                            <td>OMAN</td>
                                                            <td>N/A</td>

                                                        </tr>
                                                        <tr>
                                                            <td>JORDAN</td>
                                                            <td>N/A</td>

                                                        </tr>
                                                        <tr>
                                                            <td>LEBANON</td>
                                                            <td>N/A</td>

                                                        </tr>
                                                        <tr>
                                                            <td>QATAR</td>
                                                            <td>N/A</td>

                                                        </tr>
                                                        <tr>
                                                            <td>K.S.A</td>
                                                            <td>N/A</td>

                                                        </tr>
                                                        <tr>
                                                            <td>U.A.E</td>
                                                            <td>N/A</td>

                                                        </tr>



                                                    </tbody>
                                                </table>
                                                <table class="table card-table table-nowrap mb-0">

                                                    <h5 class="table-design-title">SKILLS</h5>
                                                    <tbody>
                                                        <tr>
                                                            <td class="fw-bold">SKILLS</td>
                                                            <td class="fw-bold">STATUS</td>

                                                        </tr>
                                                        <tr>
                                                            <td>WASHING</td>
                                                            <td>YES</td>

                                                        </tr>
                                                        <tr>
                                                            <td>COOKING</td>
                                                            <td>NO</td>

                                                        </tr>
                                                        <tr>
                                                            <td>BABY SITTING</td>
                                                            <td>NO</td>

                                                        </tr>
                                                        <tr>
                                                            <td>CLEANING</td>
                                                            <td>YES</td>

                                                        </tr>




                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function deleteUser(params) {
            Swal.fire({
                title: 'Do You Want To Delete The Client?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let getuser_id = $("[name=id]").val();
                    $('#loader').show();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: "clients" + '/' + params,
                        cache: false,
                        success: function(data) {
                            window.location.href = "{{ url('clients') }}/";

                        }
                    }).done(function() {
                        $("#success_msg").html("Data Save Successfully");
                        //window.location.href = "{{ url('users') }}/";
                        Swal.fire('Client Has Been Deleted', '', 'success')
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
    </script>
@endsection
