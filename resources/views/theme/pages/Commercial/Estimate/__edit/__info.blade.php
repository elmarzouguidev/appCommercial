<div class="row">
    <div class="col-lg-6">
        <div class="mb-4">
            <label class="form-label">Société *</label>
            <select name="company" class="form-control @error('company') is-invalid @enderror" readonly>
                    <option value="{{ optional($estimate->company)->id }}">
                        {{ optional($estimate->company)->name }}
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
    {{--<div class="col-lg-4">
        <div class="mb-4">
            <label class="form-label">Ticket *</label>
            <select name="ticket"
                class="form-control select2 @error('ticket') is-invalid @enderror">
                <option value="">Select</option>

            </select>
            @error('ticket')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>--}}

</div>
