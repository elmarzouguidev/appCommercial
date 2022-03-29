<form class="addSheet" id="addSheeter" action="{{route('sheet:create')}}"
    method="post">
    @csrf

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label class="form-label"> Nom *</label>
   
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                    </div>

                    <div class=" mb-4">
                        <label>Description</label>
                        <textarea name="description" id="textarea" class="form-control @error('description') is-invalid @enderror" maxlength="225"
                            rows="2"></textarea>

                        @error('description')
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
