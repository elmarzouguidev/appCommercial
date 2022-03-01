<div class="row">
    <div class="col-lg-12">
        <form class="repeater" action="{{ route('commercial:invoices.store') }}" method="post">
            @csrf
            <div class="card mb-4">
                <div class="card-body">

                    <p class="card-title-desc">Entrer les information de la facture</p>

                    <div class="row">
                        <div class="col-lg-6">

                            @include('theme.pages.Commercial.Invoice.__create_from_estimate.__info')

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label>* Date de facture</label>
                                        <div class="input-group" id="datepicker1">
                                            <input type="text" name="invoice_date"
                                                   class="form-control @error('invoice_date') is-invalid @enderror"
                                                   value="{{ now()->format('Y-m-d') }}" data-date-format="yyyy-mm-dd"
                                                   data-date-container='#datepicker1' data-provide="datepicker">

                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            @error('invoice_date')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-4">
                                        <label> Date d'échéance</label>
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
                                <label class="form-label">Autoriser les moyens de règlement pour cette
                                    facture</label>
                                <select name="payment_method"
                                        class="form-control select2-templating @error('payment_method') is-invalid @enderror">

                                    <option value="espece">Espèce</option>
                                    <option value="virement" selected>Virement</option>
                                    <option value="cheque">Chèque</option>

                                </select>
                                @error('payment_method')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class=" mb-4">
                                <label>Note Admin</label>
                                <textarea name="admin_notes" id="textarea"
                                          class="form-control @error('admin_notes') is-invalid @enderror"
                                          maxlength="225"
                                          rows="5" placeholder="This textarea has a limit of 225 chars.">
                                </textarea>
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
            <div class="card mb-4">
                <div class="card-body">
                    <p class="card-title-desc">Entrer les Détails de la facture</p>
                    <div class="row">
                        <div class="col-lg-4 mb-4">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            @include('theme.pages.Commercial.Invoice.__create_from_estimate.__add_articles')
                        </div>
                        <div class="col-lg-12">
                            <div class="justify-content-end">
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary">
                                            <i class="mdi mdi-alarm-panel-outline me-3"></i>
                                            Montant HT : {{ $estimate->formated_price_ht }} DH
                                        </h5>
                                        <hr>
                                        <h5 class="my-0 text-info">
                                            <i class="mdi mdi-alarm-panel-outline me-3"></i>
                                            Montant TTC : {{ $estimate->formated_price_total }} DH
                                        </h5>
                                        <hr>
                                        <h5 class="my-0 text-danger">
                                            <i class="mdi mdi-alarm-panel-outline me-3"></i>
                                            Montant TVA : {{ $estimate->formated_total_tva }} DH
                                        </h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="card-title-desc">Entrer les Détails de la facture</p>
                    <div class="row">

                        <input type="hidden" name="estimated" value="{{$estimate->uuid}}">

                        <div class="mb-3 col-lg-12">
                            <label for="condition_general">Conditions générales de vente</label>
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
                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                        Enregistrer
                    </button>
                    <button type="submit" class="btn btn-secondary waves-effect waves-light">
                        Sauvegarder en tant que brouillon
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
