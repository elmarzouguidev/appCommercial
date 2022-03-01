<form class="addBill" id="addBiller" action="{{ route('commercial:bills.storeBill',$invoice->uuid) }}" method="post">
    @csrf

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    @include('theme.pages.Commercial.Invoice.__datatable.__add_payment_info')
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
                {{__('buttons.store')}}
            </button>
        </div>
    </div>

</form>
