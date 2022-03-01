<div class="row">
    <div class="col-lg-6">
        <div class="mb-4">
            <label class="form-label">Société *</label>
            <select name="company" class="form-control  @error('company') is-invalid @enderror" readonly>
                <option value="{{ optional($command->company)->id }}" selected>
                    {{ optional($command->company)->name }}
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
            <label class="form-label">Fournisseur *</label>
            <select name="provider" class="form-control  @error('provider') is-invalid @enderror" readonly>
                <option value="{{ optional($command->provider)->id }}" selected>{{ optional($command->provider)->entreprise }}</option>
            </select>
            @error('provider')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>

</div>
