@if (in_array($invoice->status, [App\Constants\Response::INVOICE_EN_ATTENTE , App\Constants\Response::INVOICE_NON_PAID, App\Constants\Response::INVOICE_PARTIAL]))
    <div class="modal fade addPaymentToInvoice-{{ $invoice->uuid }}" tabindex="-1" role="dialog"
        aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id=orderdetailsModalLabel">Facture N° : {{ $invoice->code }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('theme.pages.Commercial.Invoice.__datatable.__add_payment_form')
                </div>
            </div>
        </div>
    </div>
@endif
