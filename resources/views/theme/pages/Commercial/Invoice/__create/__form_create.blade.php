<div class="row">

    <div class="col-lg-12">
        <form class="repeater" action="{{ route('commercial:invoices.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">

                    <p class="card-title-desc">{{ __('invoice.form.title') }}</p>

                    <div class="row">
                        <div class="col-lg-6">

                            @livewire('commercial.invoice.create.info')

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>{{ __('invoice.form.date_invoice') }}</label>
                                        <div class="input-group" id="datepicker1">
                                            <input type="text" name="invoice_date"
                                                class="form-control @error('invoice_date') is-invalid @enderror"
                                                data-date-format="yyyy-mm-dd" value="{{ now()->format('Y-m-d') }}"
                                                data-date-container='#datepicker1' data-provide="datepicker">

                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            @error('invoice_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label> {{ __('invoice.form.date_due') }}</label>
                                        <div class="input-group" id="datepicker2">
                                            <input type="text"
                                                class="form-control @error('due_date') is-invalid @enderror"
                                                name="due_date" value="{{ \ticketApp::invoiceDueDate() }}"
                                                data-date-format="yyyy-mm-dd" data-date-container='#datepicker2'
                                                data-provide="datepicker" data-date-autoclose="true">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            @error('due_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @include('theme.pages.Commercial.Invoice.__create.b_info')

                        </div>

                        <div class="col-lg-6">
                            <div class="templating-select mb-4">
                                <label class="form-label">{{ __('invoice.form.payment_method') }}</label>
                                <select name="payment_method"
                                    class="form-control select2-templating @error('payment_method') is-invalid @enderror">

                                    <option value="espece">{{ __('invoice.form.paympent_method_espece') }}</option>
                                    <option value="virement" selected>
                                        {{ __('invoice.form.paympent_method_virement') }}
                                    </option>
                                    <option value="cheque">{{ __('invoice.form.paympent_method_cheque') }}</option>

                                </select>
                                @error('payment_method')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class=" mb-4">
                                <label>{{ __('invoice.form.admin_note') }}</label>
                                <textarea name="admin_notes" id="textarea"
                                    class="form-control @error('admin_notes') is-invalid @enderror" maxlength="225"
                                    rows="5"></textarea>

                                @error('admin_notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="card-title-desc">{{ __('invoice.form.title') }}</p>
                    <div class="row">
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-4">

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            @include('theme.pages.Commercial.Invoice.__create.__add_articles')
                        </div>
                        <div class="col-lg-6">
                            <div class="justify-content-end">
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary">
                                            <i class="mdi mdi-alarm-panel-outline me-3"></i>
                                            {{ __('invoice.form.total_ht') }} :
                                        </h5>
                                        <hr>
                                        <h5 class="my-0 text-danger">
                                            <i class="mdi mdi-alarm-panel-outline me-3"></i>
                                            {{ __('invoice.form.total_ttc') }} :
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @livewire('commercial.invoice.create.articles') --}}

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="card-title-desc">{{ __('invoice.form.title') }}</p>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="condition_general">{{ __('invoice.form.condition_general') }}</label>
                            <textarea name="condition_general" id="condition_general"
                                class="form-control @error('condition_general') is-invalid @enderror"></textarea>
                            @error('condition_general')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap gap-2 justify-content-end mb-4">
                <div class="">
                    <button type="submit" class="btn btn-primary waves-effect waves-light" {{-- onclick='document.getElementById("overlayy").style.display = "block"' --}}>
                        {{ __('buttons.store') }}

                    </button>
                    <button type="submit" class="btn btn-secondary waves-effect waves-light">
                        {{ __('buttons.store_draft') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
