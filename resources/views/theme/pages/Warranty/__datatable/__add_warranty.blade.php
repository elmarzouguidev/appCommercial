<div class="modal fade addWarranty" tabindex="-1" role="dialog"
     aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=orderdetailsModalLabel">Ajouter une Garantie: </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="addWarrantyForm" id="addWarrantyForm" action="{{ route('admin:warranty.store') }}"
                      method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label">Ticket *</label>

                                            <select name="ticket"
                                                    class="form-control @error('ticket') is-invalid @enderror" required>
                                                <option value="espece">Choisir le ticket</option>
                                                @foreach($tickets as $ticket)
                                                    <option value="{{$ticket->uuid}}">{{$ticket->code}}</option>
                                                @endforeach

                                            </select>
                                            @error('ticket')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label">Date de départ *</label>

                                            <div class="input-group" id="datepicker1">
                                                <input type="date" name="start_at"
                                                       class="form-control @error('start_at') is-invalid @enderror"
                                                       value="{{ now()->format('d-m-Y') }}"
                                                       required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                @error('start_at')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label">Date de fin *</label>

                                            <div class="input-group" id="datepicker1">
                                                <input type="date" name="end_at"
                                                       class="form-control @error('end_at') is-invalid @enderror"
                                                       value="{{ now()->format('d-m-Y') }}"
                                                       required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                @error('end_at')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class=" mb-4">
                                        <label>description</label>
                                        <textarea name="notes" id="textarea"
                                                  class="form-control @error('description') is-invalid @enderror"
                                                  maxlength="225"
                                                  rows="2"></textarea>

                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2 justify-content-end mb-4">
                        <div class="">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                {{__('buttons.store')}}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

