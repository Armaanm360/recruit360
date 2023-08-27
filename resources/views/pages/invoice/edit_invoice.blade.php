    @extends('master')
    @section('content')
    @inject('InvoiceBilling','App\Models\Invoice\InvoiceBilling')
    @php
    $company = App\Models\Configuration\CompanyInfo::get_company_info();
    @endphp
        <!-- start: page toolbar -->
        <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
            <div class="container-fluid">
              <div class="row g-3 mb-3 align-items-center">
                <div class="col">
                  <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{url('')}}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{url('invoice')}}">Invoice</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Invoice</li>
                  </ol>
                </div>
              </div> <!-- .row end -->
              @include('layouts.frontend.today_statistics')
            </div>
          </div>
          <!-- start: page body -->

          <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
            <div class="container-fluid">
              <!-- Create invoice -->
              <div class="row g-3">

                   <form class="row maskking-form" id="add_form">
           @method("PUT")
                <div class="col-12">



                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">BASIC INFORMATION</h6>
                        </div>
                        <div class="card-body">

                                <div class="row">
                                <div class="col-3">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="agentName"
                                            placeholder="Search Agent" name="agent_name" value="{{$invoice[0]->agent_name}}">
                                        <label class="form-label" for="agentName">Search Agent </label>
                                    </span>
                                    <input type="hidden" id="hiddenAgentID" name="invoice_agent_id" value="{{$invoice[0]->agent_id}}">
                                    <input type="hidden" id="hiddenInvoiceID" name="invoice_id" value="{{$invoice[0]->invoice_id}}">
                                </div>

                                <div class="col-3">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="searchDeligate"
                                            placeholder="Search Deligate" name="deligate_name" @if($deligates) value="{{$deligates->deligate_name}}" @endif>
                                        <label class="form-label" for="searchDeligate">Search Delegate </label>
                                    </span>
                                    <input type="hidden" id="hiddenDeligateID" name="invoice_delegate_id" value="{{$invoice[0]->deligate_id}}">
                                </div>

                                <div class="col-3">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="searchSponser"
                                            placeholder="Search Sponser" name="sponser_name" value="{{$invoice[0]->sponsor_name}}">
                                        <label class="form-label" for="searchSponser">Sponser </label>
                                    </span>
                                    <input type="hidden" id="hiddenSponserID" name="invoice_sponsor_id" value="{{$invoice[0]->sponsor_id}}">
                                </div>

                                <div class="col-3">
                                    <span class="float-label">
                                        <input type="date" class="form-control form-control-lg" id="salesDate"
                                               name="invoice_sales_date" value="{{date('d-m-Y')}}">
                                        <label class="form-label" for="salesDate">Sales Date</label>
                                    </span>
                                </div>


                                </div>


                        </div>
                    </div>


                 <br>
                 <hr>


                    <div class="card print_invoice">
                    <div class="card-header border-bottom fs-4">
                      <h5 class="card-title mb-0">INVOICE INFORMATION</h5>
                    </div>
                    <div class="card-body">
                      <div class="card p-3">
                        <div class="border-bottom pb-2">
                            <div class="col-6">
                                <span class="float-label">
                                    <input type="text" class="form-control form-control-lg" id="searchClient"
                                        placeholder="Search Client" name="client_name" value="{{$invoice[0]->client_name}}">
                                    <label class="form-label" for="TextInput">Client </label>
                                </span>
                                <input type="hidden" class="form-control form-control-lg" id="hiddenClientID"
                                name="invoice_client_id" value="{{$invoice[0]->client_id}}">
                            </div>
                            <div id="showClient"></div>

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
                        <div style="clear:both"></div>
                        <div class="customer mt-4">
                          <table class="meta">
                            <tbody>
                              <tr>
                                <td class="meta-head">Invoice No</td>
                                <td><textarea class="form-control" name="invoice_no">{{$invoice[0]->invoice_no}}</textarea></td>
                              </tr>
                              <tr>
                                <td class="meta-head">Date</td>
                                <td><textarea class="form-control" id="invoice_date">{{date('d-m-Y')}}</textarea></td>
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
                              <th>Select Product</th>
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
                                @endphp
                            <tr class="item-row billing-details-row">
                              <td class="item-name">
                                <div class="col-12">

                                    <select class="form-control form-control-lg custom-select"
                                                                name="billing_product_{{$sl}}"">
                                                                <option value="" disabled selected>
                                                                    Select Product
                                                                </option>
                                                                @foreach ($product_list as $item)
                                                                    <option value="{{$item->product_id}}" @if($item->product_id == $row->billing_product) selected @endif>{{$item->product_name}}</option>
                                                                @endforeach
                                                                {{-- <option value="PASSPORT">Passport</option>
                                                                <option value="VISA">Visa</option>
                                                                <option value="MANPOWER">Man Power</option>
                                                                <option value="MEDICAL_TEST">Medical Test</option>
                                                                <option value="POLICE_CLEARENCE">Police Clearence
                                                                </option>
                                                                <option value="TRAINING_CARD">Training Card</option> --}}
                                        </select>

                                        {{-- <select class="form-control form-control-lg custom-select" name="billing_product_{{$sl}}">
                                            <option value="" disabled >
                                                Select Product
                                            </option>
                                            <option value="PASSPORT" @if($row->product == "PASSPORT") selected @endif>Passport</option>
                                                <option value="VISA" @if($row->product == "VISA") selected @endif>Visa</option>
                                                <option value="MANPOWER" @if($row->product == "MANPOWER") selected @endif>Man Power</option>
                                                <option value="MEDICAL_TEST" @if($row->product == "MEDICAL_TEST") selected @endif>Medical Test</option>
                                                <option value="POLICE_CLEARENCE" @if($row->product == "POLICE_CLEARENCE") selected @endif>Police Clearence</option>
                                                <option value="TRAINING_CARD" @if($row->product == "TRAINING_CARD") selected @endif>Training Card</option>
                                        </select> --}}

                                </div>
                              </td>
                              <td class="description">
                                <textarea name="billing_description_{{$sl}}">{{$row->billing_description}}</textarea>
                              </td>

                              {{-- <td class="description">
                                <textarea name="billing_vendor_{{$sl}}">{{$row->billing_vendor}}</textarea>
                              </td> --}}

                              <td class="description">
                                <span class="float-label">
