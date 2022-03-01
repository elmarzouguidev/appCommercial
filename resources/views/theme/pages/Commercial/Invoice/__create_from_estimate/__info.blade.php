<div class="row">
    <div class="col-lg-6">
        <div class="mb-4">
            <label class="form-label">Société *</label>
            <select name="company" class="form-control  @error('company') is-invalid @enderror" readonly>
                <option value="{{ optional($estimate->company)->id }}">
                    {{ optional($estimate->company)->name }}
                </option>
            </select>
            @error('company')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-4">
            <label class="form-label">Client *</label>
            <select name="client" class="form-control @error('client') is-invalid @enderror" readonly>
                <option
                    value="{{ optional($estimate->client)->id }}">{{ optional($estimate->client)->entreprise }}</option>
            </select>
            @error('client')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    {{--<div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">Ticket *</label>
            <select name="ticket"
                class="form-control select2 @error('ticket') is-invalid @enderror">
                <option value="">Select</option>

            </select>
            @error('ticket')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>--}}

</div>

<div class="docs-options">
    <label class="form-label">Numéro de facture</label>
    @php
        //$invoiceCode = str_pad(optional($estimate->company->invoices)->max('code') + 1, 5, 0, STR_PAD_LEFT);
        $prefixer = optional($estimate->company)->prefix_invoice;

           if ($estimate->company->invoices->count() <= 0) {

                $invoiceCode = str_pad($estimate->company->invoice_start_number, 5, 0, STR_PAD_LEFT);
            } else {

                $invoiceCode = str_pad(optional($estimate->company->invoices)->max('code') + 1, 5, 0, STR_PAD_LEFT);
            }

    @endphp
    <div class="input-group mb-4">
       <span class="input-group-text" id="invoice_prefix">
           {{ $prefixer }}
       </span>
        <input type="text" class="form-control @error('code') is-invalid @enderror"
               name="code" value="{{ $invoiceCode }}"
               aria-describedby="invoice_prefix" readonly>
        @error('code')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
