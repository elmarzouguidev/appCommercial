@if (!$estimate->is_send)
    <div class="modal fade sendEstimate-{{ $estimate->uuid }}" tabindex="-1" role="dialog"
         aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id=orderdetailsModalLabel">Confirmer L'envoi du devis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">Devis N° : <span class="text-primary">{{ $estimate->full_number }}</span></p>
                    <p class="mb-2">Société  : <span class="text-primary">{{ optional(getCompany())->name }}</span></p>
                    <p class="mb-2">Client  : <span class="text-primary">{{ optional($estimate->client)->entreprise }}</span></p>

                    <p class="mb-2">sélectionner les emails : </p>
                    <form class="sendEstimate" id="sendEstimateForm-{{$estimate->id}}"
                          action="{{ route('commercial:estimates.send') }}" method="post">
                        @csrf
                        <input type="hidden" name="estimater" value="{{$estimate->uuid}}">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked disabled
                            >
                            <label class="form-check-label">
                                {{optional($estimate->client)->email}} (email principal)
                            </label>
                        </div>
                        @foreach (optional($estimate->client)->emails as $email)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="email-{{$email->id}}"
                                       name="emails[{{$estimate->id}}][]" value="{{$email->email}}">
                                <label class="form-check-label" for="email-{{$email->id}}">
                                    {{$email->email}}
                                </label>
                            </div>
                        @endforeach
                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                            onclick="document.getElementById('sendEstimateForm-{{$estimate->id}}').submit();"
                    >
                        Envoyer
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif
