<form class="outer-repeater" id="clientForm" action="{{ route('admin:clients.createPost') }}"
      method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                <label for="entreprise">Entreprise *</label>
                <input id="entreprise" name="entreprise" type="text"
                       class="form-control @error('entreprise') is-invalid @enderror"
                       value="{{ old('entreprise') }}" required>
                @error('entreprise')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contact">Contact *</label>
                <input id="contact" name="contact" type="text"
                       class="form-control @error('contact') is-invalid @enderror"
                       value="{{ old('contact') }}" required>
                @error('contact')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="telephone">Telephone *</label>
                <input id="telephone" name="telephone" type="text"
                       class="form-control @error('telephone') is-invalid @enderror"
                       value="{{ old('telephone') }}" required>
                @error('telephone')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input id="email" name="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="addresse">Addresse *</label>
                <input id="addresse" name="addresse" type="text"
                       class="form-control @error('addresse') is-invalid @enderror"
                       value="{{ old('addresse') }}" required>
                @error('addresse')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="col-sm-12">
            <div class="mb-3">
                <label for="rc">RC</label>
                <input id="rc" name="rc" type="number"
                       class="form-control @error('rc') is-invalid @enderror" value="{{ old('rc') }}">
                @error('rc')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ice">ICE *</label>
                <input id="ice" name="ice" type="number"
                       class="form-control @error('ice') is-invalid @enderror"
                       value="{{ old('ice') }}" required>
                @error('ice')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button type="submit" class="btn btn-primary waves-effect waves-light">Enregistrer</button>
        {{-- <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button> --}}
    </div>
</form>
