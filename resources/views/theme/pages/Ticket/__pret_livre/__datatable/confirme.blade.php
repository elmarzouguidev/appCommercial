<div class="modal fade confirmLivrable-{{$ticket->uuid}}" tabindex="-1" role="dialog"
     aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=orderdetailsModalLabel">Ticket N° : {{ $ticket->code }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('theme.pages.Ticket.__pret_livre.__datatable.confirm_form')
            </div>
        </div>
    </div>
</div>


