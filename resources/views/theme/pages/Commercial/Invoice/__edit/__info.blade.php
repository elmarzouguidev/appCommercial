<div class="row">
    <div class="col-lg-6">
        <div class="mb-4">
            <label class="form-label">Client *</label>
            <select name="client" class="form-control  @error('client') is-invalid @enderror" {{ $readOnly }}>
                <option
                    value="{{ optional($invoice->client)->id }}">{{ optional($invoice->client)->entreprise }}</option>
            </select>
            @error('client')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <label class="form-label">Numéro de facture</label>
        <div class="input-group mb-4">

            <span class="input-group-text" id="invoice_prefix">
                {{ \ticketApp::invoicePrefix() }}
            </span>
            <input type="text" class="form-control @error('code') is-invalid @enderror"
                name="code" value="{{ $invoice->code }}" aria-describedby="invoice_prefix"
                readonly>
            @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
