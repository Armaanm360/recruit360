<div class="row g-3">
    <form id="refundForm">
        @csrf
        <div class="col-12">
            <div class="card print_invoice">
                <div class="card-header border-bottom fs-4">
                    <h5 class="card-title mb-0">Refund</h5>
                </div>
                <div class="card-body">
                    <div class="card p-3">

                        <div style="clear:both"></div>
                        <div style="clear:both"></div>

                        <table class="items" id="dynamic_row">
                            <tbody>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Invoice Quantity</th>
                                    <th>Remaining Quantity</th>
                                    <th>Refund Quantity</th>
                                    <th>Refund Charge</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                    <th>Refund Amount</th>
                                    <th>Return Price</th>
                                </tr>

                                @php
                                    $sl = 0;
                                @endphp
                                @foreach ($invoice as $invoice)
                                    @php
                                        $sl++;
                                    @endphp
                                    <tr class="item-row">
                                        <td>
                                            <textarea class="cost">{{ $invoice->billing_product }}</textarea>
                                            <input type="hidden" name="invoice_id" value="{{ $invoice->invoice_id }}">
                                            <input type="hidden" name="refund_client_id"
                                                value="{{ $invoice->invoice_client_id }}">
                                            <input type="hidden" name="refund_client_transaction_id"
                                                value="{{ $invoice->refund_client_transaction_id }}">
                                        </td>
                                        <td>
                                            <textarea class="cost billing_quantity billing_quantity-{{ $sl }}" id="billing_quantity"
                                                name="billing_quantity_{{ $sl }}" readonly>{{ $invoice->billing_quantity }}</textarea>
                                        </td>
                                        <td>
                                            <textarea class="cost remaining_quantity remaining_quantity-{{ $sl }}" id="remaining_quantity"
                                                name="remaining_quantity_{{ $sl }}" readonly>{{ $invoice->billing_quantity }}</textarea>
                                        </td>
                                        <td>
                                            <textarea class="refund_quantity refund_quantity-{{ $sl }}" id="refund_quantity"
                                                data-row="{{ $sl }}" name="refund_quantity_{{ $sl }}"></textarea>
                                        </td>
                                        <td>
                                            <textarea class="cost refund_charge refund_charge-{{ $sl }}" id="refund_charge"
                                                name="refund_charge_{{ $sl }}" data-row="{{ $sl }}">0</textarea>
                                        </td>
                                        <td>
                                            <textarea class="cost billing-unit-price-{{ $sl }}" id="unit_price" name="unit_price_{{ $sl }}"
                                                id="unit_price" readonly>{{ $invoice->billing_unit_price }}</textarea>
                                        </td>
                                        <td>
                                            <textarea class="cost" id="total_price" name="total_price_{{ $sl }}" readonly>{{ $invoice->billing_unit_price }}</textarea>
                                        </td>
                                        <td>
                                            <textarea class="cost refund_amount refund_amount-{{ $sl }}" id="refund_amount"
                                                name="refund_amount_{{ $sl }}" readonly>0</textarea>
                                        </td>
                                        <td>
                                            <textarea class="cost refund_return_amount refund_return_amount-{{ $sl }}" id="refund_return_amount"
                                                name="refund_return_price_{{ $sl }}" readonly>0</textarea>
                                        </td>
                                        <input type="hidden" name="refund_rows[]" value="{{ $sl }}" />
                                    </tr>
                                @endforeach



                                {{-- <textarea name="refunded_quantity" id="" cols="30" rows="10" class="refunded_quantity"></textarea> --}}



                                <tr>
                                    <td colspan="2" class="blank"> </td>
                                    <td colspan="2" class="total-line">Grand Total</td>
                                    <td class="total-value">
                                        <div id="subtotal">{{ $invoice->invoice_subtotal }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="blank"> </td>
                                    <td colspan="2" class="total-line text-danger">Net Refund Charge(=)</td>
                                    <td class="total-value">
                                        <textarea class="cost refund_charge_total" id="total" name="refund_charge_overall">0</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="blank"> </td>
                                    <td colspan="2" class="total-line">Refunded Items Quantity</td>
                                    <td class="">
                                        <div id="">
                                            <input type="text" id="refunded_quantity" readonly
                                                name="refunded_quantity">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="blank"> </td>
                                    <td colspan="2" class="total-line">Net Total</td>
                                    <td class="total-value nettotal">
                                        {{-- <div id="netTotal"></div> --}}

                                        <textarea name="refund_with_charge_total" id="nettotal" readonly></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    @if (get_client_current_balance_by_client_id($invoice->invoice_client_id) < 0)
                                        <td colspan="2" class="total-line">Previous Due</td>
                                        <td class="total-value">
                                            <div id="prev">
                                                {{ abs(get_client_current_balance_by_client_id($invoice->invoice_client_id)) }}
                                            </div>
                                        </td>
                                    @elseif (get_client_current_balance_by_client_id($invoice->client_id) == 0)
                                        <td colspan="2" class="total-line">Balance</td>
                                        <td class="total-value">
                                            <div id="prev">
                                                {{ get_client_current_balance_by_client_id($invoice->invoice_client_id) }}
                                            </div>
                                        </td>
                                    @else
                                        <td colspan="2" class="total-line">Advance</td>
                                        <td class="total-value">
                                            <div id="prev">
                                                {{ get_client_current_balance_by_client_id($invoice->invoice_client_id) }}
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>

                        <div style="clear:both"></div>
                        <div class="row mt-3">
                            <div class="col-md-6" id="adjustment">
                                <input type="hidden" value="{{ $invoice->invoice_no }}" name="invoice_no">
                                {{-- Advance --}}
                                @if (get_client_current_balance_by_client_id($invoice->invoice_client_id) > 0)
                                    {{-- and
                                    get_moeny_recipt_existance($invoice->invoice_no) == 0 --}}
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="process"
                                            id="add_advance" value="Advance">
                                        <label class="form-check-label" for="flexRadioDefault1">Advance
                                        </label>
                                        <div id="due_form2">
                                            <label for="">Advance Amount</label>
                                            <input type="text" name="advance_amount" id="advance_amount"
                                                value="{{ get_client_current_balance_by_client_id($invoice->invoice_client_id) }}"
                                                readonly>
                                        </div>


                                        <div id="money_return_div">
                                            <label class="form-check-label" for="flexRadioDefault1">Money Return
                                            </label>
                                            <input class="form-check-input" type="radio" name="process"
                                                id="money_return" value="money_return">

                                        </div>



                                        <div id="money_return_form">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label>
                                                        <span>Payment Type</span>
                                                    </label>
                                                    <select class="form-control form-control-lg custom-select"
                                                        name="transaction_type" id="type">
                                                        <option value="" disabled selected>
                                                            {{ __('Select Opening Balance') }}
                                                        </option>
                                                        <option value="cash">Cash</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label>
                                                        <span>Method</span>
                                                    </label>
                                                    <select class="form-control form-control-lg custom-select"
                                                        name="transaction_method" id="method">
                                                        <option value="" disabled selected>
                                                            {{ __('Select Method') }}
                                                        </option>
                                                        <option value="cash">Cash</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label>
                                                        <span>Account</span>
                                                    </label>
                                                    <select class="form-control form-control-lg custom-select"
                                                        name="account_get_select" id="account_get_select">
                                                        <option value="" disabled selected>
                                                            {{ __('Select Method') }}
                                                        </option>
                                                        @foreach ($account as $account)
                                                            <option value="{{ $account->account_id }}"
                                                                id="account_get">
                                                                {{ $account->account_name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-3">
                                                    <label>
                                                        <span>Available Balance</span>
                                                    </label>
                                                    <textarea name="" id="available_balance" readonly>0</textarea>
                                                </div>
                                                <div class="col-3">
                                                    <label>
                                                        <span>Return Amount</span>
                                                    </label>
                                                    <textarea name="" readonly>0</textarea>
                                                </div>
                                                <div class="col-3">
                                                    <label>
                                                        <span>Date</span>
                                                    </label>
                                                    <textarea name="" readonly>{{ date('Y-M-D') }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    {{-- Case-2: Client Advance + Money Recipt  --}}
                                    {{-- @elseif (get_client_current_balance_by_client_id($invoice->invoice_client_id) >= 0 and
                                    get_moeny_recipt_existance($invoice->invoice_no) != 0) --}}
                                    {{-- <div class="form-check">
                                        <label class="form-check-label" for="flexRadioDefault1">Advance
                                            Adjustment</label>

                                    </div> --}}

                                    {{-- <div class="col-md-6">
                                        <div id="due_form">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label>
                                                        <span>Payment Type</span>
                                                    </label>
                                                    <select class="form-control form-control-lg custom-select"
                                                        name="transaction_type" id="type">
                                                        <option value="" disabled selected>
                                                            {{ __('Select Opening Balance') }}
                                                        </option>
                                                        <option value="cash">Cash</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label>
                                                        <span>Method</span>
                                                    </label>
                                                    <select class="form-control form-control-lg custom-select"
                                                        name="transaction_method" id="method">
                                                        <option value="" disabled selected>
                                                            {{ __('Select Method') }}
                                                        </option>
                                                        <option value="cash">Cash</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label>
                                                        <span>Account</span>
                                                    </label>
                                                    <select class="form-control form-control-lg custom-select"
                                                        name="account_get_select" id="account_get_select">
                                                        <option value="" disabled selected>
                                                            {{ __('Select Method') }}
                                                        </option>
                                                        @foreach ($account as $account)
                                                            <option value="{{ $account->account_id }}"
                                                                id="account_get">
                                                                {{ $account->account_name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-3">
                                                    <label>
                                                        <span>Available Balance</span>
                                                    </label>
                                                    <textarea name="" id="available_balance" readonly>0</textarea>
                                                </div>
                                                <div class="col-3">
                                                    <label>
                                                        <span>Return Amount</span>
                                                    </label>
                                                    <textarea name="" readonly>0</textarea>
                                                </div>
                                                <div class="col-3">
                                                    <label>
                                                        <span>Date</span>
                                                    </label>
                                                    <textarea name="" readonly>{{ date('Y-M-D') }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div id="due_form2">
                                            <label for="">Advance Amount</label>
                                            <input type="text" name="invoice_id"
                                                value="{{ $invoice->invoice_id }}">
                                        </div>
                                    </div> --}}

                                    {{-- Case-3: Client Due + Money Recipt  --}}
                                @elseif (get_moeny_recipt_existance($invoice->invoice_no) != 0)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="process"
                                            id="flexRadioFirst1" value="due_adjustment">
                                        <label class="form-check-label" for="flexRadioDefault1">Due Adjustment</label>
                                    </div>

                                    <div id="money_return_div">

                                        <input class="form-check-input" type="radio" name="process"
                                            id="money_return" value="money_return">
                                        <label class="form-check-label" for="flexRadioDefault1">Money Return
                                        </label>
                                    </div>



                                    <div id="money_return_form">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>
                                                    <span>Payment Type</span>
                                                </label>
                                                <select class="form-control form-control-lg custom-select"
                                                    name="transaction_type" id="type">
                                                    <option value="" disabled selected>
                                                        {{ __('Select Method Type') }}
                                                    </option>
                                                    <option value="cash">Cash</option>
                                                    <option value="bank">Bank</option>
                                                    <option value="mobile_banking">Mobile Banking</option>
                                                </select>
                                            </div>
                                            {{-- <div class="col-3">
                                                <label>
                                                    <span>Method</span>
                                                </label>
                                                <select class="form-control form-control-lg custom-select"
                                                    name="transaction_method" id="method">
                                                    <option value="" disabled selected>
                                                        {{ __('Select Method') }}
                                                    </option>
                                                    <option value="cash">Cash</option>
                                                </select>
                                            </div> --}}
                                            <div class="col-3">
                                                <label>
                                                    <span>Account</span>
                                                </label>
                                                <select class="form-control form-control-lg custom-select"
                                                    name="account_get_select" id="account_get_select">
                                                    <option value="" disabled selected>
                                                        {{ __('Select Method') }}
                                                    </option>
                                                    @foreach ($account as $account)
                                                        <option value="{{ $account->account_id }}" id="account_get">
                                                            {{ $account->account_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-3">
                                                <label>
                                                    <span>Available Balance</span>
                                                </label>
                                                <textarea name="" id="available_balance" readonly>0</textarea>
                                            </div>
                                            <div class="col-3">
                                                <label>
                                                    <span>Return Amount</span>
                                                </label>
                                                <textarea name="" readonly>0</textarea>
                                            </div>
                                            <div class="col-3">
                                                <label>
                                                    <span>Date</span>
                                                </label>
                                                <textarea name="" readonly>{{ date('Y-M-D') }}</textarea>
                                            </div>
                                        </div>

                                    </div>

                                    {{-- Case-4: Client Due + No Money Recipt  --}}
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="process"
                                            id="due_adjustment" value="due_adjustment">
                                        <label class="form-check-label" for="flexRadioDefault1">Due Adjustment</label>
                                    </div>

                                    <div id="due_form2">
                                        <label for="">Due Amount</label>
                                        <input type="text" name="due_amount"
                                            value="{{ get_client_current_balance_by_client_id($invoice->invoice_client_id) }}"
                                            readonly>
                                    </div>

                                    <div id="money_return_div">
                                        <label class="form-check-label" for="flexRadioDefault1">Money Return
                                        </label>
                                        <input class="form-check-input" type="radio" name="process"
                                            id="money_return" value="money_return">

                                    </div>



                                    <div id="money_return_form">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>
                                                    <span>Payment Type</span>
                                                </label>
                                                <select class="form-control form-control-lg custom-select"
                                                    name="transaction_type" id="type">
                                                    <option value="" disabled selected>
                                                        {{ __('Select Payment Type') }}
                                                    </option>
                                                    <option value="cash">Cash</option>
                                                    <option value="bank">Bank</option>
                                                    <option value="mobile_banking">Mobile Banking</option>
                                                </select>
                                            </div>

                                            <div class="col-3">
                                                <label>
                                                    <span>Account</span>
                                                </label>
                                                <select class="form-control form-control-lg custom-select"
                                                    name="account_get_select" id="account_get_select">
                                                    <option value="" disabled selected>
                                                        {{ __('Select Method') }}
                                                    </option>
                                                    @foreach ($account as $account)
                                                        <option value="{{ $account->account_id }}" id="account_get">
                                                            {{ $account->account_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-3">
                                                <label>
                                                    <span>Available Balance</span>
                                                </label>
                                                <textarea name="" id="available_balance" readonly>0</textarea>
                                            </div>
                                            <div class="col-3">
                                                <label>
                                                    <span>Return Amount</span>
                                                </label>
                                                <textarea name="" readonly id="return_amount_show">0</textarea>
                                            </div>
                                            <div class="col-3">
                                                <label>
                                                    <span>Date</span>
                                                </label>
                                                <textarea name="" readonly>{{ date('Y-M-D') }}</textarea>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                            @endif



                            {{-- Case-3: Client Due + Money Recipt  --}}


                            {{-- @if (get_client_current_balance_by_client_id($invoice->invoice_client_id) < 0)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioFirst1">
                                        <label class="form-check-label" for="flexRadioDefault1">Due Adjustment</label>
                                    </div>
                                @elseif(get_moeny_recipt_existance($invoice->invoice_no) != 0 and
                                    get_client_current_balance_by_client_id($invoice->invoice_client_id) == 0)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="money_return"
                                            id="flexRadioFirst1" value="money_return">
                                        <label class="form-check-label" for="flexRadioDefault1">Money
                                            Return</label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="money_return"
                                            id="flexRadioFirst1" value="money_return">
                                        <label class="form-check-label" for="flexRadioDefault1">Advance
                                            Adjustment</label>
                                    </div>
                                @endif




                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Advance</label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div id="due_form">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>
                                                <span>Payment Type</span>
                                            </label>
                                            <select class="form-control form-control-lg custom-select"
                                                name="transaction_type" id="type">
                                                <option value="" disabled selected>
                                                    {{ __('Select Opening Balance') }}
                                                </option>
                                                <option value="cash">Cash</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label>
                                                <span>Method</span>
                                            </label>
                                            <select class="form-control form-control-lg custom-select"
                                                name="transaction_method" id="method">
                                                <option value="" disabled selected>
                                                    {{ __('Select Method') }}
                                                </option>
                                                <option value="cash">Cash</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label>
                                                <span>Account</span>
                                            </label>
                                            <select class="form-control form-control-lg custom-select"
                                                name="account_get_select" id="account_get_select">
                                                <option value="" disabled selected>
                                                    {{ __('Select Method') }}
                                                </option>
                                                @foreach ($account as $account)
                                                    <option value="{{ $account->account_id }}" id="account_get">
                                                        {{ $account->account_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <label>
                                                <span>Available Balance</span>
                                            </label>
                                            <textarea name="" id="available_balance" readonly>0</textarea>
                                        </div>
                                        <div class="col-3">
                                            <label>
                                                <span>Return Amount</span>
                                            </label>
                                            <textarea name="" readonly>0</textarea>
                                        </div>
                                        <div class="col-3">
                                            <label>
                                                <span>Date</span>
                                            </label>
                                            <textarea name="" readonly>{{ date('Y-M-D') }}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <div id="due_form2">
                                    <label for="">Advance Amount</label>
                                    <input type="text" name="invoice_id" value="{{ $invoice->invoice_id }}">
                                </div>
                            </div> --}}

                        </div>


                        {{-- <div class="footer-note mt-5">
                            <h5>Terms</h5>
                            <textarea class="form-control bg-light">NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
                        </div> --}}

                    </div>
                </div>
                <div class="col-12 text-center text-md-end">
                    {{-- <button type="button" class="btn btn-lg btn-primary" onclick="window.print();return false"><i
                class="fa fa-print me-2"></i>Print Invoice</button> --}}
                    <button type="button" class="btn btn-lg btn-primary m-3" id="create_refund"><i
                            class="fa fa-print me-2"></i>Create
                        Refund</button>


                    <button type="submit" class="btn btn-lg btn-primary m-3" id="refund_confirm_btn"><i
                            class="fa fa-print me-2"></i>Confirm</button>
                </div>
            </div>


        </div>
    </form>

</div>


<script type="text/javascript">
    $(document).on('keyup', '.refund_quantity', function() {
        var row_number = $(this).attr('data-row');
        //alert(row_number);
        //$('.total_price-' + row_number).val(get_product_price_total(row_number));
        $('.refund_amount-' + row_number).val(get_product_price_total(row_number));
        $('.refund_return_amount-' + row_number).val(get_product_price_total_with_charge(row_number));
        $('.remaining_quantity-' + row_number).val(remainingQuantity(row_number));
        $('#nettotal').val(getTotalRefundWithCharge());
        $('#return_amount_show').val(getTotalRefundWithCharge());
        $('#refunded_quantity').val(getTotalRefundQuantity());


        // $('#invoiceSubTotal').val(get_sub_total());
        // $('#invoiceNetTotal').val(get_net_total());
        // $('#due_amount').val(get_net_total());
        // $('#invoiceDue').text(get_net_total());
    });


    $(document).on('keyup', '.refund_charge', function() {
        var row_number = $(this).attr('data-row');
        //alert(row_number);
        $('.refund_amount-' + row_number).val(get_product_price_total(row_number));
        $('.refund_return_amount-' + row_number).val(get_product_price_total_with_charge(row_number));
        $('.refund_charge_total').val(getTotalRefundCharge());
        $('#nettotal').val(getTotalRefundWithCharge());
        $('#return_amount_show').val(getTotalRefundWithCharge());
        $('#refunded_quantity').val(getTotalRefundQuantity());

        // $('#invoiceSubTotal').val(get_sub_total());
        // $('#invoiceNetTotal').val(get_net_total());
        // $('#due_amount').val(get_net_total());
        // $('#invoiceDue').text(get_net_total());
    });


    // $(document).on('keyup', '.unit-price', function() {
    //     var row_number = $(this).attr('data-row');
    //     $('.billing-total-' + row_number).val(get_product_price_total(row_number));
    //     $('#invoiceSubTotal').val(get_sub_total());
    //     $('#invoiceNetTotal').val(get_net_total());
    //     $('#due_amount').val(get_net_total());
    //     $('#invoiceDue').text(get_net_total());
    // });

    // $(document).on('keyup', '.invoice-discount', function() {
    //     $('#invoiceNetTotal').val(get_net_total());
    //     $('#due_amount').val(get_net_total());
    //     $('#invoiceDue').text(get_net_total());
    // });


    function get_product_price_total(row_number) {
        var unitPrice = $('.billing-unit-price-' + row_number).val();
        // alert(unitPrice);
        unitPrice = unitPrice.replace(/\,/g, '');
        unitPrice = parseInt(unitPrice, 10);
        var unitPriceR = parseInt(unitPrice) || 0;

        var billingQnty = $('.refund_quantity-' + row_number).val();
        billingQnty = billingQnty.replace(/\,/g, '');
        billingQnty = parseInt(billingQnty, 10);
        var billingQntyR = parseInt(billingQnty) || 0;

        var neatprice = parseInt(unitPriceR) * parseInt(billingQntyR);
        return parseInt(neatprice);
    }


    function get_product_price_total_with_charge(row_number) {
        var unitPrice = $('.billing-unit-price-' + row_number).val();
        var refundCharge = $('.refund_charge-' + row_number).val();
        // alert(unitPrice);
        unitPrice = unitPrice.replace(/\,/g, '');
        unitPrice = parseInt(unitPrice, 10);
        var unitPriceR = parseInt(unitPrice) || 0;

        var billingQnty = $('.refund_quantity-' + row_number).val();
        billingQnty = billingQnty.replace(/\,/g, '');
        billingQnty = parseInt(billingQnty, 10);
        var billingQntyR = parseInt(billingQnty) || 0;

        var neatprice = parseInt(unitPriceR) * parseInt(billingQntyR);

        var neatpriceWithCharge = (parseInt(unitPriceR) * parseInt(billingQntyR)) - refundCharge;
        return parseInt(neatpriceWithCharge);
    }

    function remainingQuantity(row_number) {
        var refundQnty = $('.refund_quantity-' + row_number).val();
        var billingQnty = $('.billing_quantity-' + row_number).val();

        // alert(unitPrice);


        var refundQnty = $('.refund_quantity-' + row_number).val();
        refundQnty = refundQnty.replace(/\,/g, '');
        refundQnty = parseInt(refundQnty, 10);
        var refundQnty = parseInt(refundQnty) || 0;


        billingQnty = billingQnty.replace(/\,/g, '');
        billingQnty = parseInt(billingQnty, 10);
        var billingQnty = parseInt(billingQnty) || 0;





        if (parseInt(refundQnty) > parseInt(billingQnty)) {
            alert('refund quantity cannot be more than invoice quantity');
            $('.refund_quantity').val(0);
            //$('#total_price').val(0);
            $('.refund_amount').val(0);
            $('.refund_return_amount').val(0);
            return parseInt(billingQnty);

        } else {
            var remainQnty = parseInt(billingQnty) - parseInt(refundQnty);
            return parseInt(remainQnty);
        }

        // var neatpriceWithCharge = (parseInt(unitPriceR) * parseInt(billingQntyR)) - refundCharge;

    }





    function get_sub_total() {
        var inputs_product_total = $('.billing-single-total');
        var unitPrice = 0;
        for (var i = 0; i < inputs_product_total.length; i++) {
            var getValue = $(inputs_product_total[i]).val();
            var num = getValue.replace(/\,/g, '');
            num = parseInt(num, 10);
            if (!isNaN(num)) {
                unitPrice += num;
            }
        }
        return parseInt(unitPrice);
    }

    function get_net_total() {
        var inputs_product_total = $('.billing-single-total');
        var unitPrice = 0;
        for (var i = 0; i < inputs_product_total.length; i++) {

            var getValue = $(inputs_product_total[i]).val();
            // console.log(inputs_product_total[i]);
            var num = getValue.replace(/\,/g, '');
            num = parseInt(num, 10);
            if (!isNaN(num)) {
                unitPrice += num;
            }
        }

        var invoiceDiscount = $('.invoice-discount').val();
        invoiceDiscount = invoiceDiscount.replace(/\,/g, '');
        invoiceDiscount = parseInt(invoiceDiscount, 10);
        var invoiceDiscountR = parseInt(invoiceDiscount) || 0;

        var netTotal = parseInt(unitPrice) - invoiceDiscountR;
        return parseInt(netTotal);
    }

    function getTotalRefundCharge() {
        var sum = 0;
        $('.refund_charge').each(function() {
            sum += parseFloat($(this).val());
        });

        return sum;

    }

    //refund_quantity - {{ $sl }}

    function getTotalRefundQuantity() {
        var inputs_product_total = $('.refund_quantity');
        var unitPrice = 0;
        for (var i = 0; i < inputs_product_total.length; i++) {
            var getValue = $(inputs_product_total[i]).val();
            var num = getValue.replace(/\,/g, '');
            num = parseInt(num, 10);
            if (!isNaN(num)) {
                unitPrice += num;
            }
        }
        return parseInt(unitPrice);

    }


    function getTotalRefundWithCharge() {
        var inputs_product_total = $('.refund_return_amount');
        var unitPrice = 0;
        for (var i = 0; i < inputs_product_total.length; i++) {
            var getValue = $(inputs_product_total[i]).val();
            var num = getValue.replace(/\,/g, '');
            num = parseInt(num, 10);
            if (!isNaN(num)) {
                unitPrice += num;
            }
        }
        return parseInt(unitPrice);

    }

    function getNetTotalRefund() {
        var sum = 0;
        $('#refund_return_amount').each(function() {
            sum += parseFloat($(this).val());
        });

        return sum;

    }





    // $(function() {
    //     var tbl = $('#dynamic_row');

    //     tbl.find('.item-row').each(function() {
    //         // $this = this;
    //         $(this).find('.refund_quantity').bind("keyup", function() {
    //             calculateSum();
    //         });
    //     });

    //     function calculateSum() {
    //         var tbl = $('#dynamic_row');
    //         tbl.find('tr').each(function() {
    //             var sum = 0;
    //             var unit_price = $('#unit_price').val();
    //             $(this).find('.refund_quantity').not('#refund_amount').each(function() {
    //                 if (!isNaN(this.value) && this.value.length != 0) {
    //                     sum = parseFloat(this.value * unit_price);
    //                 }
    //             });

    //             $(this).find('#refund_amount').val(sum.toFixed(2));
    //         });
    //     }
    // });



    // function refundQuantity() {
    //     $(document).ready(function() {
    //         let billing_quantity = $('#billing_quantity').val();
    //         let refund_quantity = $('#refund_quantity').val();
    //         let unit_price = $('#unit_price').val();
    //         let refund_charge = $('#refund_charge').val();
    //         let total_price = $('#total_price').val();
    //         let return_price = $('#return_price').val(refund_quantity * unit_price);
    //         let refund_amount = $('#refund_amount').val(refund_quantity * unit_price);
    //         let remaining_quantity = $('#remaining_quantity').val(billing_quantity -
    //             refund_quantity);


    //         if (refund_charge != 0) {

    //             $('#return_price').val(refund_amount - refund_charge);

    //         }




    //         // if (refund_quantity != null) {

    //         //     let refund_amount = $('#refund_amount').val(refund_quantity * unit_price);

    //         //     let refind_price = $('#refund_price').val((refund_quantity * unit_price) -
    //         //         refund_charge);




    //         //     $('#return_price').val(refund_amount - refund_charge);
    //         //     $('#total').val(refund_amount);
    //         //     $('#netTotal').text(total_price - refund_charge);

    //         // }






    //     });
    // }
    $(document).ready(function() {


        $('#adjustment').hide();
        $('#due_form').hide();
        $('#due_form2').hide();
        $('#account_get').hide();
        $('#money_return_form').hide();

        // $(document).on('keyup', '#refund_charge', function() {


        //     let refund_charge = $(this).val();
        //     let refund_amount = $('#refund_amount').val();
        //     let total_price = $('#total_price').val();

        //     $('#return_price').val(refund_amount - refund_charge);
        //     $('#total').text(refund_amount);
        //     $('#netTotal').text(total_price - refund_charge);


        //     // if (refund_quantity > billing_quantity) {
        //     //     alert('Invalid Quantity');
        //     // } else {
        //     //     let remaining_quantity = $('#remaining_quantity').val(billing_quantity -
        //     //         refund_quantity);
        //     //     let refund_amount = $('#refund_amount').val(refund_quantity * unit_price);
        //     // }
        // });
        // // $('#due_form').hide();
        // $('#refund_confirm_btn').hide();

        $(document).on('click', '#create_refund', function() {


            $('#adjustment').show();
            $('#refund_confirm_btn').show();
            $('#create_refund').hide();

        });



        $(document).on('click', '#flexRadioFirst1', function() {
            $('#due_form').show();
            $('#due_form2').hide();
            $('#money_return_form').hide();
        });


        $(document).on('click', '#money_return', function() {
            $('#money_return_form').show();
            $('#due_form2').hide();
        });



        $(document).on('click', '#add_advance', function() {
            $('#due_form2').show();
            $('#money_return_form').hide();
        });
        $(document).on('click', '#flexRadioDefault2', function() {
            $('#due_form2').show();
            $('#due_form').hide();
            $('#money_return_form').hide();
        });
        $(document).on('click', '#due_adjustment', function() {
            $('#due_form2').show();

        });




        $('#method').change(function() {
            if ($(this).val() === 'cash') {
                $('#account_get').show();
            }
        });

        $('#account_get_select').change(function() {

            let account_id = $(this).find(":selected").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "GET",
                url: "{{ url('get-accounts') }}/" + account_id,
                success: function(data, textStatus, jqXHR) {
                    $('#available_balance').val(data);
                }
            }).done(function() {
                $("#success_msg").html("Data Save Successfully");
                // window.location.href = "{{ url('agents') }}";
                // location.reload();
            }).fail(function(data, textStatus, jqXHR) {
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                        value +
                        "</span>");
                });
            });


            //alert(account_id);

        });

        $("#refundForm").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#refundForm')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('refund') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {

                    //alert(data);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Refund Created Successful',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,

                    });

                    window.location.href = "{{ url('refund') }}";


                }
            }).done(function() {
                $("#success_msg").html("Data Save Successfully");
                // window.location.href = "{{ url('agents') }}";
                // location.reload();
            }).fail(function(data, textStatus, jqXHR) {
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" +
                        value +
                        "</span>");
                });
            });
        });



    });
</script>
