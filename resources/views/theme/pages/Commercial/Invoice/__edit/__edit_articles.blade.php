<div data-repeater-list="articles" >

    @foreach ($invoice->articles as $article)
        <div data-repeater-item class="row">
            <div class="mb-3 col-lg-3">
                <label for="designation">Désignation</label>
                <textarea name="designation" id="designation"
                    class="form-control @error('articles.*.designation') is-invalid @enderror" {{$readOnly}}>{{ $article->designation }}
                </textarea>
                @error('articles.*.designation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 col-lg-3">
                <label for="description">Description</label>
                <textarea name="description" id="description"
                    class="form-control @error('articles.*.description') is-invalid @enderror" {{$readOnly}}>{{ $article->description }}
                </textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 col-lg-1">
                <label for="quantity">Qté.</label>
                <input type="number" name="quantity" id="quantity" min="1" value="{{ $article->quantity }}"
                    class="form-control @error('articles.*.quantity') is-invalid @enderror" {{$readOnly}}/>
                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 col-lg-2">
                <label for="prix_unitaire">Prix unitaire</label>
                <input type="number" name="prix_unitaire" id="prix_unitaire" value="{{ $article->prix_unitaire }}"
                    class="form-control @error('articles.*.prix_unitaire') is-invalid @enderror" {{$readOnly}}/>

                @error('prix_unitaire')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 col-lg-2">
                <label for="montant_ht">Montant HT</label>
                <input type="text" name="montant_ht" id="montant_ht" value="{{ $article->formated_montant_ht }}"
                    class="form-control @error('articles.*.montant_ht') is-invalid @enderror" readonly />
                @error('montant_ht')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 col-lg-1">

                <button
                    type="button" class="deleteArticle mt-4 btn btn-danger waves-effect waves-light"
                    data-article="{{ $article->uuid }}"
                    data-invoice="{{ $invoice->uuid }}"
                    {{$disabled}}>
                    <i class="fas fa-trash-alt font-size-16"></i>
                </button>

            </div>

        </div>
    @endforeach
    <button data-repeater-create type="button" class="btn btn-success waves-effect waves-light" {{$disabled}}>
        <i class="bx bx-check-double font-size-16 align-middle"></i>
    </button>
</div>
