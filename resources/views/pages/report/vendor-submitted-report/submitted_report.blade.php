<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3> Vendor Passport Report</h3>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Client Name</th>
                                    <th>Processing Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($passportList as $list)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$list->client_name}}</td>
                                    <td>{{$list->passport_amount}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td>Total Processing Fee</td>
                                    <td>
                                        @if ($passportamount)
                                        {{$passportamount}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="card-header">
                        <h3> Vendor Manpower Report</h3>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Client Name</th>
                                    <th>Processing Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($manpowerList as $list)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$list->client_name}}</td>
                                    <td>{{$list->processing_cost}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td>Total Processing Fee</td>
                                    <td>
                                        @if ($manpowerData)
                                        {{$manpowerData}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="card-header">
                        <h3> Vendor Police Clearence Report</h3>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Client Name</th>
                                    <th>Processing Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($policeClearenceList as $list)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$list->client_name}}</td>
                                    <td>{{$list->police_clearence_processing_cost}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td>Total Processing Fee</td>
                                    <td>
                                        @if ($policeClearenceData)
                                        {{$policeClearenceData}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="card-header">
                        <h3>Vendor Training Card Report</h3>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Client Name</th>
                                    <th>Processing Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trainingList as $list)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$list->client_name}}</td>
                                    <td>{{$list->training_card_processing_cost}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td>Total Processing Fee</td>
                                    <td>
                                        @if ($trainingData)
                                        {{$trainingData}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="card-header">
                        <h3>Medical Test Report</h3>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Client Name</th>
                                    <th>Processing Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medicalListList as $list)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$list->client_name}}</td>
                                    <td>{{$list->medical_test_processing_cost}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td>Total Processing Fee</td>
                                    <td>
                                        @if ($medicalTestData)
                                        {{$medicalTestData}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="card-header">
                        <h3>Final Medical Test Report</h3>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Client Name</th>
                                    <th>Processing Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($finalmedicalListList as $list)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$list->client_name}}</td>
                                    <td>{{$list->final_medical_test_processing_cost}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td>Total Processing Fee</td>
                                    <td>
                                        @if ($medicalTestFinalData)
                                        {{$medicalTestFinalData}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
@php
    $total = $medicalTestFinalData + $medicalTestData + $trainingData + $policeClearenceData + $manpowerData + $passportamount ;
@endphp
                    <h3>Overall Processing Cost: {{$total}}</h3>
                </div>
      </div>
    </div>
    </div>
</div>


