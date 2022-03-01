<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">{{ $ticket->article }}</h5>

                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="{{ asset('assets/images/profile-img.png') }}" alt=""
                                 class="img-thumbnail rounded-circle">
                        </div>
                        <h5 class="font-size-15 text-truncate">
                            {{ optional($ticket->technicien)->full_name }}
                        </h5>
                        <p class="text-muted mb-0 text-truncate">Technicien</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Détails</h4>
                <table class="table mb-0 table-bordered">
                    <tbody>
                    <tr>
                        <th scope="row" style="width: 400px;">Technicien</th>
                        <td>{{ optional($ticket->technicien)->full_name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Client</th>
                        <td>{{ optional($ticket->client)->entreprise}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Etat</th>
                        <td>{{ __('etat.etats.'. $ticket->etat) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>
                            {{__('status.statuses.'.$ticket->status)}}
                            {{--optional($ticket->newStatus->first())->name--}}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Code</th>
                        <td>{{ $ticket->code }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Date de création</th>
                        <td>{{ $ticket->full_date }}</td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $ticket->article }} # {{ $ticket->code }}</h4>
                <div class="row">
                    <div class="col-xl-6">
                        <p class="card-title-desc">{!! $ticket->description !!}</p>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">

                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        @foreach ($ticket->getMedia('tickets-images') as $image)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img class="d-block img-fluid" src="{{ $image->getUrl() }}"
                                                     alt="Product image">
                                            </div>
                                        @endforeach

                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                       data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                       data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(auth()->user()->hasAnyRole('SuperAdmin','Admin'))
                        @if ($ticket->estimate_count === 1)
                            <a href="{{ route('commercial:estimates.single', $ticket->estimate->uuid) }}"
                               class="btn btn-warning mr-auto">
                                DEVIS deja Créer
                            </a>
                        @else
                            <a href="{{ route('commercial:estimates.create.ticket',  $ticket->uuid) }}"
                               class="btn btn-primary mr-auto">
                                Crée un DEVIS
                            </a>
                        @endif

                        <form method="post"
                              action="{{ route('admin:tickets.diagnose.send-confirm', $ticket->uuid) }}">
                            @csrf
                            <div class="mt-4 mb-5">
                                <h5 class="font-size-14 mb-4">Réponse de devis</h5>

                                <div class="form-check form-check-inline mb-3">
                                    <input class="form-check-input" type="radio" name="response" id="response1"
                                           value="{{\App\Constants\Response::DEVIS_ACCEPTE}}" {{ $ticket->status === \App\Constants\Status::A_REPARER ? 'checked' : '' }}>
                                    <label class="form-check-label" for="response1">
                                        Devis accépté, commencez la réparation
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="response" id="response2"
                                           value="{{\App\Constants\Response::DEVIS_NON_ACCEPTE}}"
                                        {{ $ticket->status === \App\Constants\Status::RETOUR_DEVIS_NON_CONFIRME ? 'checked' : '' }}>
                                    <label class="form-check-label" for="response2">
                                        Devis refusé, déclinez la réparation
                                    </label>
                                </div>
                            </div>
                            <button class="mb-4 btn btn-primary mr-auto" type="submit">Enregistre l'etat</button>

                            <div class="row mb-4">
                                <h5 class="font-size-14 mb-4">Rapport de diagnostique :</h5>
                                <p>{!!   optional($ticket->diagnoseReports)->content !!}</p>
                            </div>

                        </form>
                    @endif

                    @if(auth()->user()->hasRole('Technicien') && $ticket->user_id === auth()->id())

                        @php
                            $disabled = '';
                            $readOnly = '';
                            if(isset($ticket->diagnoseReports) && $ticket->diagnoseReports->close_report)
                            {
                              $disabled ='disabled';
                              $readOnly = 'readonly';
                            }
                        @endphp
                        <form action="{{ $ticket->diagnose_url }}" method="post" id="TicketReportForm">
                            @csrf
                            <div class="mt-4 mb-5">
                                <h5 class="font-size-14 mb-4">Etat</h5>
                                <div class="form-check form-check-inline mb-3">
                                    <input class="form-check-input" type="radio" name="etat" id="etat1"
                                           value="{{\App\Constants\Etat::REPARABLE}}" {{$disabled}}
                                        {{ $ticket->etat === \App\Constants\Etat::REPARABLE ? 'checked' : '' }}>
                                    <label class="form-check-label" for="etat1">
                                        Réparable
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="etat" id="etat2"
                                           value="{{\App\Constants\Etat::NON_REPARABLE}}" {{ $ticket->etat === \App\Constants\Etat::NON_REPARABLE ? 'checked' : '' }} {{$disabled}}>
                                    <label class="form-check-label" for="etat2">
                                        Non Réparable
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="ticket" value="{{ $ticket->uuid }}" {{$readOnly}}>
                            <input type="hidden" name="type" value="diagnostique" {{$readOnly}}>
                            <input id="send-report" type="hidden" name="sendreport" value="no" {{$readOnly}}>
                            <div class="row mb-4">

                                <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                                          id="ticketdesc-editor" rows="3" {{$readOnly}}>
                                                                        {{ optional($ticket->diagnoseReports)->content ?? old('content') }}
                                                                    </textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </form>

                        <div class="justify-content-end">
                            <div class="col-lg-10">
                                <button class="btn btn-primary mr-auto" type="submit" {{$disabled}}
                                    onclick="document.getElementById('TicketReportForm').submit();"
                                >Enregistre le rapport</button>

                                <button class="btn btn-danger mr-auto" id="sendTicketReport"
                                        onclick="document.getElementById('send-report').value='yessendit';" {{$disabled}}>
                                    Enregistre et envoyer
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
