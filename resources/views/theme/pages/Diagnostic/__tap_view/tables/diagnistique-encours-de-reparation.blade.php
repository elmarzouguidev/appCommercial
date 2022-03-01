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

    </tr>
    </thead>

    <tbody>
    @if (Arr::exists($tickets, 'encours-de-reparation'))
        @foreach ($tickets['encours-de-reparation'] as $ticket)

            <tr>
                {{-- <td>
                <div class="form-check font-size-16">
                    <input class="form-check-input" type="checkbox" id="orderidcheck01">
                    <label class="form-check-label" for="orderidcheck01"></label>
                </div>
            </td> --}}
                <td><a href="{{ $ticket->repear_url }}" class="text-body fw-bold">{{ $ticket->code }}</a></td>
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
                    <a href="{{ $ticket->repear_url }}" type="button"
                       class="btn btn-warning btn-sm btn-rounded">
                        continue la réparation
                    </a>

                </td>

            </tr>
        @endforeach
    @endif
    </tbody>
</table>
