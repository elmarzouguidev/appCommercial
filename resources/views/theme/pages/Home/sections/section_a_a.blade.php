<div class="col-xl-12">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Documents récents</h4>
                    <ul class="verti-timeline list-unstyled">
                        @foreach ($latest['invoices'] as $invoice)
                            <li class="event-list">
                                <div class="event-timeline-dot">
                                    <i class="bx bx-right-arrow-circle font-size-18"></i>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <h5 class="font-size-14">{{ $invoice->full_date }} <i
                                                class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                        </h5>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            FACTURE N° : <a
                                                href="{{ route('commercial:invoices.single', $invoice->uuid) }}">{{ $invoice->full_number }}</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        @foreach ($latest['estimates'] as $estimate)
                            <li class="event-list">
                                <div class="event-timeline-dot">
                                    <i class="bx bx-right-arrow-circle font-size-18"></i>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <h5 class="font-size-14">{{ $estimate->full_date }} <i
                                                class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                        </h5>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            DEVIS N° : <a
                                                href="{{ route('commercial:estimates.single', $estimate->uuid) }}">{{ $estimate->full_number }}</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{--<div class="text-center mt-4">
                        <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">
                            View More
                            <i class="mdi mdi-arrow-right ms-1"></i>
                        </a>
                    </div>--}}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Derniers clients</h4>
                    <ul class="verti-timeline list-unstyled">
                        @foreach ($latest['clients'] as $client)
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle font-size-18"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <h5 class="font-size-14">{{ $client->full_date }} <i
                                            class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                    </h5>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        Entreprise : {{ $client->entreprise }}
                                        <a href="{{ $client->url }}">{{ $client->client_ref }}</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
