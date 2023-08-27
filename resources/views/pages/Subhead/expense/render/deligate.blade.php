                            <form class="row g-3 maskking-form" id="expense_form">
                                @csrf
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="text" class="form-control form-control-lg" id="tags"
                                            placeholder="Client">
                                        <input type="hidden" class="form-control form-control-lg" id="hiddenClientId"
                                            placeholder="Client" name="client">
                                        <label class="form-label" for="client_id">Deligate Name</label>
                                    </span>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="form-group float-label">
                                        <select class="form-control form-control-lg custom-select" name="expense_head"
                                            id="expense_head">
                                            <option value="" disabled selected>
                                                {{ __('Select Expense Head') }}
                                            </option>
                                            {{-- @foreach ($head as $head)
                 <option value="{{ $head->head_id }}">{{ $head->head_name }}
                 </option>
             @endforeach --}}
                                        </select>
                                        <span>Expense Head</span>
                                    </label>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <label class="form-group float-label">
                                        <select class="form-control form-control-lg custom-select"
                                            name="expense_sub_head" id="expense_sub_head">
                                        </select>
                                        <span>Expense Sub Head</span>
                                    </label>

                                    <input type="hidden" name="expense_sub_head_name" id="expense_sub_head_name">
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <input type="number" class="form-control form-control-lg" id="expense_amount"
                                            placeholder="Amount" name="expense_amount">
                                        <label class="form-label" for="NidInput">Expense Amount</label>
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <span class="float-label">
                                        <textarea name="expense_note" cols="10" rows="3" class="form-control form-control-lg" placeholder="Note"></textarea>
                                        <label class="form-label" for="PhoneInput">Note</label>
                                    </span>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
