@extends('master')
@section('content')
    @inject('MoneyReciept','App\Models\MoneyReciept\MoneyReciept')
    @php
    $selectedAccount = $MoneyReciept->get_selected_account($moneyReceipt->money_reciept_account_transaction_id);
    $accountInfo = $MoneyReciept->get_account_info($moneyReceipt->money_reciept_account_transaction_id);
    // echo "<pre>";print_r($accountInfo);
    @endphp

@php
$company = App\Models\Configuration\CompanyInfo::get_company_info();
@endphp
    <!-- start: page body -->

        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3 display-none-style">
            <div class="container-fluid">
                <!-- Create invoice -->
                <div class="row g-3">
                    <div class="col-12">


                        <div class="card print_invoice">
                            <div class="card-header border-bottom fs-4">
                                <h5 class="card-title mb-0">MONEY RECEIPT INFORMATION</h5>
                            </div>
                            <div class="card-body">
                                <div class="card p-3">
                                    <div class="border-bottom pb-2">


                                        <div class="logoInvoice">
                                            @if ($company)
                                                <img src="{{asset('public')}}/{{$company->company_logo}}" alt="" width="40px" height="40px">
                                                {{$company->company_name}}
                                                @else
                                                <img class="img-fluid" src="{{ asset('public') }}/frontend/assets/img/logo.png"
                                                 alt="logo">
                                                @endif
                                        </div>
                                    </div>
                                    <div class="customer mt-4">
                                        <table class="meta">
                                            <tbody>
                                                <tr>
                                                    <td class="meta-head">Voucher No</td>
                                                    <td><p name="money_reciept_voucher_no"></p>{{$MoneyReciept->generate_vouchar_no()}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="meta-head">Date</td>
                                                    <td><p id="invoice_date">{{date('d-m-Y')}}</p></td>
                                                </tr>
                                                <tr>
                                                    <td class="meta-head">Amount Due</td>
                                                    <td>
                                                        <div class="due" id="invoiceDue"></div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="clear:both"></div>
                                    <table class="items">
                                        <tbody>
                                            <tr>
                                                <th>Invoice No.</th>
                                                <th>Account</th>
                                                <th>Invoice Net Total</th>
                                                <th style="width: 140px;">Invoice Due Amount</th>
                                                <th style="width: 140px;">Paid Amount</th>
                                                <th style="width: 70px;">Discount</th>
                                                <th style="width: 140px;">Payment Date</th>
                                            </tr>
                                        <div id="billingDetailsList">
                                            <tr class="item-row billing-details-row">
                                                <td class="item-name">
                                                    <div class="col-12">
                                                <p name="money_reciept_invoice_no" readonly>{{$invoice['invoice_no']}}</p>


                                                    </div>
                                                </td>
                                                <td class="description">

                                                        <p >
                                                               {{$accountInfo[0]->account_bank_name.' ['.$accountInfo[0]->account_number.']'}}
                                                            </p>
                                                </td>

                                                <td class="description">
                                                    <p name="money_reciept_invoice_net_total" readonly>{{$invoice['invoice_net_total']}}</p>
                                                </td>


                                                <td><p class="cost" name="money_reciept_invoice_due_amount" readonly>{{$invoice['due_amount']}}</p></td>
                                                <td><p class="cost " data-row="1" name="money_reciept_amount">{{$moneyReceipt['money_reciept_total_amount']}}</p></td>
                                                <td><p class="qty " name="money_reciept_discount" data-row="1">{{$moneyReceipt['money_reciept_total_discount']}}</p></td>
                                                <td><p class="qty" data-row="1" name="money_reciept_date">{{$moneyReceipt['money_reciept_payment_date']}}</p></td>
                                            </tr>
                                        </div>
                                        </tbody>
                                    </table>

                                    <div class="footer-note mt-5">
                                        <h5>Note</h5>
                                        <textarea name="money_reciept_note" class="form-control bg-light"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    </form>






    @endsection
