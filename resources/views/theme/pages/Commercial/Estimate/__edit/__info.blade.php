<div class="row">
    <div class="col-lg-6">
        <div class="mb-4">
            <label class="form-label">Client *</label>
            <select name="client" class="form-control  @error('client') is-invalid @enderror" readonly>
                    <option value="{{ optional($estimate->client)->id }}">{{ optional($estimate->client)->entreprise }}</option>
            </select>
            @error('client')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <label class="form-label">Numéro de Devis</label>
        <div class="input-group mb-4">

            <span class="input-group-text" id="estimate_prefix">
                {{ \ticketApp::estimatePrefix() }}
            </span>
            <input type="text" class="form-control @error('code') is-invalid @enderror"
                   name="code" value="{{ $estimate->code }}"
                   aria-describedby="estimate_prefix" readonly>
            @error('code')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
