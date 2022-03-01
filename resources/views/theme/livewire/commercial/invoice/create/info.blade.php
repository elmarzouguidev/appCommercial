<div class="row">

    <div class="col-lg-4" wire:ignore>
        <div class="mb-4">
            <label class="form-label">{{__('invoice.form.company')}} *</label>
            <select name="company" id="selectcompany"
                    class="form-control select2 @error('company') is-invalid @enderror" required>
                <option value="">Choisir</option>

                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">
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

    <div class="col-lg-4" wire:ignore>
        <div class="mb-4">
            <label class="form-label">{{__('invoice.form.client')}} *</label>

            <select name="client" id="selectclient"
                    class="form-select @error('client') is-invalid @enderror" required>
                @if(isset($ticket))
                    <option
                        value="{{ optional($ticket->client)->id }}">{{ optional($ticket->client)->entreprise }}</option>
                @else
                    <option value="">Choisir</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->entreprise }}
                        </option>
                    @endforeach
                @endif

            </select>

            @error('client')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>

    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">{{__('invoice.form.ticket')}} *</label>
            <select name="ticket" id="selectticket"
                    class="form-select select2 @error('ticket') is-invalid @enderror">
                @if(isset($ticket))
                    <option value="{{ $ticket->id }}">{{ $ticket->code }}</option>
                @else
                    <option value="">Choisir</option>
                    @foreach ($tickets as $ticket)
                        <option value="{{ $ticket->id }}">{{ $ticket->code }}
                        </option>
                    @endforeach
                @endif

            </select>
            @error('ticket')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>

    <div class="docs-options">
        <label class="form-label">{{__('invoice.form.number')}}</label>
        <div class="input-group mb-4">

            <span class="input-group-text" id="invoice_prefix">
                {{ $invoicePrefix }}
            </span>

            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code"
                   value="" wire:model.defer="invoiceCode" aria-describedby="invoice_prefix" readonly>

            @error('code')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


</div>
