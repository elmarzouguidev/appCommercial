@if ($invoice->bill_count)

    <div class="modal fade orderdetailsModal-{{ $invoice->id }}" tabindex="-1" role="dialog"
        aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id=orderdetailsModalLabel">Règlement N° : {{ $invoice->bill->full_number }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">Facture N° : <span
                            class="text-primary">{{ $invoice->full_number }}</span></p>
                    <p class="mb-4">Client : <span
                            class="text-primary">{{ $invoice->client->entreprise }}</span></p>
                    <p class="mb-4">Référence de transaction : <span
                            class="text-primary">{{ $invoice->bill->ref }}</span></p>
                    <p class="mb-4">Montant : <span
                            class="text-primary">{{ $invoice->bill->formated_price_total }} DH</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif
