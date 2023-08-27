 @extends('master')
 @inject('MoneyReciept', 'App\Models\MoneyReciept\MoneyReciept')
 @section('content')
     <!-- start: page body -->
     <div class="row">
         <div class="col-2"></div>
         <div class="col-8">
             <div class="card text-center p-2">
                 <div class="card-body">
                     <form method="POST" id="sponsor_reciept">
                         @csrf
                         @method('PUT')
                         <div class="row g-2">
                             <div class="col-8 mb-4">
                                 <h4>Edit Sponsor Money Reciept</h4>
                             </div>
                             <div class="col-4 mb-4">
                                 <a class="btn btn-info text-white" href="{{ route('money-reciept-sponsor.index') }}">All
                                     Money
                                     Reciepts</a>
                             </div>

                             <input type="hidden" id="money_reciept_id" name="money_reciept_id"
                                 value="{{ $reciept->money_reciept_id }}">

                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <span class="float-label">
                                         <input type="text" class="form-control form-control-lg" id="sponsorID"
                                             placeholder="Search Sponsor" name="sponsor_name"
                                             value="{{ $reciept->sponsor_name }}">
                                         <label class="form-label" for="sponsorID">Search Sponsor</label>
                                     </span>
                                     <input type="hidden" id="hiddenSponsorID" name="invoice_sponsor_id">
                                     <input type="hidden" id="" name="sponsor_transaction_id"
                                         value="{{ $reciept->sponsor_transaction_id }}">
                                     <input type="hidden" id="" name="transaction_id"
                                         value="{{ $reciept->transaction_id }}">
                                 </div>
                             </div>
                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <select class="form-control form-control-lg custom-select" name="account_get_select"
                                         id="account_get_select">
                                         <option value="" disabled selected>
                                             {{ __('Select Account') }}
                                         </option>
                                         @foreach ($account as $account)
                                             @if ($reciept->account_name == $account->account_name)
                                                 <option value="{{ $reciept->account_id }}" selected>
                                                     {{ $reciept->account_name }}
                                                 </option>
                                             @else
                                                 <option value="{{ $account->account_id }}">
                                                     {{ $account->account_name }}
                                                 </option>
                                             @endif
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <div class="form-floating">
                                         <input readonly type="text" class="form-control text-danger" name="voucher_no"
                                             placeholder="Voucher" value="{{ $reciept->money_reciept_voucher_no }}">
                                         <label>Voucher No</label>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <div class="form-floating">
                                         <input type="number" class="form-control" name="amount" placeholder="Amount"
                                             value="{{ $reciept->money_reciept_total_amount }}">
                                         <label>Amount</label>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <div class="form-floating">
                                         <input type="number" class="form-control" name="money_reciept_discount"
                                             placeholder="Discount" value="{{ $reciept->money_reciept_total_discount }}">
                                         <label>Discount</label>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <div class="form-floating">
                                         <input type="date" class="form-control" data-row="1" name="money_reciept_date"
                                             id="money_reciept_date" value="{{ $reciept->money_reciept_payment_date }}">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <div class="form-floating">
                                         <label class="form-label" for="money_reciept_note">Note</label>
                                         <textarea name="money_reciept_note" id="money_reciept_note" class="form-control bg-light">{{ $reciept->money_reciept_note }}</textarea>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <button class="btn btn-lg btn-secondary text-uppercase" type="button"
                                     data-bs-dismiss="modal">Close</button>
                                 <button class="btn btn-lg btn-primary text-uppercase" type="Submit">Create Money
                                     Reciept</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <div class="col-2"></div>
     </div>





     <script type="text/javascript">
         $(document).ready(function() {
             $('#sponsorID').autocomplete({
                 html: true,
                 source: function(request, response) {
                     $.ajax({
                         type: "GET",
                         url: "{{ url('search-sponsor') }}",
                         dataType: "json",
                         data: {
                             q: request.term,
                         },
                         success: function(data) {
                             response(data.content);
                         }
                     });
                 },
                 select: function(event, ui) {
                     $(this).val(ui.item.label);
                     $('#hiddenSponsorID').val(ui.item.value);
                     return false;
                 },
                 minLength: 1,
                 open: function() {

                     $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                 },
                 close: function() {

                     if ($('#hiddenSponsorId').val() == '') {
                         $(this).val('');
                         $('#hiddenSponsorId').val('');
                     }
                     $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                 }
             });

             // sponsor_reciept

             $("#sponsor_reciept").submit(function(e) {
                 e.preventDefault();
                 $(".error_msg").html('');
                 var data = new FormData($('#sponsor_reciept')[0]);
                 let money_reciept_voucher_no = $("[name=voucher_no]").val();
                 $.ajax({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     method: "POST",
                     url: "{{ url('money-reciept-sponsor') }}/" + money_reciept_voucher_no,
                     data: data,
                     cache: false,
                     contentType: false,
                     processData: false,
                     success: function(data, textStatus, jqXHR) {
                         Swal.fire({
                             position: 'top-end',
                             icon: 'success',
                             title: 'Money Reciept Updated Successful',
                             showConfirmButton: false,
                             timer: 2000,
                             timerProgressBar: true,

                         });
                         // window.location.href = "{{ url('money-reciept-sponsor') }}";
                         //$('#expense_form')[0].reset();
                     }
                 }).done(function() {
                     $("#success_msg").html("Data Save Successfully");
                     // window.location.href = "{{ url('sponsors') }}";
                     // 
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
 @endsection
