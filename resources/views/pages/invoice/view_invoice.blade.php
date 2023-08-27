    @extends('master')
    @section('content')
    @inject('InvoiceBilling','App\Models\Invoice\InvoiceBilling')
        <!-- start: page toolbar -->
        <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
            <div class="container-fluid">
              <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                  <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{url('')}}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{url('invoice')}}">Invoice</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Invoice #{{$invoice[0]->invoice_no}}</li>
                  </ol>
                </div>
              </div> <!-- .row end -->
              @include('layouts.frontend.today_statistics')
            </div>
          </div>
          <!-- start: page body -->

          @php
          $invoice_payment = get_invoice_payment($invoice[0]->invoice_no);
          @endphp

          <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
            <div class="container-fluid">
              <!-- Create invoice -->
              <div class="row g-3">

                   <form class="maskking-form" id="add_form">
                    <div class="col-12 text-center text-md-end">
            <button type="button" class="btn btn-lg btn-primary" onclick="window.print();return false"><i class="fa fa-print me-2"></i>Print Invoice</button>
          </div>
          <hr>
                <div class="col-12">
                    {{-- <input style="float: right" type="button" onclick="window.print();return false" value="print!" /> --}}



                    <div class="card print_invoice">
                    <div class="card-header border-bottom fs-4">
                      <h5 class="card-title mb-0">INVOICE INFORMATION</h5>
                    </div>
                    <div class="card-body">
                      <div class="card p-3">
                        <div class="border-bottom pb-2">

                            @include('layouts.frontend.includes.invoice_header')

                        </div>
                        <div style="clear:both"></div>
                      <div class="row">
                        <div class="col-6">
                          <span class="float-label" style="margin-top: 19px;">
