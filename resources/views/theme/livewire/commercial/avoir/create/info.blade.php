<div>
    <div class="row">
        <div class="col-lg-6" wire:ignore>
            <label class="form-label">Facture annulée *</label>
            <select class="form-control" name="invoice_number" id="selectavoir">

                <optgroup label="Factures">
                    <option value=""></option>
                    @foreach ($invoices as $invoice)
                        <option value="{{ $invoice->id }}">
                            {{ $invoice->code }}
                        </option>
                    @endforeach
                </optgroup>
            </select>
            @error('invoice_number')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-lg-6">
            <div class="mb-4">
                <label class="form-label">Client *</label>
                <select  name="client"
                        class="form-control  @error('client') is-invalid @enderror" required readonly>
                    <option value="{{isset($client) ? $client->id:''}}">{{isset($client) ? $client->entreprise:''}}</option>
                </select>
                @error('client')
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

        <span class="input-group-text" id="invoice_prefix">
            {{ getDocument()->invoice_avoir_prefix }}
        </span>
            <input type="text" class="form-control @error('code') is-invalid @enderror"
                   name="code" value="{{$avoirNumber}}"
                   aria-describedby="invoice_prefix" readonly>
            @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
