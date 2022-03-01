<div>
    <div class="row">
        <div class="col-lg-12">
            <div data-repeater-list="articles">
                <div data-repeater-item class="row">
                    <div class="mb-3 col-lg-2">
                        <label for="designation">Désignation</label>
                        <textarea wire:model.defer="articles.*.designation" name="designation" id="designation"
                            class="form-control @error('articles.*.designation') is-invalid @enderror"></textarea>
                        @error('articles.*.designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 col-lg-2">
                        <label for="description">Description</label>
                        <textarea wire:model.defer="articles.*.description" name="description" id="description"
                            class="form-control @error('articles.*.description') is-invalid @enderror"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 col-lg-1">
                        <label for="quantity">Qté.</label>
                        <input type="number" wire:model.defer="articles.*.quantity" name="quantity" id="quantity"
                            class="form-control @error('articles.*.quantity') is-invalid @enderror" />
                        @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 col-lg-2">
                        <label for="prix_unitaire">Prix unitaire</label>
                        <input type="number" wire:model.defer="articles.*.prix_unitaire" name="prix_unitaire" id="prix_unitaire"
                            class="form-control @error('articles.*.prix_unitaire') is-invalid @enderror" />

                        @error('prix_unitaire')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 col-lg-2">
                        <label for="taxe">Taxe</label>
                        <input type="text" wire:model.defer="articles.*.taxe" name="taxe" id="taxe"
                            class="form-control @error('articles.*.taxe') is-invalid @enderror" />
                        @error('taxe')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 col-lg-2">
                        <label for="montant_ht">Montant HT</label>
                        <input type="text" wire:model.defer="articles.*.montant_ht" name="montant_ht" id="montant_ht"
                            class="form-control @error('articles.*.montant_ht') is-invalid @enderror" readonly />
                        @error('montant_ht')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-lg-1 align-self-center">
                        <div class="d-grid">
                            <input data-repeater-delete type="button" class="btn btn-danger btn-sm" value="supprimer" />
                        </div>
                    </div>
                </div>

            </div>
            <input wire:click="getArticles()" id="addItem" data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
        </div>
        <div class="col-lg-6">
        </div>
    </div>
</div>
