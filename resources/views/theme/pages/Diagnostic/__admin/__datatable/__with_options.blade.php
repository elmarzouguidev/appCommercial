<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        {{-- <th style="width: 20px;" class="align-middle">
                            <div class="form-check font-size-16">
                                <input class="form-check-input" type="checkbox" id="checkAll">
                                <label class="form-check-label" for="checkAll"></label>
                            </div>
                        </th> --}}
                        <th>Ticket N°</th>
                        <th>Article</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Etat</th>
                        <th>Client</th>
                        <th>Technicien</th>
                        {{-- <th>Détails</th> --}}
                        <th class="align-middle">Traiter le ticket</th>
                        @auth('admin')
                            <th class="align-middle">Action</th>
                        @endauth
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($tickets as $ticket)
                        <tr>
                            {{-- <td>
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                    <label class="form-check-label" for="orderidcheck01"></label>
                                </div>
                            </td> --}}
                            <td><a href="{{ $ticket->url }}"
                                   class="text-body fw-bold">{{ $ticket->unique_code }}</a></td>
                            <td> {{ $ticket->article }}</td>
                            <td>
                                {{ $ticket->full_date }}
                            </td>
                            <td>
                                @php
                                    $status = $ticket->stat;
                                    $textt = '';
                                    $color = '';
                                    if ($status === 'en-attent-de-devis') {
                                        $textt = 'En attent de devis';
                                        $color = 'info';
                                    } elseif ($status === 'retour-non-reparable') {
                                        $textt = 'Retour non reparable';
                                        $color = 'warning';
                                    } else {
                                        $textt = 'Inconnu';
                                        $color = 'warning';
                                    }
                                @endphp
                                <i class="mdi mdi-circle text-{{ $color }} font-size-10"></i>
                                {{ $textt }}
                            </td>
                            <td>
                                    <span class="badge badge-pill badge-soft-success font-size-12">

                                        {{ $ticket->etat }}
                                    </span>
                            </td>
                            <td>
                                <i class="fas fas fa-building me-1"></i> {{ $ticket->client->entreprise ?? '' }}
                            </td>
                            <td>

                                <i class="fas fas fa-user me-1"></i>
                                {{ $ticket->technicien->full_name ?? '' }}

                            </td>

                            <td>

                                <a href="{{ $ticket->ticket_url }}" type="button"
                                   class="btn btn-primary btn-sm btn-rounded">
                                    Traiter le ticket
                                </a>
                            </td>

                            @auth('admin')
                                <td>
                                    <div class="d-flex gap-3">

                                        <a href="{{ $ticket->media_url }}" class="text-success"><i
                                                class="mdi mdi-file-image font-size-18"></i></a>

                                        <a href="{{ $ticket->edit }}" class="text-success"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="#" class="text-danger"
                                           onclick="document.getElementById('delete-ticket-{{ $ticket->id }}').submit();">
                                            <i class="mdi mdi-delete font-size-18"></i>
                                        </a>
                                    </div>
                                </td>
                            @endauth
                        </tr>
                        <form id="delete-ticket-{{ $ticket->id }}" method="post"
                              action="{{ route('admin:tickets.delete') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="ticket" value="{{ $ticket->id }}">
                        </form>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
