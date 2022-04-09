<div class="modal fade addCategory" id="addBill" role="dialog" aria-labelledby=orderdetailsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=orderdetailsModalLabel">Ajouter une catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="addBill" id="addBiller" action="{{ route('commercial:bills.store') }}"
                    method="post">
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                
                                        <div class="col-lg-12">
                                            <div class="mb-4">
                                                <label class="form-label">Facture *</label>
                                                <select class="form-select" name="invoice" id="get-invoice" required>

                                                    <optgroup label="Factures">
                                                        <option value=""></option>
                                   
                                                    </optgroup>
                                                </select>
                                                @error('invoice')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                   
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-4">
                                                <label class="form-label"> Montant reçu *</label>

                                                <input type="number" name="price_recu"
                                                    class="form-control @error('price_recu') is-invalid @enderror"
                                                    value="" min="1" required>
                                                @error('price_recu')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-4">
                                                <label class="form-label">Date de règlement *</label>

                                                <div class="input-group" id="datepicker1">
                                                    <input type="date" name="bill_date"
                                                        class="form-control @error('bill_date') is-invalid @enderror"
                                                        value="{{ now()->format('d-m-Y') }}" required
                                                        pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">

                                                    <span class="input-group-text"><i
                                                            class="mdi mdi-calendar"></i></span>
                                                    @error('bill_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-4">
                                                <label class="form-label">Mode de règlement *</label>

                                                <select name="bill_mode"
                                                    class="form-control @error('bill_mode') is-invalid @enderror" required>
                                                    <option value="espece">Espèce</option>
                                                    <option value="virement">Virement</option>
                                                    <option value="cheque">Chèque</option>
                                                </select>
                                                @error('bill_mode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="docs-options">
                                        <label class="form-label">Référence de transaction</label>
                                        <div class="input-group mb-4">

                                            <input type="text"
                                                class="form-control @error('reference') is-invalid @enderror"
                                                name="reference" value="" aria-describedby="ref">
                                            @error('reference')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class=" mb-4">
                                        <label>Note</label>
                                        <textarea name="notes" id="textarea"
                                            class="form-control @error('notes') is-invalid @enderror" maxlength="225"
                                            rows="2"></textarea>

                                        @error('notes')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2 justify-content-end mb-4">
                        <div class="">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                {{ __('buttons.store') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
