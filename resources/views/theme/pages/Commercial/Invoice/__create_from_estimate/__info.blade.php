<div class="row">

    <div class="col-lg-6">
        <div class="mb-4">
            <label class="form-label">Client *</label>
            <select name="client" class="form-control @error('client') is-invalid @enderror" readonly>
                <option value="{{ optional($estimate->client)->id }}">{{ optional($estimate->client)->entreprise }}
                </option>
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
        @php
            $prefixer = optional(getDocument())->invoice_prefix;
            

            if (App\Models\Finance\Invoice::count() <= 0) {
                $invoiceCode = getDocument()->invoice_start;
            } else {
                $invoiceCode = App\Models\Finance\Invoice::max('code') + 1;

                $invoiceCode = str_pad($invoiceCode, 5, 0, STR_PAD_LEFT);

            }
        @endphp
        <div class="input-group mb-4">
            <span class="input-group-text" id="invoice_prefix">
                {{ $prefixer }}
            </span>
            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code"
                value="{{ $invoiceCode }}" aria-describedby="invoice_prefix" readonly>
            @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
