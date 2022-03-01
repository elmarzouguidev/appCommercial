<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">

                    <thead>
                        <tr>
                            <th style="width: 20px;" class="align-middle">
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th>Ticket ID</th>
                            <th>Article</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Etat</th>
                            <th>Client</th>
                            <th>Technicien</th>
                            <th>Détails</th>
                            <th>Historique</th>
                            @auth('technicien')
                                <th class="align-middle">Diagnostiquer</th>
                            @endauth
                            @auth('admin')
                                <th class="align-middle">Action</th>
                            @endauth
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                        <label class="form-check-label" for="orderidcheck01"></label>
                                    </div>
                                </td>
                                <td><a href="{{ $ticket->url }}"
                                        class="text-body fw-bold">{{ $ticket->unique_code }}</a> </td>
                                <td> {{ $ticket->article }}</td>
                                <td>
                                    {{ $ticket->full_date }}
                                </td>
                                <td>
                                    <span
                                        class="badge badge-pill badge-soft-success font-size-12">{{ $ticket->status }}</span>
                                </td>
                                <td>
                                    <span
                                        class="badge badge-pill badge-soft-success font-size-12">{{ $ticket->etat }}</span>
                                </td>
                                <td>
                                    <i class="fas fas fa-building me-1"></i> {{ $ticket->client->entreprise ?? '' }}
                                </td>
                                <td>
                                    <i class="fas fas fa-user me-1"></i> {{ $ticket->technicien->full_name ?? '' }}
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="{{ $ticket->url }}" type="button"
                                        class="btn btn-primary btn-sm btn-rounded">
                                        Voir les détails
                                    </a>
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="{{ $ticket->historical_url }}" type="button"
                                        class="btn btn-primary btn-sm btn-rounded">
                                        Voir les Historique
                                    </a>
                                </td>
                                @auth('technicien')

                                    <td>
                                        @if ($ticket->technicien_id === null)

                                            <a href="{{ $ticket->diagnose_url }}" type="button"
                                                class="btn btn-warning btn-sm btn-rounded">
                                                Diagnostiquer
                                            </a>

                                        @endif
                                    </td>
                                @endauth
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
    </div> <!-- end col -->
</div> <!-- end row -->
