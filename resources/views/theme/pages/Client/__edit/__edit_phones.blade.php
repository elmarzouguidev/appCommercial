<div class="mb-3">
    <div class="mb-3">
        <div class="inner mb-3">
            <div class="row">

                @foreach ($client->telephones as $phone)

                    <div class="col-lg-4">
                        <input type="text" name="phone" class="inner form-control" value="{{ $phone->telephone }}"
                               readonly/>
                    </div>
                    <div class="col-lg-4">
                        <select name="type" class="form-select" readonly>
                            <option value="{{ $phone->type }}" selected>{{ $phone->type }}</option>
                        </select>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="d-grid">
                            <input data-repeater-delete type="button"
                                   class="deletePhone btn btn-danger inner
                              " value="Supprimer"
                                   data-client="{{ $client->uuid }}" data-phone="{{ $phone->uuid }}"/>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
<div data-repeater-list="telephones" class="mb-3">
    <div data-repeater-item class="mb-3">

        <div class="inner mb-3">
            <div class="row">
                <div class="col-lg-4">
                    <input type="text" name="telephone" class="inner form-control" placeholder="Enter le numéro ..."/>
                </div>
                <div class="col-lg-4">
                    <select name="type" class="form-select">
                        <option value="fix" selected>Fix</option>
                        <option value="portable">portable</option>
                        <option value="autre">autre</option>
                    </select>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="d-grid">
                        <input data-repeater-delete type="button" class="btn btn-primary inner" value="Supprimer"/>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<input data-repeater-create type="button" class="btn btn-success inner mb-3" value="Ajouter un numéro"/>
