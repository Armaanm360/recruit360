@extends('master')
@section('content')
@inject('clientModel','App\Models\Clients\Client')
<!-- start: page toolbar -->
<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
    <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-secondary" href="crafted-page.html">Crafted pages</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                </ol>
            </div>
        </div> <!-- .row end -->
        <div class="row align-items-center">
            <div class="col-auto">
                <h1 class="fs-5 color-900 mt-1 mb-0">Welcome back, {{Auth::user()->name}}!</h1>
                <small class="text-muted">You have 12 new messages and 7 new notifications.</small>
            </div>
            <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
                <div class="p-2 me-md-3">
                    <div><span class="h6 mb-0">8.18K</span> <small class="text-secondary"><i class="fa fa-angle-up"></i>
                            1.3%</small></div>
                    <small class="text-muted text-uppercase">Income</small>
                </div>
                <div class="p-2 me-md-3">
                    <div><span class="h6 mb-0">1.11K</span> <small class="text-secondary"><i class="fa fa-angle-up"></i>
                            4.1%</small></div>
                    <small class="text-muted text-uppercase">Expense</small>
                </div>
                <div class="p-2 pe-lg-0">
                    <div><span class="h6 mb-0">3.66K</span> <small class="text-danger"><i class="fa fa-angle-down"></i>
                            7.5%</small></div>
                    <small class="text-muted text-uppercase">Revenue</small>
                </div>
            </div>
        </div> <!-- .row end -->
    </div>
