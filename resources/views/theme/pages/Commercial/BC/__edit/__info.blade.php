<div class="row">

    <div class="col-lg-12">
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
