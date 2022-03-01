<div class="row">
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">Société *</label>

            <input type="text" name="company" class="form-control @error('company') is-invalid @enderror"
                value="{{ optional($bill->billable->company)->name }}" readonly>
            @error('company')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">Client *</label>
            <input type="text" name="client" class="form-control @error('client') is-invalid @enderror"
            value="{{ optional($bill->billable->client)->entreprise }}" readonly>
            @error('client')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">Ticket *</label>
            <input type="text" name="ticket" class="form-control @error('ticket') is-invalid @enderror"
            value="{{ optional($bill->billable->ticket)->code }}" readonly>
            @error('ticket')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
</div>
<div class="docs-options">
    <label class="form-label">Numéro de facture</label>
    <div class="input-group mb-4">

        <span class="input-group-text" id="invoice_prefix">
            {{ optional($bill->billable)->prefix_invoice }}
        </span>
        <input type="text" class="form-control @error('invoice_code') is-invalid @enderror" name="invoice_code"
            value="{{ optional($bill->billable)->full_number }}" aria-describedby="invoice_prefix" readonly>
        @error('invoice_code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