<input type="text" class="form-control vendor vendor-data-{{$sl}} form-control-lg" id="vendorID" placeholder="Search Vendor">
                                    <label class="form-label" for="vendorID">Search Vendor</label>
                                </span>
            <input type="hidden" class="vendor-data-{{$sl}}" id="hiddenVendorID_{{$sl}}" data-row="1" name="billing_vendor_{{$sl}}" value="{{$row->billing_vendor}}">
                            </td>


                              <td><textarea class="cost" name="billing_cost_price_{{$sl}}">{{$row->billing_cost_price}}</textarea></td>
                              <td><textarea class="cost billing-unit-price billing-unit-price-{{$sl}}" data-row="{{$sl}}" name="billing_unit_price_{{$sl}}">{{$row->billing_unit_price}}</textarea></td>
                              <td><textarea class="qty billing-quantity billing-quantity-{{$sl}}" name="billing_quantity_{{$sl}}" data-row="{{$sl}}">{{$row->billing_quantity}}</textarea></td>
                              <td><textarea class="qty billing-single-total billing-total billing-total-{{$sl}}" data-row="{{$sl}}" name="billing_total_{{$sl}}" readonly>{{$row->billing_quantity * $row->billing_sale_price}}</textarea></td>
                              <input type="hidden" name="invoice_billing_id_{{$sl}}" value="{{$row->billing_id}}" />
                              <input type="hidden" name="billing_rows[]" value="{{$sl}}" />
                            </tr>
                            @endforeach
                        </div>
                          </tbody>
                        </table>

                            <table>
                                <tbody>
                            <tr id="hiderow">
                              <td colspan="5"><a id="addProductRow" class="addProductRow" href="javascript:;" title="Add a row">Add a row</a></td>
                            </tr>
                            <tr>

                              <td colspan="10" width="80%" class="total-line text-right invoice-subtotal" style="text-align: right;border:0">Subtotal</td>
                              <td class="total-value">

                               <input type="number" name="invoice_subtotal" id="invoiceSubTotal" value="{{$invoice[0]->invoice_subtotal}}"  readonly>
                              </td>
                            </tr>
                            <tr>

                              <td colspan="10" class="total-line" style="text-align: right;border:0">Net Total</td>
                              <td class="total-value">
                                <input type="number" class="invoice-net-total" name="invoice_net_total" id="invoiceNetTotal" value="{{$invoice[0]->invoice_net_total}}"  readonly>
                              </td>
                            </tr>

                            <tr>

                                <td colspan="10" class="total-line" style="text-align: right;border:0">Discount</td>
                                <td class="total-value">
                                  <input type="number" class="invoice-discount" name="discount" id="discount" value="{{$invoice[0]->invoice_discount}}" >
                                </td>
                              </tr>


                            <tr>
                              <td colspan="10" class="total-line" style="text-align: right;border:0">Amount Paid</td>
                              <td class="total-value">
                                <!--<input type="number" class="invoice-paid-amount" name="" id="paid_amount" value=""  readonly>-->
                              </td>
                            </tr>
                            <tr>

                              <td colspan="10" class="total-line balance" style="text-align: right;border:0">Balance Due</td>
                              <td class="total-value balance">
                                <div class="due">
                                    <input class="invoice-due" type="number" name="due_amount" id="due_amount" value=""  readonly>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <div style="clear:both"></div>
                        <div class="footer-note mt-5">
                          <h5>Terms</h5>
                          <textarea name="invoice_terms" class="form-control bg-light"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>



                <div class="col-12 text-center text-md-end" id="InvoiceButtonArea">
                  <button type="submit" class="btn btn-lg btn-primary" ><i class="fa fa-print me-2"></i>Update Invoice</button>
                  <button type="button" class="btn btn-lg btn-secondary"><i class="fa fa-envelope me-2"></i>Send PDF</button>
                </div>

                  <div class="col-12 text-center text-md-end" id="InvoiceSkipButtonArea" style="display: none">
                  <a type="button" class="btn btn-lg btn-secondary" href="{{url('invoice/'.$invoice[0]->invoice_id)}}"><i class="fa fa-envelope me-2"></i>SKIP MONEY RECEIPT</a>
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
                                    '<select class="form-control form-control-lg custom-select" name="billing_product_'+billing_row +
                '">' +
                '<option value="" disabled selected>Select Product</option> ' +
                '@foreach ($product_list as $item)' +
                '<option value="{{$item->product_id}}">{{$item->product_name}}</option>' +
                '@endforeach' +
                '</select>' +
                                        '</div>'+
                              '</td>'+
                              '<td class="description">'+
                               ' <textarea name="billing_description_'+billing_row+'"></textarea>'+
                             ' </td>'+
                             '<td class="description">' +
                            ' <span class="float-label">' +
                            ' <input type="text" class="form-control vendor vendor-data-'+billing_row + ' form-control-lg" data-row = "'+ billing_row +'" id="vendorID" placeholder="Search Vendor">' +
                            ' </span>' +
                            ' <input type="hidden" class="vendor-data-'+billing_row + '" id="hiddenVendorID_'+billing_row + '" data-row="'+billing_row + '" name="billing_vendor_'+billing_row + '">' +
                            '  </td>' +
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

                    $('.vendor').autocomplete({
                        html: true,
                        source: function(request, response) {
                            $.ajax({
                                type: "GET",
                                url: "{{ url('search-vendors') }}",
                                dataType: "json",
                                data: {
                                    q: request.term,
                                },
                                success: function(data) {
                                    response(data.content);
                                }
                            });
                        },select: function(event, ui) {
                            $(this).val(ui.item.label);
                            $('#hiddenVendorID_'+$(this).data('row')).val(ui.item.value);
                            return false;
                        },
                        minLength: 1,
                        open: function() {

                            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                        },
                        close: function() {

                            if ($('#hiddenVendorID_'+$(this).data('row')).val() == '') {
                                $(this).val('');
                                $('#hiddenVendorID_'+$(this).data('row')).val('');
                            }
                            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                        }
                    });

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
