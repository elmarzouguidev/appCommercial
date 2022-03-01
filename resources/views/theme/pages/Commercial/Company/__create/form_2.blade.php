<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">{{ __('company.companies_add') }}</h4>
                <p class="card-title-desc">{{ __('company.form.title') }}</p>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form id="companyForm" action="{{ route('commercial:companies.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name">{{ __('company.form.company') }} *</label>
                                <input id="name" name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="website">{{ __('company.form.website') }} </label>
                                <input id="website" name="website" type="text"
                                    class="form-control @error('website') is-invalid @enderror"
                                    value="{{ old('website') }}">
                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="city">{{ __('company.form.city') }} *</label>
                                <input id="city" name="city" type="text"
                                    class="form-control @error('city') is-invalid @enderror"
                                    value="{{ old('city') }}">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telephone">{{ __('company.form.phone') }} </label>
                                <input id="telephone" name="telephone" type="text"
                                    class="form-control @error('telephone') is-invalid @enderror"
                                    value="{{ old('telephone') }}">
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email">{{ __('company.form.email') }}</label>
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
                                <label for="addresse">{{ __('company.form.addresse') }}</label>
                                <input id="addresse" name="addresse" type="text"
                                    class="form-control @error('addresse') is-invalid @enderror"
                                    value="{{ old('addresse') }}">
                                @error('addresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>{{ __('company.form.logo') }}</label>

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
                                        <label for="rc">{{ __('company.form.rc') }}</label>
                                        <input id="rc" name="rc" type="number"
                                            class="form-control @error('rc') is-invalid @enderror"
                                            value="{{ old('rc') }}">
                                        @error('rc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="ice">{{ __('company.form.ice') }} *</label>
                                        <input id="ice" name="ice" type="number"
                                            class="form-control @error('ice') is-invalid @enderror"
                                            value="{{ old('ice') }}">
                                        @error('ice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cnss">{{ __('company.form.cnss') }} *</label>
                                <input id="cnss" name="cnss" type="number"
                                    class="form-control @error('cnss') is-invalid @enderror"
                                    value="{{ old('cnss') }}">
                                @error('cnss')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="mb-3 col-sm-6">
                                        <label for="patente">{{ __('company.form.patente') }} *</label>
                                        <input id="patente" name="patente" type="number"
                                            class="form-control @error('patente') is-invalid @enderror"
                                            value="{{ old('patente') }}">
                                        @error('patente')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="if">{{ __('company.form.if') }} *</label>
                                        <input id="if" name="if" type="number"
                                            class="form-control @error('if') is-invalid @enderror"
                                            value="{{ old('if') }}">
                                        @error('if')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="mb-3 col-sm-6">
                                        <label for="prefix_invoice">{{ __('company.form.prefix_invoice') }}
                                            (FACTURE-)
                                        </label>
                                        <input id="prefix_invoice" name="prefix_invoice" type="text"
                                            class="form-control @error('prefix_invoice') is-invalid @enderror"
                                            value="{{ old('prefix_invoice') }}">
                                        @error('prefix_invoice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label
                                            for="invoice_start_number">{{ __('company.form.invoice_number_from') }}</label>
                                        <input id="invoice_start_number" name="invoice_start_number" type="text"
                                            class="form-control @error('invoice_start_number') is-invalid @enderror"
                                            value="{{ old('invoice_start_number') }}">
                                        @error('invoice_start_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-sm-6">
                                        <label for="prefix_invoice_avoir">Prefix de Facture D'avoir

                                        </label>
                                        <input id="prefix_invoice_avoir" name="prefix_invoice_avoir" type="text"
                                            class="form-control @error('prefix_invoice_avoir') is-invalid @enderror"
                                            value="">
                                        @error('prefix_invoice_avoir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="invoice_avoir_start_number">Numérotation des factures
                                            d'avoir</label>
                                        <input id="invoice_avoir_start_number" name="invoice_avoir_start_number"
                                            type="text"
                                            class="form-control @error('invoice_avoir_start_number') is-invalid @enderror"
                                            value="">
                                        @error('invoice_avoir_start_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-sm-6">
                                        <label for="prefix_estimate">{{ __('company.form.prefix_estimate') }}
                                            (DEVIS-)
                                        </label>
                                        <input id="prefix_estimate" name="prefix_estimate" type="text"
                                            class="form-control @error('prefix_estimate') is-invalid @enderror"
                                            value="{{ old('prefix_estimate') }}">
                                        @error('prefix_estimate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label
                                            for="estimate_start_number">{{ __('company.form.estimate_number_from') }}</label>
                                        <input id="estimate_start_number" name="estimate_start_number" type="text"
                                            class="form-control @error('estimate_start_number') is-invalid @enderror"
                                            value="{{ old('estimate_start_number') }}">
                                        @error('estimate_start_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!---------------------------------------------------------------------------->
                                    <div class="mb-3 col-sm-6">
                                        <label for="prefix_bcommand">prefix bcommand
                                            (BONC-)
                                        </label>
                                        <input id="prefix_bcommand" name="prefix_bcommand" type="text"
                                            class="form-control @error('prefix_bcommand') is-invalid @enderror"
                                            value="{{ old('prefix_bcommand') }}">
                                        @error('prefix_bcommand')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label
                                            for="bcommand_start_number">bcommand_start_number</label>
                                        <input id="bcommand_start_number" name="bcommand_start_number" type="text"
                                            class="form-control @error('bcommand_start_number') is-invalid @enderror"
                                            value="{{ old('bcommand_start_number') }}">
                                        @error('bcommand_start_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description">{{ __('company.form.description') }}</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                            rows="4" name="description">{{ old('description') }}</textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            {{ __('buttons.store') }}
                        </button>
                        {{-- <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button> --}}
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
