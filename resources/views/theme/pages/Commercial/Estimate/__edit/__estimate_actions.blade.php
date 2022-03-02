<div class="row">
    <div class="card mb-4">
        <div class="card-body">

            <p class="card-title-desc">Actions disponible :</p>



            <div class="col-lg-12">
                <div class="button-items">
                    <a target="_blank" href="{{ route('public.show.estimate', $estimate->uuid) }}"
                        class="btn btn-primary waves-effect waves-light w-sm">
                        <i class="mdi mdi-file-pdf d-block font-size-16"></i> Télécharger
                    </a>
                    <button type="button" class="btn btn-light waves-effect waves-light w-sm" data-bs-toggle="modal"
                        data-bs-target=".sendEstimate-{{ $estimate->uuid }}">
                        <i class="mdi mdi-mail d-block font-size-16"></i> Envoyer
                    </button>
                    @if (!$estimate->is_invoiced)
                        <a href="{{ $estimate->create_invoice_url }}"
                            class="btn btn-success waves-effect waves-light w-sm">
                            <i class="mdi mdi-pencil d-block font-size-16"></i>
                            Créer une facture
                        </a>
                    @else
                        @if ($estimate->invoice_count)
                            <a href="{{ $estimate->invoice_url }}" target="_blank"
                                class="btn btn-info waves-effect waves-light w-sm">

                                <i class="mdi mdi-file d-block font-size-16"></i>
                                Déjà facturé
                            </a>
                        @endif
                    @endif

                    <button type="button" class="btn btn-danger waves-effect waves-light w-sm" id="deleteEstimate">
                        <i class="mdi mdi-trash-can d-block font-size-16"></i> Supprimer
                    </button>

                    <form id="delete-estimate-single-{{ $estimate->uuid }}" method="post"
                        action="{{ route('commercial:estimates.delete') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="estimateId" value="{{ $estimate->uuid }}">
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
<div class="row">
    <div class="card mb-4">
        <div class="card-body">
            <p class="card-title-desc">Historique :</p>
            <ul>
                @foreach ($estimate->histories as $history)
                    <li>{{ $history->user }} : {{ $history->detail }} :
                        {{ $history->created_at->format('d-m-Y H:i:s') }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