<p style="margin: 0px">Client Name : {{$invoice[0]->client_name}}</p>
<p style="margin: 0px">Client Phone : {{$invoice[0]->client_phone}}</p>
<p style="margin: 0px">Client Address : {{$invoice[0]->client_address}}</p>
                              <!--<label class="form-label" for="TextInput">Client </label>-->
                          </span>

                          <input type="hidden" class="form-control form-control-lg" id="hiddenClientID"
                          name="invoice_client_id" value="{{$invoice[0]->client_id}}">
                      </div>
                      <div class="col-6">
                        <div class="customer mt-4">
                          <table class="meta">
                            <tbody>
                              <tr>
                                <td class="meta-head">Invoice No</td>
                                <td><p name="invoice_no" > {{$invoice[0]->invoice_no}}</p></td>
                              </tr>
                              <tr>
                                <td class="meta-head">Date</td>
                                <td><p id="invoice_date" > {{date('d-m-Y')}}</p></td>
                              </tr>
                              <tr>
                                <td class="meta-head">Amount Due</td>
                                <td>
                                  <div class="due" id="invoiceDue">{{$invoice[0]->invoice_net_total - $invoice_payment}}</div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      </div>
                        <div style="clear:both"></div>
                        <table class="items mb-4">
                          <tbody>
                            <tr>
                              <th>Product</th>
                              <th>Description</th>
                              <th>Vendor</th>
                              <th style="width: 140px;">Cost Price</th>
                              <th style="width: 140px;">Sale Price</th>
                              <th style="width: 70px;">Quantity</th>
                              <th style="width: 140px;">Unit Price</th>
                            </tr>
                            <div id="billingDetailsList">
                                <?php
                                $invoice_id = $invoice[0]->invoice_id;
                                $billings = $InvoiceBilling->invoice_billings($invoice_id);
                                $sl = 0;
                                        ?>
                                @foreach($billings as $row)
                                @php
                                   $sl++;
                                   $billing_product = $InvoiceBilling->invoice_billing_product($row->billing_product);
                                   $billing_vendor = $InvoiceBilling->invoice_billing_vendor($row->billing_vendor);
                                @endphp
                            <tr class="item-row billing-details-row">
                              <td class="item-name">
                                  <p>{{$billing_product->product_name}}</p>

                              </td>
                              <td class="description">
                                <p name="billing_description_{{$sl}}" readonly>{{$row->billing_description}}</p>
                              </td>

                              <td class="description">
                                <p name="billing_vendor_{{$sl}}" readonly>{{$billing_vendor->vendor_name}}</p>
                              </td>


                              <td><p class="cost" name="billing_cost_price_{{$sl}}" readonly>{{$row->billing_cost_price}}</p></td>
                              <td><p class="cost billing-unit-price billing-unit-price-{{$sl}}" data-row="{{$sl}}" name="billing_unit_price_{{$sl}}" readonly>{{$row->billing_unit_price}}</p></td>
                              <td><p class="qty billing-quantity billing-quantity-{{$sl}}" name="billing_quantity_{{$sl}}" data-row="{{$sl}}" readonly>{{$row->billing_quantity}}</p></td>
                              <td><p class="qty billing-single-total billing-total billing-total-{{$sl}}" data-row="{{$sl}}" name="billing_total_{{$sl}}" readonly>{{$row->billing_quantity * $row->billing_sale_price}}</p></td>
                              <input type="hidden" name="invoice_billing_id_{{$sl}}" value="{{$row->billing_id}}" readonly/>
                              <input type="hidden" name="billing_rows[]" value="{{$sl}}" readonly/>
                            </tr>
                            @endforeach
                        </div>
                          </tbody>
                        </table>

                            <table>
                                <tbody>

                            <tr>

                              <td colspan="10" width="80%" class="total-line text-right invoice-subtotal" style="text-align: right;border:0" readonly>Subtotal</td>
                              <td class="total-value">
                                <p style="margin-top: 0;margin-bottom: 0rem;">{{$invoice[0]->invoice_subtotal}}</p>
                               <!--<input type="number" name="invoice_subtotal" id="invoiceSubTotal" value="{{$invoice[0]->invoice_subtotal}}"  readonly>-->
                              </td>
                            </tr>
                            <tr>

                              <td colspan="10" class="total-line" style="text-align: right;border:0">Net Total</td>
                              <td class="total-value">
                                  <p style="margin-top: 0;margin-bottom: 0rem;">{{$invoice[0]->invoice_net_total}}</p>
                              </td>
                            </tr>

                            <tr>

                                <td colspan="10" class="total-line" style="text-align: right;border:0" readonly>Discount</td>
                                <td class="total-value">
                                      <p style="margin-top: 0;margin-bottom: 0rem;">{{$invoice[0]->invoice_discount}}</p>
                                  <!--<input type="number" class="invoice-discount" name="discount" id="discount" value="{{$invoice[0]->invoice_discount}}" >-->
                                </td>
                              </tr>
                                    @php
                                    $invoice_payment = get_invoice_payment($invoice[0]->invoice_no);
                                    @endphp

                            <tr>
                              <td colspan="10" class="total-line" style="text-align: right;border:0" readonly>Amount Paid</td>
                              <td class="total-value">
                                  <p style="margin-top: 0;margin-bottom: 0rem;">{{$invoice_payment}}</p>
                                <!--<input type="number" class="invoice-paid-amount" name="" id="paid_amount" value=""  readonly>-->
                              </td>
                            </tr>
                            <tr>

                              <td colspan="10" class="total-line balance" style="text-align: right;border:0" readonly>Balance Due</td>
                              <td class="total-value balance">
                                <div class="due">

                                    <p style="margin-top: 0;margin-bottom: 0rem;">{{$invoice[0]->invoice_net_total - $invoice_payment}}</p>
                                    <!--<input class="invoice-due" type="number" name="due_amount" id="due_amount" value=""  readonly>-->
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <div style="clear:both"></div>
                        <div class="footer-note mt-5">
                          <h5>Terms</h5>
                          <p>{{$invoice[0]->invoice_terms}}</p>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

              </form>

  <div id='checkMoneyReceipt'></div>



                <script type="text/javascript">



             $(document).on('click', '.addProductRow', function () {
              var billing_row = document.querySelectorAll('.billing-details-row').length + 1;
            var billing_content = ' <tr class="item-row billing-details-row">'+
                              '<td class="item-name">'+
                                ' <div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row">X Remove</a></div>'+
                                '<div class="col-12">'+
                                    '<select class="form-control form-control-lg custom-select" name="billing_product_' + billing_row + '">'+
                                            '<option value="" disabled selected>Select Product</option> '+
                                                '<option value="PASSPORT">Passport</option>'+
                                                '<option value="VISA">Visa</option>'+
                                                '<option value="MANPOWER">Man Power</option>'+
                                                '<option value="MEDICAL_TEST">Medical Test</option>'+
                                                '<option value="POLICE_CLEARENCE">Police Clearence</option>'+
                                                '<option value="TRAINING_CARD">Training Card</option>'+
                                        '</select>'+
                                        '</div>'+
                              '</td>'+
                              '<td class="description">'+
                               ' <textarea name="billing_description_'+billing_row+'"></textarea>'+
                             ' </td>'+
                              '<td class="description">'+
                               ' <textarea name="billing_vendor_'+billing_row+'"></textarea>'+
                            '  </td>'+
                             ' <td><textarea class="cost" name="billing_cost_price_'+billing_row+'"></textarea></td>'+
                             ' <td><textarea class="cost billing-unit-price billing-unit-price-' + billing_row + '" data-row="' + billing_row + '" name="billing_unit_price_'+billing_row+'"></textarea></td>'+
                             ' <td><textarea class="qty billing-quantity billing-quantity-' + billing_row + '" data-row="' + billing_row + '" name="billing_quantity_'+billing_row+'"></textarea></td>'+
                            '  <td><textarea class="qty billing-single-total billing-total billing-total-' + billing_row + '" data-row="' + billing_row + '" name="billing_total_'+billing_row+'" readonly></textarea></td>'+
                           ' </tr>' +
                    '<div style="clear:both"></div>' +
                    '<span class="remove-flight-row"><i class="fa fa-times"></i></span>' +
                    '<input type="hidden" name="billing_rows[]" value="'+billing_row+'" />' +
                    '</div>';

                    $('.items tr:last').after(billing_content);

                    });

        $(document).on('click', '.delete-wpr', function () {
        $(this).parent().parent().remove();
        })
                </script>


