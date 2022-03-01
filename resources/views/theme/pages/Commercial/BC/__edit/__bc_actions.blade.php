<div class="card mb-4">
    <div class="card-body">

        <p class="card-title-desc">Actions disponible :</p>

        <div class="row">

            <div class="col-lg-12">
                <div class="button-items">
                    <a target="_blank"
                       href="{{ route('public.show.bcommand', $command->uuid) }}"
                       class="btn btn-primary waves-effect waves-light w-sm">
                        <i class="mdi mdi-file-pdf d-block font-size-16"></i> Télécharger
                    </a>
                    <button type="button" class="btn btn-light waves-effect waves-light w-sm">
                        <i class="mdi mdi-mail d-block font-size-16"></i> Envoyer
                    </button>

                    <button type="button" class="btn btn-danger waves-effect waves-light w-sm" id="deleteBcommand">
                        <i class="mdi mdi-trash-can d-block font-size-16"></i> Supprimer
                    </button>

                    <form id="delete-bc-single-{{ $command->uuid }}" method="post"
                          action="{{ route('commercial:bcommandes.delete') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="commandId" value="{{ $command->uuid }}">
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