</div>
<!-- start: page body -->
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="d-flex align-items-md-start align-items-center flex-column flex-md-row">
                            @if($client[0])
                            <img src="{{ asset('public/frontend/').$client[0]->client_picture }}" alt=""
                                class="rounded-4">
                            @else
                            <img src="{{ asset('public/frontend/') }}//assets/img/profile_av.png" alt=""
                                class="rounded-4">
                            @endif
                            <div class="media-body ms-md-5 m-0 mt-4 mt-md-0 text-md-start text-center">
                                <h4 class="mb-1 fw-light">{{$client[0]->client_name}}<a
                                        class="fa fa-pencil-square-o fs-6 ms-2"
                                        href="{{url("clients/".$client[0]->client_id."/edit")}}"
                                        title="Edit Profile"></a></h4>
                                <p>{{$client[0]->client_email}}</p>

                                <div
                                    class="d-flex flex-row flex-wrap align-items-center justify-content-center justify-content-md-start">
                                    <div class="card py-2 px-3 me-2 mt-2">
                                        <small class="text-muted">Balance</small>
                                        <div class="fs-5">TK.
                                            {{get_client_current_balance_by_client_id($client[0]->client_id)}}</div>
                                    </div>
                                    <div class="card py-2 px-3 me-2 mt-2">
                                        <small class="text-muted">Total Invoice</small>
                                        <div class="fs-5">
                                            {{$clientModel->total_invoice_of_client($client[0]->client_id)}}</div>
                                    </div>
                                    <div class="card py-2 px-3 me-2 mt-2">
                                        <small class="text-muted">Total Money Receipt</small>
                                        <div class="fs-5">
                                            {{$clientModel->total_money_receipt_of_client($client[0]->client_id)}}</div>
                                    </div>
                                    <div class="card py-2 px-3 me-2 mt-2">
                                        <small class="text-muted">Address</small>
                                        <div class="fs-5">{{$client[0]->client_address}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs tab-card border-bottom-0 pt-2 fs-6 justify-content-center justify-content-md-start"
                        role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#profile_post"
                                role="tab"><span>Overview</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#passport"
                                role="tab"><i class="fa fa-address-card-o"></i><span
                                    class="d-none d-sm-inline-block ms-2">Passport</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#visa"
                                role="tab"><i class="fa fa-list-alt"></i><span
                                    class="d-none d-sm-inline-block ms-2">Visa</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#manpower"
                                role="tab" id="tab_profile_campaigns"><i class="fa fa-area-chart"></i><span
                                    class="d-none d-md-inline-block ms-2">Manpower</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#medical"
                                role="tab"><i class="fa fa-font"></i><span class="d-none d-md-inline-block ms-2">Medical
                                    Test</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#policeclearance"
                                role="tab"><i class="fa fa-font"></i><span class="d-none d-md-inline-block ms-2">Police
                                    Clearence</span></a></li>
                    </ul>
                </div>
                <div class="tab-content mt-5">
                            <!-- Tab: Overview -->
                            <div class="tab-pane fade show active" id="profile_post" role="tabpanel">
                                <div class="row-title mb-2">
                                    <h5>Profile Overview</h5>
                                </div>
                                <div class="row g-3">
                                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h6 class="card-title mb-3">Personal Information</h6>
                                                <ul class="list-unstyled mb-0">
                                                    <li class="py-2"><span class="text-muted me-2 w90 d-inline-block">Full
                                                            Name:</span>{{$client[0]->client_name}}</li>
                                                    <li class="py-2"><span
                                                            class="text-muted me-2 w90 d-inline-block">E-mail:</span>{{$client[0]->client_email}}
                                                    </li>
                                                    <li class="py-2"><span
                                                            class="text-muted me-2 w90 d-inline-block">Phone:</span>{{$client[0]->client_phone}}
                                                    </li>
                                                    <li class="py-2"><span
                                                            class="text-muted me-2 w90 d-inline-block">Location:</span>{{$client[0]->client_address}}
                                                    </li>
                                                    <li class="py-2"><span
                                                            class="text-muted me-2 w90 d-inline-block">NID:</span>{{$client[0]->client_nid}}
                                                    </li>
                                                    <li class="py-2"><span class="text-muted me-2 w90 d-inline-block">Gender:
                                                        </span>{{$client[0]->client_gender}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h6 class="card-title mb-3">Last 5 Transaction</h6>
                                                <div class="d-flex justify-content-between">
                                                    <small class="text-uppercase">Amount :</small>
                                                    <small class="text-muted">Last Balance</small>
                                                </div>
                                                <br>
                                                @foreach($clientModel->get_last_five_transaction($client[0]->client_id) as $row)




                                                <div class="d-flex justify-content-between">
                                                    <small class="text-uppercase">{{$row->client_transaction_type}}
                                                        {{$row->client_transaction_amount}} :</small>
                                                    <small class="text-muted">


                                                        @if ($row->client_transaction_last_balance < 0) <span
                                                            class="text-danger">Due</span>

                                                            <span
                                                                class="text-danger font-weight-bold">{{ abs($row->client_transaction_last_balance) }}</span>
                                                            @elseif ($row->client_transaction_last_balance == 0)
                                                            <span class="text-info">Balance</span>

                                                            <span
                                                                class="text-dark">{{ $row->client_transaction_last_balance }}</span>
                                                            @else
                                                            <span class="text-success">Advance</span>

                                                            <span
                                                                class="text-dark">{{ $row->client_transaction_last_balance }}</span>
                                                            @endif

                                                    </small>
                                                </div>

                                                <div class="progress mt-1 mb-0" style="height: 3px;">
                                                    <div class="progress-bar chart-color5" role="progressbar" aria-valuenow="85"
                                                        aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-xl-8 col-lg-8 col-md-12">

                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h6 class="card-title mb-0">Latest Invoices</h6>
                                            </div>
                                            <ul class="list-group list-group-flush list-group-custom">
                                                <li class="list-group-item px-4"><a class="d-flex justify-content-between"
                                                        style="color:black;font-weight: bold">Invoice No <span>Invoice
                                                            Date</span><span>Invoice Net Total</span></a></li>
                                                @php
                                                $client_id = $client[0]->client_id;
                                                $client_invoices = $clientModel->get_last_five_invoice($client_id);
                                                @endphp
                                                @endphp
                                                @foreach($client_invoices as $row)
                                                <li class="list-group-item px-4"><a class="d-flex justify-content-between"
                                                        href="{{url("invoice/".$row->invoice_no)}}">{{$row->invoice_no}} <span
                                                            style="text-align: left">{{$row->invoice_sales_date}}</span>
                                                        <span>{{$row->invoice_net_total}}</span></a></li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h6 class="card-title mb-0">Last 5 Expense</h6>
                                            </div>
                                            <ul class="list-group list-group-flush list-group-custom">

                                                <li class="list-group-item px-4"><a class="d-flex justify-content-between"
                                                        style="color:black;font-weight: bold">Expense Sub Head<span>Expense
                                                            Date</span><span>Expense Amount</span></a></li>
                                                @foreach($clientModel->get_last_five_expense($client[0]->client_id) as $row)
                                                <li class="list-group-item px-4"><a class="d-flex justify-content-between"
                                                        href="{{url("expense/".$row->expense_id)}}">{{$row->expense_sub_head_name}}
                                                        <span style="text-align: left">{{$row->expense_date}}</span>
                                                        <span>{{$row->expense_amount}}</span></a></li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12">

                                        <div class="card mb-3">
                                            <!--                      <div class="card-body">
                                <h6 class="card-title mb-3">Average Agent Rating</h6>
                                <h3>4.4/<small class="fs-6">5</small></h3>
                                <button class="btn btn-sm btn-warning rounded-circle"><i class="fa fa-star"></i></button>
                                <button class="btn btn-sm btn-warning rounded-circle"><i class="fa fa-star"></i></button>
                                <button class="btn btn-sm btn-warning rounded-circle"><i class="fa fa-star"></i></button>
                                <button class="btn btn-sm btn-warning rounded-circle"><i class="fa fa-star"></i></button>
                                <button class="btn btn-sm btn-warning rounded-circle"><i class="fa fa-star-half-empty"></i></button>
                            </div>-->
                            </div>


                        </div>
                        </div> <!-- Row end  -->
                        </div>
              <!-- Tab: Groups -->
              <div class="tab-pane fade" id="passport" role="tabpanel">

                    @if ($passportData)
                    <div class="card">
                        <div class="card-body">
                          <h5 class="mb-1"><a href="app-project-detail.html" class="color-600">Passport Information</a></h5>
                          <ul class="list-inline d-flex my-4">
                            <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                              <h6 class="mb-1">Passport No.</h6>
                              <small class="text-muted">{{$passportData->passport_no}}</small>
                            </li>
                            <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                              <h6 class="mb-1">Passport Name.</h6>
                              <small class="text-muted">{{$passportData->passport_name}}</small>
                            </li>

                            <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                              <h6 class="mb-1">Mobile No.</h6>
                              <small class="text-muted">{{$passportData->mobile_number}}</small>
                            </li>
                            <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                              <h6 class="mb-1">Email</h6>
                              <small class="text-muted">{{$passportData->email}}</small>
                            </li>
                            <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                              <h6 class="mb-1">Birth Date</h6>
                              <small class="text-muted">{{$passportData->date_of_birth}}</small>
                            </li>


                          </ul>


                          <ul class="list-inline d-flex my-4">

                            <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                              <h6 class="mb-1">Issue Date</h6>
                              <small class="text-muted">{{$passportData->date_of_passport_issue}}</small>
                            </li>
                            <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                              <h6 class="mb-1">Expire Date</h6>
                              <small class="text-muted">{{$passportData->date_of_passport_expiry}}</small>
                            </li>
                            <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                              <h6 class="mb-1">Expire Duration</h6>
                              <small class="text-muted">{{$passportData->duration_left}}</small>
                            </li>
                            <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                              <h6 class="mb-1">Reference No.</h6>
                              <small class="text-muted">{{$passportData->passport_reference}}</small>
                            </li>
                            <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                              <h6 class="mb-1">Document</h6>
                              <small class="text-muted"><a target="__blank" href="{{url("/public/").$passportData->passport_document}}">Click Here</a></small>
                            </li>

                          </ul>
                      </div>
                    @endif

                    </div>
              </div>
              <!-- Tab: Project -->
              <div class="tab-pane fade" id="visa" role="tabpanel">

                    @if ($visaData)
                        <div class="card">
                            <div class="card-body">
                            <h5 class="mb-1"><a href="app-project-detail.html" class="color-600">VISA Information</a></h5>
                            <ul class="list-inline d-flex my-4">
                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Visa No.</h6>
                                <small class="text-muted">{{$visaData->visa_no}}</small>
                                </li>
                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Issue Date</h6>
                                <small class="text-muted">{{$visaData->visa_issue_date}}</small>
                                </li>

                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Job Type</h6>
                                <small class="text-muted">{{$visaData->visa_job_type}}</small>
                                </li>
                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Gender</h6>
                                <small class="text-muted">{{$visaData->visa_gender_type}}</small>
                                </li>


                            </ul>

                            </div>

                        </div>
                    @endif
               </div>
              <div class="tab-pane fade" id="manpower" role="tabpanel">

                    @if ($manpowerData)
                        <div class="card">
                            <div class="card-body">
                            <h5 class="mb-1"><a href="app-project-detail.html" class="color-600">Manpower Information</a></h5>
                            <ul class="list-inline d-flex my-4">
                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Office Name</h6>
                                <small class="text-muted">{{$manpowerData->office_name}}</small>
                                </li>
                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Office Address</h6>
                                <small class="text-muted">{{$manpowerData->office_address}}</small>
                                </li>

                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Job Type</h6>
                                <small class="text-muted">{{$manpowerData->job_type}}</small>
                                </li>
                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Comment</h6>
                                <small class="text-muted">{{$manpowerData->comment}}</small>
                                </li>
                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Processing Cost</h6>
                                <small class="text-muted">{{$manpowerData->processing_cost}}</small>
                                </li>


                            </ul>

                            </div>

                        </div>
                    @endif
            </div>
              <div class="tab-pane fade" id="medical" role="tabpanel">

                    @if ($MedicalTestFinalData)
                        <div class="card">
                            <div class="card-body">
                            <h5 class="mb-1"><a href="app-project-detail.html" class="color-600">Medical Information</a></h5>
                            <ul class="list-inline d-flex my-4">
                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Medical Name</h6>
                                <small class="text-muted">{{$MedicalTestFinalData->medical_name}}</small>
                                </li>
                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Medical Phone</h6>
                                <small class="text-muted">{{$MedicalTestFinalData->medical_phone}}</small>
                                </li>

                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Medical Office</h6>
                                <small class="text-muted">{{$MedicalTestFinalData->medical_cost_amount}}</small>
                                </li>
                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Medical Status</h6>
                                <small class="text-muted">{{$MedicalTestFinalData->final_medical_test_client_status}}</small>
                                </li>


                            </ul>

                            </div>

                        </div>
                    @endif
            </div>
              <div class="tab-pane fade" id="policeclearance" role="tabpanel">

                    @if ($PoliceClearenceData)
                        <div class="card">
                            <div class="card-body">
                            <h5 class="mb-1"><a href="app-project-detail.html" class="color-600">Police Clearance Information</a></h5>
                            <ul class="list-inline d-flex my-4">
                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                <h6 class="mb-1">Clearance Status</h6>
                                <small class="text-muted">{{$PoliceClearenceData->police_clearance_status}}</small>
                                </li>
                            </ul>

                            </div>

                        </div>
                    @endif
            </div>
      </div>
    </div>
    </div>
</div>
@endsection
