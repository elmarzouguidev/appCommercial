<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="col-lg-4 mb-4">

                            <a href="#" type="button" onclick="openFilters()" class="btn btn-primary">
                                Filters
                            </a>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered dt-responsive nowrap w-100">
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
                        <th>Client</th>
                        <th>Technicien</th>
                        <th class="align-middle">Action</th>
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
                            <td>
                                <a href="{{ $ticket->url }}" class="text-body fw-bold">
                                    {{ $ticket->code }}
                                </a>
                            </td>
                            <td> {{ $ticket->article }}</td>
                            <td>
                                {{ $ticket->full_date }}
                            </td>
                            <td>
                                @php
                                    $status = $ticket->status;
                                    $textt = '';
                                    $color = '';
                                   if ($status === \App\Constants\Status::RETOUR_DEVIS_NON_CONFIRME) {
                                        $textt = __('status.statuses.'.\App\Constants\Status::RETOUR_DEVIS_NON_CONFIRME);
                                        $color = 'info';
                                    }
                                     elseif ($status === \App\Constants\Status::LIVRE) {
                                        $textt =  __('status.statuses.'.\App\Constants\Status::LIVRE);
                                        $color = 'success';
                                    }elseif ($status === \App\Constants\Status::PRET_A_ETRE_LIVRE) {
                                        $textt =  __('status.statuses.'.\App\Constants\Status::PRET_A_ETRE_LIVRE);
                                        $color = 'success';
                                    } elseif ($status === \App\Constants\Status::RETOUR_NON_REPARABLE) {
                                        $textt = __('status.statuses.'.\App\Constants\Status::RETOUR_NON_REPARABLE);;
                                        $color = 'danger';
                                    } else {
                                        $textt = 'Inconnu';
                                        $color = 'warning';
                                    }
                                @endphp

                                <i class="mdi mdi-circle text-{{ $color }} font-size-10"></i>
                                {{ $textt }}

                            </td>
                            <td>
                                <i class="fas fas fa-building me-1"></i> {{ optional($ticket->client)->entreprise}}
                            </td>
                            <td>
                                <i class="fas fas fa-user me-1"></i>
                                {{ optional($ticket->technicien)->full_name}}
                            </td>
                            <td>
                                @if(auth()->user()->hasRole('Reception'))
                                    @if( $ticket->livrable && !$ticket->delivery_count)
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target=".confirmLivrable-{{ $ticket->uuid }}">
                                            confirmer la livraison
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-info">
                                            deja livré
                                        </button>
                                    @endif
                                @endif
                                @if(auth()->user()->hasAnyRole('Admin','SuperAdmin'))

                                    @if(!$ticket->livrable && !$ticket->delivery_count)
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target=".confirmLivrableAdmin-{{ $ticket->uuid }}">
                                            Confirmer la livraison
                                        </button>
                                    @endif

                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
