<div class="modal fade confirmLivrableAdmin-{{$ticket->uuid}}" tabindex="-1" role="dialog"
     aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=orderdetailsModalLabel">Ticket N° : {{ $ticket->code }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin:tickets.livrablePostAdmin')}}" method="post">
                    @csrf
                    <input type="hidden" name="ticket" value="{{$ticket->uuid}}">
                    <div class="d-flex flex-wrap gap-2 justify-content-end mb-4">
                        <div class="">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                confirmer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


