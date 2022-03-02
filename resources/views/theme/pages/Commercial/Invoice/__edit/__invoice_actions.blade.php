<div class="row">
    <div class="card mb-4">
        <div class="card-body">

            <p class="card-title-desc">Actions disponible :</p>



            <div class="col-lg-12">
                <div class="button-items">
                    <a target="_blank" href="{{ route('commercial:invoices.pdf.build', $invoice->uuid) }}"
                        class="btn btn-primary waves-effect waves-light w-sm">
                        <i class="mdi mdi-file-pdf d-block font-size-16"></i> Télécharger
                    </a>
                    <button type="button" class="btn btn-light waves-effect waves-light w-sm">
                        <i class="mdi mdi-mail d-block font-size-16"></i> Envoyer
                    </button>
                    @if ($invoice->bill_count && $invoice->status === App\Constants\Response::INVOICE_PAID && !$invoice->avoir_count)
                        <button type="button" class="btn btn-info waves-effect waves-light w-sm">
                            <i class="mdi mdi-cash d-block font-size-16"></i>Détails règlement
                        </button>
                    @else
                        @if ($invoice->avoir_count)
                            <a href="#{{-- $invoice->avoir->url --}}" type="button" class="btn btn-warning waves-effect waves-light w-sm">
                                <i class="mdi mdi-cash d-block font-size-16"></i>
                                Annulé par avoir
                            </a>
                        @else
                            <button type="button" class="btn btn-info waves-effect waves-light w-sm" data-bs-toggle="modal"
                                data-bs-target=".addPaymentToInvoice-{{ $invoice->uuid }}">
                                <i class="mdi mdi-cash d-block font-size-16"></i>
                                Régler
                            </button>
                        @endif
                    @endif

                    <button type="button" class="btn btn-danger waves-effect waves-light w-sm" id="deleteInvoice">
                        <i class="mdi mdi-trash-can d-block font-size-16"></i> Supprimer
                    </button>

                    <form id="delete-invoice-single-{{ $invoice->uuid }}" method="post"
                        action="{{ route('commercial:invoices.delete') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="invoiceId" value="{{ $invoice->uuid }}">
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
                @foreach ($invoice->histories as $history)
                    <li>
                        {{ $history->user }} : {{ $history->detail }} :
                        {{ $history->created_at->format('d-m-Y H:i:s') }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
