<div class="row">
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">Société *</label>
            <select name="company" class="form-control  @error('company') is-invalid @enderror" {{ $readOnly }}>
                <option value="{{ optional($invoice->company)->id }}">
                    {{ optional($invoice->company)->name }}
                </option>
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
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">Ticket </label>
            <select name="ticket"
                    class="form-control  @error('ticket') is-invalid @enderror" {{ $readOnly }}>
                <option value="{{ optional($invoice->ticket)->id }}">{{ optional($invoice->ticket)->code }}</option>

            </select>
            @error('ticket')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
</div>
