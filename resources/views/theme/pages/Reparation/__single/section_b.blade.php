<div class="row">
    @php
        $disabled = '';
        $readOnly = '';
        if(isset($ticket->reparationReports) && $ticket->reparationReports->close_report)
        {
          $disabled ='disabled';
          $readOnly = 'readonly';
        }
    @endphp
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h4 class="card-title mb-4">Commencer la réparation</h4>

                <div>
                    <form action="{{route('admin:reparations.store',$ticket->uuid)}}" method="post" id="TicketRapportForm" {{$disabled}}>

                        @csrf
                        <div class="row mb-4">
                            <textarea name="content" class="form-control"  id="ticketdesc-editor" rows="3">
                                {{optional($ticket->reparationReports)->content ?? old('content')}}
                            </textarea>
                        </div>
                        {{--<input  type="hidden" name="etat" value="{{$ticket->etat}}">--}}
                        <input id="reparation-end" type="hidden" name="reparation_done" value="no">
                    </form>

                    <div class="justify-content-end">
                        <div class="col-lg-10">
                            <button class="btn btn-primary mr-auto" type="submit" {{$disabled}}
                            onclick="document.getElementById('TicketRapportForm').submit();"
                            >Enregistre le rapport</button>

                            <button class="btn btn-danger mr-auto" id="closeTicketReparation"
                                    onclick="document.getElementById('reparation-end').value='reparation_done';" {{$disabled}}>
                                Enregistre et Terminé la Reparation
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
