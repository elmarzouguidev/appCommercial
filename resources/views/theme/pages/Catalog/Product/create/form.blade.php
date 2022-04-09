<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Basic Information</h4>
                <p class="card-title-desc">Fill all information below</p>
                @include('theme.layouts._parts.__messages')
                <form action="{{route('commercial:catalog.products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name">Nom *</label>
                                <input id="name" name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="brand">Marque</label>
                                <select class="form-select select2 @error('brand') is-invalid @enderror" name="brand"
                                    id="brand" required>
                                    <option>Select</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="reference">Réference *</label>
                                <input id="reference" name="reference" type="text"
                                    class="form-control @error('reference') is-invalid @enderror" value="{{old('reference')}}" required>
                                @error('reference')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="buy_price">prix d’achat</label>
                                <input id="buy_price" name="buy_price" type="number"
                                    class="form-control @error('buy_price') is-invalid @enderror" value="{{old('buy_price')}}">
                                @error('buy_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sell_price">prix de vente *</label>
                                <input id="sell_price" name="sell_price" type="number"
                                    class="form-control  @error('sell_price') is-invalid @enderror" value="{{old('sell_price')}}" required>
                                @error('sell_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Catégorie</label>
                                <select class="form-control select2 @error('category') is-invalid @enderror"
                                    name="category" id="category">
                                    <option>Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Couleurs</label>

                                <select
                                    class="select2 form-control select2-multiple @error('colors') is-invalid @enderror"
                                    multiple="multiple" name="colors" data-placeholder="Choose ...">

                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach

                                </select>
                                @error('colors')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="productdesc">Description</label>
                                <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="productdesc"
                                    rows="5">
                                    {{old('description')}}
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Image *</label>

                                <input class="form-control @error('photo') is-invalid @enderror" name="photo"
                                    type="file" accept="image/*" />
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