<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('keyup', '.billing-quantity', function(){
			var row_number = $(this).attr('data-row');
            // alert(row_number);
			$('.billing-total-'+row_number).val(get_product_price_total(row_number));
			$('#invoiceSubTotal').val(get_sub_total());
			$('#invoiceNetTotal').val(get_net_total());
      $('#due_amount').val(get_net_total());
      $('#invoiceDue').text(get_net_total());
		});
		$(document).on('keyup', '.unit-price', function(){
			var row_number = $(this).attr('data-row');
			$('.billing-total-'+row_number).val(get_product_price_total(row_number));
			$('#invoiceSubTotal').val(get_sub_total());
			$('#invoiceNetTotal').val(get_net_total());
      $('#due_amount').val(get_net_total());
      $('#invoiceDue').text(get_net_total());
		});

		$(document).on('keyup', '.invoice-discount', function(){
			$('#invoiceNetTotal').val(get_net_total());
      $('#due_amount').val(get_net_total());
      $('#invoiceDue').text(get_net_total());
		});
	});

	function get_product_price_total(row_number)
	{
		var unitPrice = $('.billing-unit-price-'+row_number).val();
        // alert(unitPrice);
		unitPrice=unitPrice.replace(/\,/g,'');
		unitPrice=parseInt(unitPrice,10);
		var unitPriceR = parseInt(unitPrice) || 0;

		var billingQnty = $('.billing-quantity-'+row_number).val();
		billingQnty=billingQnty.replace(/\,/g,'');
		billingQnty=parseInt(billingQnty,10);
		var billingQntyR = parseInt(billingQnty) || 0;

		var ticketClientPrice = parseInt(unitPriceR) * parseInt(billingQntyR);
		return parseInt(ticketClientPrice);
	}

	function get_sub_total()
	{
		var inputs_product_total = $('.billing-single-total');
		var unitPrice = 0;
		for(var i = 0; i < inputs_product_total.length; i++){
			var getValue = $(inputs_product_total[i]).val();
			var num = getValue.replace(/\,/g,'');
			num=parseInt(num,10);
			if (!isNaN(num)) {
				unitPrice += num;
			}
		}
		return parseInt(unitPrice);
	}

	function get_net_total()
	{
		var inputs_product_total = $('.billing-single-total');
		var unitPrice = 0;
		for(var i = 0; i < inputs_product_total.length; i++){

			var getValue = $(inputs_product_total[i]).val();
      // console.log(inputs_product_total[i]);
			var num = getValue.replace(/\,/g,'');
			num=parseInt(num,10);
			if (!isNaN(num)) {
				unitPrice += num;
			}
		}

		var invoiceDiscount = $('.invoice-discount').val();
		invoiceDiscount=invoiceDiscount.replace(/\,/g,'');
		invoiceDiscount=parseInt(invoiceDiscount,10);
		var invoiceDiscountR = parseInt(invoiceDiscount) || 0;

		var netTotal = parseInt(unitPrice) - invoiceDiscountR;
		return parseInt(netTotal);
	}

    $(document).ready(function() {
    $('#agentID').autocomplete({
            html: true,
            source: function (request, response) {
                $.ajax({
                    type: "GET",
                    url: "{{url('search-agent')}}",
                    dataType: "json",
                    data: {
                        q: request.term,
                    },
                    success: function (data) {
                        response(data.content);
                    }
                });
            },
            select: function (event, ui) {
                $(this).val(ui.item.label);
                $('#hiddenAgentID').val(ui.item.value);
                return false;
            },
            minLength: 1,
            open: function () {

                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function () {

                if( $('#hiddenClientId').val() == ''){
                    $(this).val('');
                    $('#hiddenClientId').val('');
                }
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });

        $('#searchClient').autocomplete({
            html: true,
            source: function (request, response) {
                $.ajax({
                    type: "GET",
                    url: "{{url('search-client-full-information')}}",
                    dataType: "json",
                    data: {
                        q: request.term,
                    },
                    success: function (data) {
                        response(data.content);
                    }
                });
            },
            select: function (event, ui) {
                $(this).val(ui.item.label);
                $('#hiddenClientID').val(ui.item.value);
                let showClient = '<textarea class="form-control address" disabled style="background:white;margin-top:10px">\nb'+ui.item.client_name + '\nb'+ui.item.value +'\nb'+ui.item.client_address + '\nb' + ui.item.client_phone+'</textarea>';

                $('#showClient').html(showClient);
                return false;
            },
            minLength: 1,
            open: function () {

                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function () {

                if( $('#hiddenClientId').val() == ''){
                    $(this).val('');
                    $('#hiddenClientId').val('');
                }
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });



        $('#searchDeligate').autocomplete({
            html: true,
            source: function (request, response) {
                $.ajax({
                    type: "GET",
                    url: "{{url('search-deligate')}}",
                    dataType: "json",
                    data: {
                        q: request.term,
                    },
                    success: function (data) {
                        response(data.content);
                    }
                });
            },
            select: function (event, ui) {
                $(this).val(ui.item.label);
                $('#hiddenDeligateID').val(ui.item.value);
                return false;
            },
            minLength: 1,
            open: function () {

                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function () {

                if( $('#hiddenClientId').val() == ''){
                    $(this).val('');
                    $('#hiddenClientId').val('');
                }
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });


    $('#searchSponser').autocomplete({
            html: true,
            source: function (request, response) {
                $.ajax({
                    type: "GET",
                    url: "{{url('search-sponser')}}",
                    dataType: "json",
                    data: {
                        q: request.term,
                    },
                    success: function (data) {
                        response(data.content);
                    }
                });
            },
            select: function (event, ui) {
                $(this).val(ui.item.label);
                $('#hiddenSponserID').val(ui.item.value);
                return false;
            },
            minLength: 1,
            open: function () {

                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function () {

                if( $('#hiddenSponserID').val() == ''){
                    $(this).val('');
                    $('#hiddenSponserID').val('');
                }
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
      });

    $("#add_form").submit(function(e) {
            e.preventDefault();
            $(".error_msg").html('');
            var data = new FormData($('#add_form')[0]);
//            console.log(data);
            var InvoiceId = $('#hiddenInvoiceID').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "{{ url('invoice') }}/"+InvoiceId,
                data: data,
//                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Invoice has been updated successfully.',
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,

                    });
                    $('#InvoiceButtonArea').hide();
                    $('#InvoiceSkipButtonArea').show();
                    $('#checkMoneyReceipt').html(data);
                }
            }).done(function() {
                $("#success_msg").html("Data Saved Successfully");
                // window.location.href = "{{ url('agents') }}";
                // location.reload();
            }).fail(function(data, textStatus, jqXHR) {
                $("#loader").hide();
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function(key, value) {
                    $("#" + key).after(
                        "<span class='error_msg' style='color: red;font-weigh: 600'>" + value +
                        "</span>");
                });
            });
        });
</script>
@endsection
