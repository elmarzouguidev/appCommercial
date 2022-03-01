<div class="row">
    <div class="col-lg-12">
        <form class="addBill" id="addBiller" action="{{ route('commercial:bills.storeBill',$invoice->uuid) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">

                    <p class="card-title-desc">les information de Réglement</p>

                    <div class="row">
                        <div class="col-lg-6">

                            @include('theme.pages.Commercial.Bill.__create.__info')

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Date de Facture</label>
                                        <div class="input-group">
                                            <input type="text" name="invoice_date"
                                                class="form-control @error('invoice_date') is-invalid @enderror"
                                                value="{{$invoice->invoice_date}}"
                                                readonly >

                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            @error('invoice_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label> Date d'échéance</label>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('due_date') is-invalid @enderror"
                                                name="due_date" value="{{ $invoice->due_date }}"
                                            data-date-autoclose="true" readonly>
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            @error('due_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">

                            @include('theme.pages.Commercial.Bill.__create.__info_bill')

                            <div class=" mb-4">
                                <label>Note d'administration</label>
                                <textarea name="notes" id="textarea"
                                    class="form-control @error('notes') is-invalid @enderror" maxlength="225"
                                    rows="5"></textarea>

                                @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2 justify-content-end mb-4">
                <div class="">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                        {{__('buttons.store')}}
                    </button>
                    <button type="submit" class="btn btn-secondary waves-effect waves-light">
                        {{__('buttons.store_draft')}}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
