<div class="col-lg-2 d-none" id="filters-list">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Filter</h4>

            <div>
                <h5 class="font-size-14 mb-3">Sociétés</h5>
                <ul class="list-unstyled product-list">
                    @foreach ($companies as $company)
                        <div class="form-check mt-2">
                            <input class="form-check-input chk-filter" type="radio" name="company"
                                id="company-{{ $company->id }}" value="{{ $company->id }}"
                                {{ in_array($company->id, explode(',', request()->input('appFilter.GetCompany'))) ? 'checked' : '' }}>

                            <label class="form-check-label" for="company-{{ $company->id }}">
                                {{ $company->name }}
                            </label>
                        </div>
                    @endforeach
                </ul>
            </div>

            <div class="mt-4 pt-3">
                <h5 class="font-size-14 mb-3">Status</h5>
                <div class="form-check mt-2">
                    <input class="form-check-input chk-filter" type="checkbox" name="status" value="non-paid"
                        id="status-nonpaid"
                        {{ in_array('non-paid', explode(',', request()->input('appFilter.GetStatus'))) ? 'checked' : '' }}>
                    <label class="form-check-label" for="status-nonpaid">
                        A régler
                    </label>
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input chk-filter" type="checkbox" name="status" value="paid"
                        id="status-paid"
                        {{ in_array('paid', explode(',', request()->input('appFilter.GetStatus'))) ? 'checked' : '' }}>
                    <label class="form-check-label" for="status-paid">
                        PAYÉE
                    </label>
                </div>
            </div>

            <div class="mt-4">
                <h5 class="font-size-14 mb-3">Client</h5>
                <select class="form-control select2 chk-filter-client" name="client" id="clienter">
                    <option value=""></option>
                    <optgroup label="Clients">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}"
                                {{ in_array($client->id, explode(',', request()->input('appFilter.GetClient'))) ? 'selected' : '' }}>
                                {{ $client->entreprise }}
                            </option>
                        @endforeach
                    </optgroup>
                </select>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <button href="#" type="button" class="btn btn-primary" id="filterData">
                        Appliquer le filtre
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>
