<div class="row">
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">Société *</label>
            <select name="company" class="form-control select2 @error('company') is-invalid @enderror" required>
                <option value="">Select</option>

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
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">Client *</label>
            <select name="client" class="form-control select2 @error('client') is-invalid @enderror" required>
                <option value="{{ optional($ticket->client)->id }}">{{ optional($ticket->client)->entreprise }}</option>

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
            <label class="form-label">Ticket *</label>
            <select name="ticket" class="form-control select2 @error('ticket') is-invalid @enderror" required>
                <option value="{{ $ticket->id }}">{{ $ticket->code }}</option>
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
    <label class="form-label">Numéro de Devis</label>
    <div class="input-group mb-4">

                                    <span class="input-group-text" id="estimate_prefix">
                                        {{ \ticketApp::estimatePrefix() }}
                                    </span>
        <input type="text" class="form-control @error('code') is-invalid @enderror"
               name="code" value=""
               aria-describedby="estimate_prefix" readonly>
        @error('code')
        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
        @enderror
    </div>
</div>
