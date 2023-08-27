@extends('master')
@section('content')
    {{-- @inject('clientModel','App\Models\Clients\Client') --}}
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="crafted-page.html">Saudi Visa Form</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Saudi Visa Form</li>
                    </ol>
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
                                @if ($client->client_picture != null)
                                    <img src="{{ asset('/public/' . $client->client_picture) }}" alt="" width="240"
                                        height="300px" class="rounded-4">
                                @else
                                    <img src="{{ asset('public/frontend/') }}//assets/img/profile_av.png" alt=""
                                        class="rounded-4">
                                @endif
                                <div class="media-body ms-md-5 m-0 mt-4 mt-md-0 text-md-start text-center">
                                    <h4 class="mb-1 fw-light">{{ $client->client_name }}</h4>
                                    <p>{{ $client->client_email }}</p>
                                </div>
                            </div>
                            <div
                                class="d-flex flex-row flex-wrap align-items-center justify-content-center justify-content-md-start">
                                <div class="card py-2 px-3 me-2 mt-2">
                                    <small class="text-muted">Address</small>
                                    <div class="fs-5">{{ $client->client_address }}</div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs tab-card border-bottom-0 pt-2 fs-6 justify-content-center justify-content-md-start"
                            role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#profile_post"
                                    role="tab"><span>Overview</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#first" role="tab"><i
                                        class="fa fa-address-card-o"></i><span class="d-none d-sm-inline-block ms-2">First
                                        Form</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#second" role="tab"><i
                                        class="fa fa-address-card-o"></i><span class="d-none d-sm-inline-block ms-2">Second
                                        Form</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#third" role="tab"><i
                                        class="fa fa-address-card-o"></i><span class="d-none d-sm-inline-block ms-2">Third
                                        Form</span></a></li>

                        </ul>
                    </div>
                    <div class="tab-content mt-5">
                        <!-- Tab: Overview -->
                        <div class="tab-pane fade show active" id="profile_post" role="tabpanel">
                            <div class="row-title mb-2">
                                <h5>Profile Overview</h5>
                            </div>
                            <div class="row g-3">
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h6 class="card-title mb-3">Personal Information</h6>

                                            <ul class="list-unstyled mb-0">
                                                <li class="py-2"><span class="text-muted me-2 w90 d-inline-block">Full
                                                        Name:</span>{{ $client->client_name }}</li>
                                                <li class="py-2"><span
                                                        class="text-muted me-2 w90 d-inline-block">E-mail:</span>{{ $client->client_email }}
                                                </li>
                                                <li class="py-2"><span
                                                        class="text-muted me-2 w90 d-inline-block">Phone:</span>{{ $client->client_phone }}
                                                </li>
                                                <li class="py-2"><span
                                                        class="text-muted me-2 w90 d-inline-block">Location:</span>{{ $client->client_address }}
                                                </li>
                                                <li class="py-2"><span
                                                        class="text-muted me-2 w90 d-inline-block">NID:</span>{{ $client->client_nid }}
                                                </li>
                                                <li class="py-2"><span class="text-muted me-2 w90 d-inline-block">Gender:
                                                    </span>{{ $client->client_gender }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- Row end  -->
                        </div>
                        <!-- Tab: Groups -->
                        <div class="tab-pane fade" id="first" role="tabpanel">

                            {{-- @if ($passportData) --}}
                            <div class="card">
                                <div class="card-body">
                                    <script>
                                        function printDiv() {
                                            var printContents = document.getElementById('GFG').innerHTML;
                                            var originalContents = document.body.innerHTML;

                                            document.body.innerHTML = printContents;

                                            window.print();

                                            // document.body.innerHTML = originalContents;
                                        }
                                    </script>
                                    <input type="button" value="click" onclick="printDiv('GFG')">
                                    <div class="container" id="GFG">
                                        <table style="width:100%">
                                            <tr>
                                                <th width="25%">
                                                    <img src="{{ asset('/public/' . $client->client_picture) }}"
                                                        alt="" width="240" height="300px" class="rounded-4">
                                                </th>
                                                <th width="20%">
                                                    <img src="img.jpg" alt=""> <br>
                                                </th>
                                                <th width="30%" colspan="3">
                                                    Visa Number:
                                                    @if ($visaData)
                                                        {{ $visaData->visa_no }}
                                                    @endif
                                                    <br>

                                                    @if ($visaData)
                                                        {{-- {!!DNS1D::getBarcodeHTML("$visaData->visa_no",'UPCA')!!} --}}
                                                    @endif
                                                    Visa Date:
                                                    @if ($visaData)
                                                        {{ $visaData->visa_issue_date }}
                                                    @endif

                                                </th>
                                                <th width="25%" align="right">
                                                    @if ($client_extra)
                                                        {{-- {!!DNS1D::getBarcodeHTML("$client_extra->mofa_number",'UPCA')!!} --}}

                                                        <br>

                                                        Mufa Number: {{ $client_extra->mofa_number }}
                                                        <br>
                                                    @endif
                                                    <br>

                                                    الي
                                                    سفارة المملكة العربية السعودية
                                                    القسم القنصلي
                                                    <br>
                                                    EMBASSY OF SAUDI ARABIAN
                                                    CONSULAR SECTION
                                                </th>
                                            </tr>
                                            <tr>
                                                <td width="16%">Full Name:</td>
                                                <td align="center" colspan="4" width="68%">
                                                    {{ $client->client_name }} S/O {{ $client->father_name }}</td>
                                                <td width="16%" align="right">:اسم الكامل</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="16%">Mother's Name:</td>
                                                <td align="center" colspan="4" width="68%">
                                                    {{ $client->mother_name }}</td>
                                                <td width="16%" align="right">:اسم الام</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth:</td>
                                                <td>{{ $client->client_date_of_birth }}</td>
                                                <td>: تاريخ الولادة </td>
                                                <td>Place of Birth:</td>
                                                <td>&nbsp;</td>
                                                <td>: محل الولادة</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Previous Nationality:</td>
                                                <td>&nbsp;</td>
                                                <td>: الجنسية السابقة</td>
                                                <td>Present Nationality:</td>
                                                <td>&nbsp;</td>
                                                <td>: الجنسية الحالية</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sex:</td>
                                                <td>{{ $client->client_gender }}</td>
                                                <td>: الجنس</td>
                                                <td>Marital Status:</td>
                                                <td>{{ $client->martial_status }}</td>
                                                <td>: الحالة الاجتماعية</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sect:</td>
                                                <td>&nbsp;</td>
                                                <td>: المذهب</td>
                                                <td>Religion:</td>
                                                <td>{{ $client->religion }}</td>
                                                <td>: الديانة</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Place of Issue:</td>
                                                <td>&nbsp;</td>
                                                <td colspan="2" align="right">Profession:</td>
                                                <td>&nbsp;</td>
                                                <td align="right">: المهنة</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Home Address and Telephone Number:</td>
                                                <td colspan="4">
                                                    {{ $client->client_address }} <br>
                                                    {{ $client->client_phone }}
                                                </td>
                                                <td>:عنوان المنزل ورقم التلفون</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Business Address and Telephone Number:</td>
                                                <td colspan="4">&nbsp;</td>
                                                <td>: Jعنوان الشركة (المؤسسة)رقم التلفون</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Purpose of Travel:</td>
                                                <td colspan="4" align="center">
                                                    Work/عمل
                                                    &nbsp;
                                                    &nbsp;
                                                    مرور/Transit
                                                    &nbsp;
                                                    &nbsp;
                                                    زيارة/Visit
                                                    &nbsp;
                                                    &nbsp;
                                                    عمرة/Umrah
                                                    &nbsp;
                                                    &nbsp;
                                                    للاقامة/Residence
                                                    &nbsp;
                                                    &nbsp;
                                                    حج/Hajj
                                                    &nbsp;
                                                    &nbsp;
                                                    دبلوماسية/Diplomacy
                                                    &nbsp;
                                                    &nbsp;

                                                </td>
                                                <td>: الغابة من السفر</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Profession:</td>
                                                <td colspan="4">&nbsp;</td>
                                                <td>Profession:</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    Place of Issue/ محل الاصدار:
                                                    <br>
                                                    <br>
                                                    &nbsp;
                                                </td>
                                                <td colspan="2">
                                                    Date of passport issue تاريخ الاصدار
                                                    <br>
                                                    <br>
                                                    @if ($passportData)
                                                        {{ $passportData->date_of_passport_issue }}
                                                    @endif
                                                </td>
                                                <td colspan="2">
                                                    Date of Expiry تاريخ انتهاء صلاحية الجواز
                                                    <br>
                                                    <br>
                                                    @if ($passportData)
                                                        {{ $passportData->date_of_passport_expiry }}
                                                    @endif
                                                </td>
                                                <td>
                                                    Passport No. رقم الجواز
                                                    <br>
                                                    <br>
                                                    @if ($passportData)
                                                        {{ $passportData->passport_no }}
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Duration of Stay in the Kingdom: &nbsp;</td>
                                                <td>: مدة الاقامة بالمملكة</td>
                                                <td>Date of arrival: &nbsp;</td>
                                                <td>: تاريخ الوصول </td>
                                                <td>Date of departure: &nbsp;</td>
                                                <td>: تاريخ المغادرة </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mode of payment/ تاريخ : </td>
                                                <td colspan="5" align="center">
                                                    Free/ ايصال رقم () :
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    Cash/ تاريخ :
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    Cheque No/ بشيك رقم () :
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    Date/ نقدم () :
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    No/ مجانا () :
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    Date/ طريقة الدفع () :
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Destination:</td>
                                                <td>&nbsp;</td>
                                                <td>جهة الوصول بالم</td>
                                                <td>Carrier`s:</td>
                                                <td>&nbsp;</td>
                                                <td>اسم الشركة النافلة:</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Duration of Stay in the Kingdom:</td>
                                                <td>&nbsp;</td>
                                                <td>Date of Arrival:</td>
                                                <td>&nbsp;</td>
                                                <td>Date of Departure:</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mode of Payment:</td>
                                                <td>()Free &nbsp;()Cash &nbsp; ()Check No &nbsp;</td>
                                                <td>Date:</td>
                                                <td>()</td>
                                                <td>No:</td>
                                                <td>Date:</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Destination:</td>
                                                <td>&nbsp;</td>
                                                <td>: جهة الوصول بالم</td>
                                                <td>Carrier's Name:</td>
                                                <td>&nbsp;</td>
                                                <td>: اسم الشركة النافلة</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Dependents travelling in the same passport:</td>
                                                <td colspan="4">&nbsp;</td>
                                                <td>: ايضاحات تخص افراد العائلة ( المضافين) علي نفس جواز السفر</td>
                                            </tr>
                                        </table>
                                        <table width="100%" border="1px">
                                            <tr>
                                                <th>نوع الصلة</th>
                                                <th>تاريخ الميلاد</th>
                                                <th>الجنس</th>
                                                <th>الاسم بالكامل</th>
                                            </tr>
                                            <tr>
                                                <th>Relationship</th>
                                                <th>Date of Birth</th>
                                                <th>Sex</th>
                                                <th>Full Name</th>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                        <table width="100%">

                                            <tr>
                                                <td colspan="6"> &nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td>Name and Address of Company or individual in the Kingdom:</td>
                                                <td colspan="4">&nbsp;</td>
                                                <td>: اسم و عنوان الشركة أو اسم الشخص و عنوانه بالمملكة</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"> &nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">The undersigned hereby certified that all the
                                                    information I have provided are <br> correct. I will abide by the laws
                                                    of the Kingdom during the period of my <br> residence in it.</td>
                                                <td colspan="3" align="right">أنا الموقع أدناه أقربان كل المعلومات
                                                    التي درنتها صحيحة <br>
                                                    و ساكون ملنزما بقرانين المملكة اثناء فترة وجودي به.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"> &nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td>Date: &nbsp; </td>
                                                <td align="right">: التاريخ</td>
                                                <td>Signature: &nbsp;</td>
                                                <td align="right">: التوقيع</td>
                                                <td>Name: {{ $client->client_name }}</td>
                                                <td align="right">: الاسم</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"> &nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"> <u>For Official Use only:</u> </td>
                                                <td colspan="3" align="right">
                                                    <u>للاستعمال الرسمي فقط:</u>
                                                    <br>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"> &nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td>Date: &nbsp;</td>
                                                <td>: التاريخ </td>
                                                <td>Authorization:</td>
                                                <td colspan="2">&nbsp;</td>
                                                <td>: رقم الامر المعتمد عليه في أعطاء التاشيرة:</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"> &nbsp; </td>
                                                <td colspan="4">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" align="right">
                                                    : لزيارة /العمل لدي
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Date:</td>
                                                <td>&nbsp;</td>
                                                <td>: التاريخ </td>
                                                <td>Visa No:</td>
                                                <td>
                                                    @if ($visaData)
                                                        {{ $visaData->visa_no }}
                                                    @endif

                                                </td>
                                                <td>: أشربرقم</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>FEE COLLECTED: &nbsp;</td>
                                                <td>: المبلغ المحصل</td>
                                                <td>Type: &nbsp;</td>
                                                <td>: نوعها </td>
                                                <td>Duration: &nbsp;</td>
                                                <td>: مدتها </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <hr>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="16%">
                                                    Arabic <br>
                                                    Head of Consular <br>
                                                    &nbsp; <br>
                                                    &nbsp; <br>
                                                    &nbsp; <br>
                                                    &nbsp; <br>
                                                </th>
                                                <th width="33%" colspan="2">
                                                    @if ($passportData)
                                                        {{-- {!!DNS1D::getBarcodeHTML("$passportData->passport_no",'UPCA')!!} --}}

                                                        <br>
                                                        {{ $passportData->passport_no }}
                                                        <br>
                                                    @endif
                                                </th>
                                                <th width="16%">
                                                    Arabic: Arabic
                                                </th>
                                                <th width="33%" colspan="2">
                                                    Arabic<br>
                                                    Checked By<br>
                                                    &nbsp; <br>
                                                    &nbsp; <br>
                                                    &nbsp; <br>
                                                    &nbsp; <br>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                {{-- @endif --}}

                            </div>
                        </div>
                        <!-- Tab: Project -->
                        <div class="tab-pane fade" id="second" role="tabpanel">

                            <div class="card">
                                <div class="card-body">
                                    <script>
                                        function printDiv() {
                                            var printContents = document.getElementById('GFG1').innerHTML;
                                            var originalContents = document.body.innerHTML;

                                            document.body.innerHTML = printContents;

                                            window.print();

                                            // document.body.innerHTML = originalContents;
                                        }
                                    </script>
                                    <input type="button" value="click" onclick="printDiv('GFG1')">
                                    <div class="container" id="GFG1">
                                        <style>
                                            table {
                                                margin-left: auto;
                                                margin-right: auto;
                                            }

                                            th,
                                            td {
                                                padding: 5px;
                                            }
                                        </style>
                                        <table style="width:80%">
                                            <tr>
                                                <th width="">
                                                    <img src="img.jpg" alt="">
                                                </th>
                                                <th width="" colspan="2">
                                                    {{$company->company_name}}<br>
                                                    Bangladesh Govt. Approved Recruiting Agent <br>
                                                    Recruiting NO. RL-{{$company->recruting_license_no}}
                                                </th>
                                                <th width="">
                                                    <img src="img.jpg" alt="">
                                                </th>
                                                <th width="" colspan="2">
                                                    {!!$company->company_address!!} <br>
                                                    Tel: {!!$company->company_multiple_phone!!}
                                                </th>
                                            </tr>
                                        </table>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>

                                        <table width="60%">
                                            <tr>
                                                <td>
                                                    <p>
                                                        TO <br>
                                                        HIS EXCELLENCY <br> THE CHIEF OF CONSULATE SECTION <br> ROYAL
                                                        EMBASSY OF SAUDI ARABIA <br> DHAKA, BANGLADESH.
                                                    </p>
                                                    <p>
                                                        EXCELLENCY, <br>
                                                        WITH DUE RESPECT WE ARE SUBMITTING ONE PASSPORT FOR WORK VISA WITH
                                                        ALL NECESSARY DOCUMENTS AND PARTICULARS MENTIONED AS BELOW KNOWING
                                                        ALL INSTRUCTIONS AND REGULATIONS OF CONSULATE SECTION.
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                        <table width="60%">
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    NAME OF THE EMPLOYER IN SAUDI ARABIA:
                                                </td>
                                                <td>
                                                    TRANSLATED BY REHAB AL-DOSARI, RIYADH, KSA.
                                                </td>
                                                <td>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    VISA NO AND DATE:
                                                </td>
                                                <td>
                                                    @if($visaData)
                                                        {{ $visaData->visa_no }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($visaData)
                                                    {{ $visaData->visa_issue_date }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3
                                                </td>
                                                <td>
                                                    FULL NAME OF THE EMPLOYEE:
                                                </td>
                                                <td>
                                                    {{ $client->client_name }}
                                                </td>
                                                <td>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4
                                                </td>
                                                <td>
                                                    PASSPORT NAME AND DATE
                                                </td>
                                                <td>
                                                    @if ($passportData)
                                                        {{ $passportData->passport_name }}
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($passportData)
                                                        {{ $passportData->date_of_passport_issue }}
                                                    @endif

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    PROFESSION:
                                                </td>
                                                <td>
                                                    &nbsp;
                                                </td>
                                                <td>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6
                                                </td>
                                                <td>
                                                    RELIGION:
                                                </td>
                                                <td>
                                                    {{ $client->religion }}
                                                </td>
                                                <td>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                        </table>
                                        <table width="60%">
                                            <tr>
                                                <td>
                                                    <p>
                                                        WE DO HEREBY CONFIRM AND DECLARE THAT RELIGION STATED IN THE VISA
                                                        FORM AND FORWARDING LETTER US FULLY CORRECT. WE ALSO UNDERTAKE THE
                                                        RESPONSIBILITY TO CANCEL THE VISA AND TO STOP FUNCTIONING WITH OUR
                                                        OFFICE IF THE STATEMENT IS FOUND INCORRECT.
                                                    </p>
                                                    <p>
                                                        WE THEREBY REQUEST YOUR EXCELLENCY TO KINDLY ISSUE WORK VISA OUT OF
                                                        {{ $client->client_name }} VISAS AND OBLIGE THEREBY.
                                                    </p>
                                                    <p>
                                                        YOURS FAITHFULLY,
                                                    </p>
                                                    <p>
                                                        FOR, AL-HARAM INTERNATIONAL (PVT.) LTD. RL-307
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                {{-- @endif --}}

                            </div>
                        </div>
                        <div class="tab-pane fade" id="third" role="tabpanel">

                            <div class="card">
                                <div class="card-body">
                                    <script>
                                        function printDiv() {
                                            var printContents = document.getElementById('GFG3').innerHTML;
                                            var originalContents = document.body.innerHTML;

                                            document.body.innerHTML = printContents;

                                            window.print();

                                            // document.body.innerHTML = originalContents;
                                        }
                                    </script>
                                    <input type="button" value="click" onclick="printDiv('GFG3')">
                                    <div class="container" id="GFG3">
                                        <style>
                                            table {
                                                margin-left: auto;
                                                margin-right: auto;
                                            }

                                            th,
                                            td {
                                                padding: 5px;
                                            }
                                        </style>
                                        <table width="60%">
                                            <tr>
                                                <td>
                                                    <h3 align="center">
                                                        <u>EMPLOYMENT AGREEMENT </u>
                                                    </h3>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <br>
                                        <table width="60%">
                                            <tr>
                                                <td>
                                                    NAME OF COMPANY:
                                                </td>
                                                <td colspan="2" align="right">
                                                    M/S تغريد فيحان غايب العتيبي ي
                                                    RIYADH, KSA
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    HERE BY APPOINTED
                                                </td>
                                                <td colspan="2" align="right">
                                                    {{ $client->client_name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    BANGLADESH PASSPORT NO.
                                                </td>
                                                <td colspan="2" align="right">
                                                    @if ($passportData)
                                                        {{ $passportData->passport_no }}
                                                    @endif

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    WORK VISA
                                                </td>
                                                <td colspan="2" align="right">
                                                    UNDER THE FOLLOWING TERMS.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <u>TERMS AND CONDITIONS:</u>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    01
                                                </td>
                                                <td>
                                                    MONTHLY SALARY
                                                </td>
                                                <td>
                                                    : DATA
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    02
                                                </td>
                                                <td>
                                                    FOOD AND ACCOMMODATION
                                                </td>
                                                <td>
                                                    : FREE
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    03
                                                </td>
                                                <td>
                                                    AIR PASSAGE
                                                </td>
                                                <td>
                                                    : BORNE BY THE EMPLOYER
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    04
                                                </td>
                                                <td>
                                                    DUTY HOUR
                                                </td>
                                                <td>
                                                    : 8 HOURS DAILY
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    05
                                                </td>
                                                <td>
                                                    HOLIDAY
                                                </td>
                                                <td>
                                                    : AS PER SAUDI LABOUR LAWS
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    06
                                                </td>
                                                <td>
                                                    LEAVE
                                                </td>
                                                <td>
                                                    : AS PER SAUDI LABOUR LAWS
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    07
                                                </td>
                                                <td>
                                                    OVERTIME & OTHER BENEFIT
                                                </td>
                                                <td>
                                                    : AS PER SAUDI LABOUR LAWS
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    08
                                                </td>
                                                <td>
                                                    MEDICAL FACILITES
                                                </td>
                                                <td>
                                                    : FREE
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    09
                                                </td>
                                                <td>
                                                    PERIOD OF CONTRACT
                                                </td>
                                                <td>
                                                    : TWO/ONE YEARS
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    10
                                                </td>
                                                <td>
                                                    REPATRIATION ARRANGEMENT INCLUDING
                                                    RETURN OF DEAD BODY & SERVICE BENEFIT
                                                    TO THE LEGAL HEIR OF THE EMPLOYEE
                                                </td>
                                                <td>
                                                    : RESPONSIBILITY OF THE EMPLOYER
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    11
                                                </td>
                                                <td>
                                                    OTHER TERMS & CONDITIONS NOT COVERED BY THIS AGREEMENT
                                                </td>
                                                <td>
                                                    : AS PER SAUDI LABOUR LAWS
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <table width="60%">
                                            <tr>
                                                <td>
                                                    <p>
                                                        SIGNATURE OF FIRST PARTY
                                                    </p>
                                                </td>
                                                <td align="right">
                                                    <p>
                                                        SIGNATURE OF SECOND PARTY
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                {{-- @endif --}}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
