 @extends('master')
 @inject('MoneyReciept', 'App\Models\MoneyReciept\MoneyReciept')
 @section('content')
     <!-- start: page body -->
     <div class="row">
         <div class="col-2"></div>
         <div class="col-8">
             <div class="card text-center p-2">
                 <div class="card-body">
                     <form method="POST" id="agent_reciept">
                         @csrf
                         <div class="row g-2">
                             <div class="col-8 mb-4">
                                 <h4>Create Agent Money Reciept</h4>
                             </div>
                             <div class="col-4 mb-4">
                                 <a class="btn btn-info text-white" href="{{ 'agent' }}">All Money Reciepts</a>
                             </div>

                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <span class="float-label">
                                         <input type="text" class="form-control form-control-lg" id="agentID"
                                             placeholder="Search Agent" name="agent_name">
                                         <label class="form-label" for="agentID">Search Agent </label>
                                     </span>
                                     <input type="hidden" id="hiddenAgentID" name="invoice_agent_id">
                                 </div>
                             </div>
                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <select class="form-control form-control-lg custom-select" name="account_get_select"
                                         id="account_get_select">
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
                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <div class="form-floating">
                                         <input readonly type="text" class="form-control text-danger" name="voucher_no"
                                             placeholder="First Name" value="{{ $MoneyReciept->generate_vouchar_no() }}">
                                         <label>Voucher No</label>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <div class="form-floating">
                                         <input type="number" class="form-control" name="amount" placeholder="First Name">
                                         <label>Amount</label>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <div class="form-floating">
                                         <input type="number" class="form-control" name="money_reciept_discount"
                                             placeholder="Discount">
                                         <label>Discount</label>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <div class="form-floating">
                                         <input type="date" class="form-control" data-row="1" name="money_reciept_date"
                                             id="money_reciept_date">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-8 col-md-8">
                                 <div class="form-floating">
                                     <div class="form-floating">
                                         <textarea name="money_reciept_note" id="money_reciept_note" class="form-control bg-light"></textarea>
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
             $('#agentID').autocomplete({
                 html: true,
                 source: function(request, response) {
                     $.ajax({
                         type: "GET",
                         url: "{{ url('search-agent') }}",
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
                     $('#hiddenAgentID').val(ui.item.value);
                     return false;
                 },
                 minLength: 1,
                 open: function() {

                     $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                 },
                 close: function() {

                     if ($('#hiddenClientId').val() == '') {
                         $(this).val('');
                         $('#hiddenClientId').val('');
                     }
                     $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                 }
             });

             $("#agent_reciept").submit(function(e) {
                 e.preventDefault();
                 $(".error_msg").html('');
                 var data = new FormData($('#agent_reciept')[0]);
                 $.ajax({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     method: "POST",
                     url: "{{ url('money-reciept-agent') }}",
                     data: data,
                     cache: false,
                     contentType: false,
                     processData: false,
                     success: function(data, textStatus, jqXHR) {

                         //alert(data);
                         Swal.fire({
                             position: 'top-end',
                             icon: 'success',
                             title: 'Money Reciept Created Successful',
                             showConfirmButton: false,
                             timer: 2000,
                             timerProgressBar: true,

                         });

                         window.location.href = "{{ url('money-reciept-agent') }}";


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
 @endsection
