<div class="row">

    <div class="col-lg-6">
        <div class="mb-4">
            <label class="form-label">Client *</label>
            <select name="client" class="form-control  @error('client') is-invalid @enderror" readonly>
                    <option value="{{ optional($invoice->client)->id }}">{{ optional($invoice->client)->entreprise }}</option>
            </select>
            @error('client')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-4">
            <label class="form-label">Facture annulée *</label>
            <input type="text" class="form-control @error('invoice_number') is-invalid @enderror" name="invoice_number"
              value="{{$invoice->invoice_number}}"     required readonly>
            @error('invoice_number')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
</div>

<div class="docs-options">
    <label class="form-label">Numéro de facture avoir *</label>
    <div class="input-group mb-4">

        <input type="text" class="form-control @error('code') is-invalid @enderror"
               name="code" value="{{$invoice->full_number}}"
               aria-describedby="invoice_prefix" readonly>
        @error('code')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
