<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
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
        <th class="align-middle">Traiter le ticket</th>
    </tr>
    </thead>

    <tbody>
    @if (Arr::exists($tickets, 'en-attent-de-bc'))
        @foreach ($tickets['en-attent-de-bc'] as $ticket)

            <tr>
                {{-- <td>
                <div class="form-check font-size-16">
                    <input class="form-check-input" type="checkbox" id="orderidcheck01">
                    <label class="form-check-label" for="orderidcheck01"></label>
                </div>
            </td> --}}
                <td><a href="{{ $ticket->url }}" class="text-body fw-bold">{{ $ticket->code }}</a></td>
                <td> {{ $ticket->article }}</td>
                <td>
                    {{ $ticket->full_date }}
                </td>
                <td>
                    <i class="mdi mdi-circle text-info font-size-10"></i>
                    {{ __('status.statuses.'. $ticket->status) }}
                </td>
                <td>
                    <i class="mdi mdi-circle text-info font-size-10"></i>
                    {{ __('etat.etats.'. $ticket->etat) }}
                </td>
                <td>
                    <i class="fas fas fa-building me-1"></i> {{ optional($ticket->client)->entreprise }}
                </td>
                <td>
                    <i class="fas fas fa-building me-1"></i> {{ optional($ticket->technicien)->full_name }}
                </td>
                <td>

                    {{--<a href="{{ route('commercial:estimates.single', $ticket->estimate->uuid) }}" type="button" class="btn btn-primary">
                        Consulter le devis
                    </a>--}}

                    <a href="{{$ticket->ticket_url}}" type="button" class="btn btn-primary">
                        Traiter le ticket
                    </a>
                </td>
            </tr>

        @endforeach
    @endif
    </tbody>
</table>
