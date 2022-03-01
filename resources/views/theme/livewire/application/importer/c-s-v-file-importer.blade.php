<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body mt-4">
                    <form wire:submit.prevent="import" enctype="multipart/form-data">

                        @csrf

                        <div wire:loading wire:target="importFile">

                            <x-forms.loading class="mr-4" />

                        </div>

                        <input type="file" wire:model="importFile"
                            class="form-control @error('import_file') is-invalid @enderror">
                        <button class="btn btn-outline-secondary">Import</button>
                        @error('import_file')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror

                    </form>

                    @if ($importing && !$importFinished)
                        <div wire:poll="updateImportProgress">Importing...please wait.</div>
                    @endif

                    @if ($importFinished)
                        Finished importing.
                    @endif

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
    </div>
</div>
