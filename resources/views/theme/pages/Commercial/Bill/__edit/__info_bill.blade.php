<div class="row">
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label"> Montant reçu *</label>

            <input type="text" name="price_total" class="form-control @error('price_total') is-invalid @enderror"
                value="{{ optional($bill->billable)->formated_price_total }}" max="{{ optional($bill->billable)->price_total }}" readonly>
            @error('price_total')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">* Date de règlement *</label>

            <div class="input-group" id="datepicker1">
                <input type="text" name="bill_date" class="form-control @error('bill_date') is-invalid @enderror"
                    value="{{ $bill->bill_date->format('Y-m-d') }}" data-date-format="yyyy-mm-dd" data-date-container='#datepicker1'
                    data-provide="datepicker">

                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                @error('bill_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">Mode de règlement *</label>
            <select name="bill_mode" class="form-control select2 @error('bill_mode') is-invalid @enderror">
                <option value="espece" {{ $bill->bill_mode === 'espece' ? 'selected' : '' }}>Espèce</option>
                <option value="virement" {{ $bill->bill_mode === 'virement' ? 'selected' : '' }}>Virement</option>
                <option value="cheque" {{ $bill->bill_mode === 'cheque' ? 'selected' : '' }}>Chèque</option>
            </select>
            @error('ticket')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
</div>
<div class="docs-options">
    <label class="form-label">Référence de transaction</label>
    <div class="input-group mb-4">

        <input type="text" class="form-control @error('reference') is-invalid @enderror" name="reference" value="{{$bill->reference}}"
            aria-describedby="ref">
        @error('reference')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
