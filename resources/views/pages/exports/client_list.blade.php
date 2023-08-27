@inject('ClientInfo', 'App\Models\Clients\Client')
    @inject('jobName', 'App\Models\Configuration\jobType')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <table id="myTable" class="table display dataTable table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Client Job Type</th>
                                    <th>Email</th>
                                    <th>Client Entry ID</th>
                                    <th>Current Balance</th>
                                    <th>Age</th>
                                    <th>Client Create Date</th>
                                    <th>Passport Number</th>
                                    <th>Passport Deadline</th>
                                    <th>Passport Duration</th>
                                    <th>Medical</th>
                                    <th>NID</th>
                                    <th>VISA number</th>
                                    <th>Police Clearence</th>
                                    <th>Manpower Office</th>
                                    <th>Musaned Number</th>
                                    <th>Musaned Date</th>
                                    <th>Mofa No</th>
                                    <th>Fingurprint</th>
                                    <th>Bank Statement</th>
                                    <th>BMET</th>
                                    <th>Flight No</th>
                                    <th>Airplane</th>
                                    <th>Flight Date</th>
                                    <th>Ticket No</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client as $client)
                                    @php
                                        $passport_number = 'NA';
                                        $passport_deadline = 'NA';
                                        $duration_left_days = 'NA';
                                        $medical_test = 'No';
                                        $visa_number = 'No';
                                        $police_clearence = 'No';
                                        $manpower = 'No';
                                        $mofa = 'No';
                                        $finger = 'No';
                                        $statement = 'No';
                                        $bmet = 'No';
                                        $flight_no = 'No';
                                        $airplane = 'No';
                                        $flight_date = 'No';
                                        $ticket = 'No';

                                        $passport1 = App\Models\Passport\Passport::paxNumber($client->client_id);
                                        $passport2 = App\Models\Passport\Passport::deadline($client->client_id);
                                        $passport3 = App\Models\Passport\Passport::deadline($client->client_id);

                                        if ($passport1) {
                                            $passport_number = $passport1->passport_no;
                                        }
                                        if ($passport2) {
                                            $passport_deadline = $passport2->date_of_passport_expiry;
                                        }
                                        if ($passport3) {
                                            $duration_left_days = $passport3->duration_left;
                                        }
                                        $visa = App\Models\Visa\Visa::visaNumber($client->client_id);
                                        if ($visa) {
                                            $visa_number = $visa->visa_no;
                                        }
                                        $medical = App\Models\MedicalTest\MedicalTest::medicalTest($client->client_id);
                                        if ($medical !== 0) {
                                            $medical_test = 'Yes';
                                        }
                                        $police = App\Models\PoliceClearance\PoliceClearance::policeTest($client->client_id);
                                        if ($police !== 0) {
                                            $police_clearence = 'Yes';
                                        }
                                        $office = App\Models\Manpower\Manpower::manpowertest($client->client_id);
                                        if ($office !== 0) {
                                            $manpower = 'Yes';
                                        }

                                        $mofadata = App\Models\Clients\ClientOverAll::mofa($client->client_id);
                                        if ($mofadata) {
                                            $mofa = $mofadata->mofa_number;
                                        }
                                        $fingerdata = App\Models\Clients\ClientOverAll::finger($client->client_id);
                                        if ($fingerdata) {
                                            $finger = $fingerdata->fingur_status;
                                        }
                                        $statementdata = App\Models\Clients\ClientOverAll::statement($client->client_id);
                                        if ($statementdata) {
                                            $statement = $statementdata->bank_statement_status;
                                        }
                                        $bmetdata = App\Models\Clients\ClientOverAll::bmet($client->client_id);
                                        if ($bmetdata) {
                                            $bmet = $bmetdata->bmet_status;
                                        }
                                        $flightNodata = App\Models\Clients\ClientOverAll::flightNo($client->client_id);
                                        if ($flightNodata) {
                                            $flight_no = $flightNodata->flight_number;
                                        }
                                        $airplanedata = App\Models\Clients\ClientOverAll::airplane($client->client_id);
                                        if ($airplanedata) {
                                            $airplane = $airplanedata->flight_airline;
                                        }
                                        $flightdatedata = App\Models\Clients\ClientOverAll::flightdate($client->client_id);
                                        if ($flightdatedata) {
                                            $flight_date = $flightdatedata->flight_date;
                                        }
                                        $ticketdata = App\Models\Clients\ClientOverAll::ticket($client->client_id);
                                        if ($ticketdata) {
                                            $ticket = $ticketdata->flight_ticket_number;
                                        }

                                    @endphp
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img src="{{ asset('').$client->client_picture }}" class="rounded"
                                                alt="Cinque Terre" height="50px" width="50px"></td>
                                        <td><a
                                                href="{{ url('clients/') . '/' . $client->client_id }}">{{ $client->client_name }}</a>
                                        </td>
                                        <td>{{ $client->client_phone }}</td>
                                        <td>{{ $jobName->jobName($client->client_job_type) }}</td>
                                        <td>{{ $client->client_email }}</td>
                                        <td>{{ $client->client_entry_id }}</td>
                                        <td>
                                            @if (get_client_current_balance_by_client_id($client->client_id) < 0)
                                                <span class="text-danger">Due</span>
                                                <br>
                                                <span
                                                    class="text-danger font-weight-bold">{{ abs(get_client_current_balance_by_client_id($client->client_id)) }}</span>
                                            @elseif (get_client_current_balance_by_client_id($client->client_id) == 0)
                                                <span class="text-info">Balance</span>
                                                <br>
                                                <span
                                                    class="text-dark">{{ get_client_current_balance_by_client_id($client->client_id) }}</span>
                                            @else
                                                <span class="text-success">Advance</span>
                                                <br>
                                                <span
                                                    class="text-dark">{{ get_client_current_balance_by_client_id($client->client_id) }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $client->present_age }}</td>
                                        <td>{{ $client->client_create_date }}</td>
                                        <td>{{ $passport_number }}</td>
                                        <td>{{ $passport_deadline }}</td>
                                        <td>{{ $duration_left_days }}</td>
                                        <td>{{ $medical_test }}</td>
                                        <td>{{ $client->client_nid }}</td>
                                        <td>{{ $visa_number }}</td>
                                        <td>{{ $police_clearence }}</td>
                                        <td>{{ $manpower }}</td>
                                        <td>{{ $client->musaned_number }}</td>
                                        <td>{{ $client->musaned_date }}</td>
                                        <td>{{ $mofa }}</td>
                                        <td>{{ $finger }}</td>
                                        <td>{{ $statement }}</td>
                                        <td>{{ $bmet }}</td>
                                        <td>{{ $flight_no }}</td>
                                        <td>{{ $airplane }}</td>
                                        <td>{{ $flight_date }}</td>
                                        <td>{{ $ticket }}</td>
                                        {{-- <td>{{ get_passport_duration($client->client_id) }}</td> --}}
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
