<div class="row">
    <div class="col-lg-6" wire:ignore>
        <div class="mb-4">
            <label class="form-label">{{__('invoice.form.client')}} *</label>
            <select  name="client" id="selectclient"
                    class="form-control @error('client') is-invalid @enderror" required>
                <option value="">Choisir</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->entreprise }}
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

    <div class="col-lg-6">
        <label class="form-label">{{__('estimate.form.number')}}</label>
        <div class="input-group mb-4">

            <span class="input-group-text" id="estimate_prefix">
                {{ $estimatePrefix }}
            </span>

            <input type="text" class="form-control @error('estimate_code') is-invalid @enderror" name="estimate_code"
                   value="" wire:model.defer="estimateCode" aria-describedby="estimate_prefix" readonly>

            @error('estimate_code')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


</div>
