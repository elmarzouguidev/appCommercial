<div class="row">
    <div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">Société *</label>
            <select name="company"
                class="form-control select2 @error('company') is-invalid @enderror">
                <option value="">Select</option>

                @foreach ($companies as $company)
                    <option value="{{ $company->id }}"
                        {{ strtolower($company->name) === 'casamaintenance' ? 'selected' : '' }}>
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
            <select name="client"
                class="form-control select2 @error('client') is-invalid @enderror">
                <option value="">Select</option>

                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->entreprise }}</option>
                @endforeach

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
            <select name="ticket"
                class="form-control select2 @error('ticket') is-invalid @enderror">
                <option value="">Select</option>

                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->entreprise }}</option>
                @endforeach

            </select>
            @error('ticket')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
</div>