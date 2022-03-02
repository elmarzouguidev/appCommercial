<div class="row">
    <div class="col-lg-12">
        <form class="updateBill" id="updateBill" action="{{ route('commercial:bills.update',$bill->uuid) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">

                    <p class="card-title-desc">les information de Réglement</p>

                    <div class="row">
                        <div class="col-lg-6">

                            @include('theme.pages.Commercial.Bill.__edit.__info')

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Date de Facture</label>
                                        <div class="input-group">
                                            <input type="text" name="date_invoice"
                                                class="form-control @error('date_invoice') is-invalid @enderror"
                                                value="{{optional($bill->billable)->invoice_date->format('d-m-Y')}}"
                                                readonly >

                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            @error('date_invoice')
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
                                                class="form-control @error('date_due') is-invalid @enderror"
                                                name="date_due" value="{{ optional($bill->billable)->due_date->format('d-m-Y') }}"
                                            data-date-autoclose="true" readonly>
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            @error('date_due')
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

                            @include('theme.pages.Commercial.Bill.__edit.__info_bill')

                            <div class=" mb-4">
                                <label>Note d'administration</label>
                                <textarea name="notes" id="textarea"
                                    class="form-control @error('notes') is-invalid @enderror" maxlength="225"
                                    rows="5">{{$bill->notes}}</textarea>

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
