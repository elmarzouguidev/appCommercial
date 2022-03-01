<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Fournisseur</h4>
                <p class="card-title-desc">{{ __('company.form.title') }}</p>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form id="providerForm" action="{{ route('commercial:providers.update', $provider) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="entreprise">entreprise *</label>
                                <input id="entreprise" name="entreprise" type="text"
                                    class="form-control @error('entreprise') is-invalid @enderror"
                                    value="{{ $provider->entreprise }}" required>
                                @error('entreprise')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="contact">contact *</label>
                                <input id="contact" name="contact" type="text"
                                    class="form-control @error('contact') is-invalid @enderror"
                                    value="{{ $provider->contact }}" required>
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telephone">telephone *</label>
                                <input id="telephone" name="telephone" type="text"
                                    class="form-control @error('telephone') is-invalid @enderror"
                                    value="{{ $provider->telephone }}" required>
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">email</label>
                                <input id="email" name="email" type="text"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $provider->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="addresse">addresse</label>
                                <input id="addresse" name="addresse" type="text"
                                    class="form-control @error('addresse') is-invalid @enderror"
                                    value="{{ $provider->addresse }}" required>
                                @error('addresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>logo</label>

                                <input class="form-control @error('logo') is-invalid @enderror" name="logo" type="file"
                                    accept="image/*" />
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="mb-3 col-sm-6">
                                        <label for="rc">RC</label>
                                        <input id="rc" name="rc" type="number"
                                            class="form-control @error('rc') is-invalid @enderror"
                                            value="{{ $provider->rc }}">
                                        @error('rc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="ice">ICE</label>
                                        <input id="ice" name="ice" type="number"
                                            class="form-control @error('ice') is-invalid @enderror"
                                            value="{{ $provider->ice }}">
                                        @error('ice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description">{{ __('company.form.description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" rows="4" name="description">{{ $provider->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            {{ __('buttons.store') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
