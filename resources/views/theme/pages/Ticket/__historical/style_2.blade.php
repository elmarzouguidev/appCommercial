<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
           
                <h4 class="card-title mb-5">{{$ticket->article}}</h4>
                <div class="">
                    <ul class="verti-timeline list-unstyled">
                        @foreach ($ticket->statuses as $status)
                            <li class="event-list">
                                <div class="event-timeline-dot">
                                    <i class="bx bx-right-arrow-circle"></i>
                                </div>
                                <div class="event-date">
                                    <div class="text-primary mb-1">{{$status->created_at->format('d-m-Y')}}</div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="bx bx-copy-alt h2 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5>{{$status->name}}</h5>
                                            <p class="text-muted">
                                                {{$status->reason}}
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        {{--<li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <i class="bx bx-badge-check h2 text-primary"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        <h5>Delivered</h5>
                                        <p class="text-muted">To an English person, it will seem like simplified
                                            English.</p>

                                    </div>
                                </div>
                            </div>
                        </li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
