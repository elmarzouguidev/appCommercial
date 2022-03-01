<div class="row">
    <div class="col-lg-6">
        <div class="mb-4">
            <label class="form-label">{{__('invoice.form.company')}} *</label>
            <select wire:model="selectCompany" name="company"
                class="form-control @error('company') is-invalid @enderror" required>
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
    <div class="col-lg-6">
        <div class="mb-4">
            <label class="form-label">Fournisseur *</label>
            <select  name="provider"
                class="form-control  @error('client') is-invalid @enderror" required>
                <option value="">Choisir</option>
                @foreach ($providers as $provider)
                    <option value="{{ $provider->id }}" wire:key="{{ $loop->index }}">{{ $provider->entreprise }}
                    </option>
                @endforeach

            </select>
            @error('client')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>

    <div class="docs-options">
        <label class="form-label">Numéro de bon</label>
        <div class="input-group mb-4">

            <span class="input-group-text" id="prefix_bcommand">
                {{ $bCommandPrefix }}
            </span>

            <input type="text" class="form-control @error('b_code') is-invalid @enderror" name="b_code"
                value="" wire:model.defer="bCommandCode" aria-describedby="prefix_bcommand" readonly>

            @error('b_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


</div>
