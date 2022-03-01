<div class="row">
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">{{ __('invoice.form.company') }} *</label>
            <select wire:model="selectCompany" name="company" class="form-control @error('company') is-invalid @enderror"
                required>
                <option value="">Choisir</option>

                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" wire:key="{{ $loop->index }}">
                        {{ $company->name }}
                    </option>
                @endforeach

            </select>
            @error('company')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">{{ __('invoice.form.client') }} *</label>
            <select wire:model="selectClient" name="client" class="form-control  @error('client') is-invalid @enderror"
                required>
                <option value="">Choisir</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" wire:key="{{ $loop->index }}">{{ $client->entreprise }}
                    </option>
                @endforeach

            </select>
            {{-- <h1>{{ $selectClient }}</h1> --}}
            @error('client')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">Facture annulée *</label>
            <input type="text" class="form-control @error('invoice') is-invalid @enderror" name="invoice" value=""
                wire:model.defer="invoice">
            @error('invoice')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>

    <div class="docs-options">
        <label class="form-label">{{ __('invoice.form.number') }}</label>
        <div class="input-group mb-4">

            <span class="input-group-text" id="invoice_prefix">
                {{ $invoicePrefix }}
            </span>

            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code"
                value="" wire:model.defer="invoiceCode" aria-describedby="invoice_prefix" readonly>

            @error('invoice_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
