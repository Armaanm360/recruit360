@extends('master')
@section('content')
    <!-- Form section -->
    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container">
            <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('money-reciept-agent') }}">Agent
                                Money
                                Receipt</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List of Agent Money Reciept</li>
                    </ol>
                </div>


                <!-- .row end -->


            </div>
        </div>
    </div>

    <!-- start: page body -->
    <div class="container">
        <!-- Create invoice -->
        <div class="row g-3">
            <div class="col-12">
                <div class="card print_invoice">
                    <div class="card-header border-bottom fs-4">
                        <h5 class="card-title mb-0">Agent
                            Money
                            Reciept</h5>
                    </div>
                    <div class="card-body">
                        <div class="card p-3">
                            <div class="border-bottom pb-2">
                                <textarea class="form-control address">{{ $reciept->money_reciept_payment_to }}
                                </textarea>
                                <div id="logo">
                                    <div id="logohelp">
                                        <input id="imageloc" type="text" size="50" value=""><br> (max width:
                                        540px, max height: 100px)
                                    </div>
                                    <img src="{{ asset('public') }}/frontend/assets/img/logo.png" width="530px"
                                        alt="logo">
                                </div>
                            </div>
                            <div style="clear:both"></div>
                            <div class="customer mt-4">
                                <h3>Payment Type : <span class="text-info">{{ $reciept->money_reciept_payment_type }}</span>
                                </h3>
                                <table class="meta">
                                    <tbody>
                                        <tr>
                                            <td class="meta-head">Voucher #</td>
                                            <td>
                                                <textarea class="form-control">{{ $reciept->money_reciept_voucher_no }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="meta-head">Date</td>
                                            <td>
                                                <textarea class="form-control" id="date">{{ $reciept->money_reciept_payment_date }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="meta-head">Amount</td>
                                            <td>
                                                <div class="due">{{ $reciept->money_reciept_total_amount }}</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="clear:both"></div>
                            <table class="items">
                                <tbody>
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Agent Opening Balance</th>
                                        <th style="width: 140px;">Amount</th>
                                        <th style="width: 70px;">Discount</th>
                                        <th style="width: 140px;">After Discount</th>
                                    </tr>
                                    <tr class="item-row">
                                        <td class="item-name">
                                            <div class="delete-wpr">
                                                <textarea>{{ $reciept->agent_name }}</textarea>
                                            </div>
                                        </td>
                                        <td class="description">
                                            <textarea>{{ $reciept->agent_opening_balance }}</textarea>
                                        </td>
                                        <td>
                                            <textarea class="cost">{{ $reciept->money_reciept_total_amount }}</textarea>
                                        </td>
                                        <td>
                                            <textarea class="qty">{{ $reciept->money_reciept_total_discount }}</textarea>
                                        </td>
                                        <td><span
                                                class="price">{{ $reciept->money_reciept_total_amount - $reciept->money_reciept_total_discount }}</span>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <div style="clear:both"></div>
                            <div class="footer-note mt-5">
                                <h5>Note</h5>
                                <textarea class="form-control bg-light">{{ $reciept->money_reciept_note }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center text-md-end">
                <button type="button" class="btn btn-lg btn-primary" onclick="window.print();return false"><i
                        class="fa fa-print me-2"></i>Print Invoice</button>
                <button type="button" class="btn btn-lg btn-secondary"><i class="fa fa-envelope me-2"></i>Send
                    PDF</button>
            </div>
        </div> <!-- .row end -->
    </div>
    <!-- end form section -->
@endsection
