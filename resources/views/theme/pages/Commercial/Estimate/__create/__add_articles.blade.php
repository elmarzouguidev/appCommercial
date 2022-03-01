<div data-repeater-list="articles">
    <div data-repeater-item class="row">
        <div class="mb-3 col-lg-2">
            <label for="designation">{{__('estimate.form.article_designation')}} *</label>
            <textarea name="designation" id="designation"
                class="form-control @error('articles.*.designation') is-invalid @enderror" required></textarea>
            @error('articles.*.designation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 col-lg-2">
            <label for="description">{{__('estimate.form.article_description')}}</label>
            <textarea name="description" id="description"
                class="form-control @error('articles.*.description') is-invalid @enderror"></textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 col-lg-1">
            <label for="quantity">{{__('estimate.form.article_qte')}} *</label>
            <input type="number" name="quantity" id="quantity" min="1"
                class="form-control @error('articles.*.quantity') is-invalid @enderror" required />
            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 col-lg-2">
            <label for="prix_unitaire">{{__('estimate.form.article_prix_unitaire')}} *</label>
            <input type="number" name="prix_unitaire" id="prix_unitaire"
                class="form-control @error('articles.*.prix_unitaire') is-invalid @enderror" />

            @error('prix_unitaire')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 col-lg-2">
            <label for="taxe">{{__('estimate.form.article_taxe')}}</label>
            <input type="text" name="taxe" id="taxe"
                class="form-control @error('articles.*.taxe') is-invalid @enderror"  readonly/>
            @error('taxe')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 col-lg-2">
            <label for="montant_ht">{{__('estimate.form.article_total_ht')}}</label>
            <input type="text" name="montant_ht" id="montant_ht"
                class="form-control @error('articles.*.montant_ht') is-invalid @enderror" readonly />
            @error('montant_ht')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 col-lg-1">

            <button data-repeater-delete type="button" class="mt-4 btn btn-danger waves-effect waves-light">
                <i class="fas fa-trash-alt font-size-16"></i>
            </button>

        </div>
    </div>

</div>

<button data-repeater-create type="button" class="btn btn-success waves-effect waves-light">
    <i class="bx bx-check-double font-size-16 align-middle"></i>
</button>
