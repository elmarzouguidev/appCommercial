<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-4">
                        <img src="{{$ticket->getFirstMediaUrl('tickets-images','thumb')}}" alt="" class="avatar-sm">
                    </div>

                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15">{{$ticket->article}}</h5>
                        <p class="text-muted"><strong>{{$ticket->code}}</strong></p>
                    </div>
                </div>

                <h5 class="font-size-15 mt-4">Rapport de Diagnostique :</h5>

                <div class="text-muted mt-4">
                    {!! optional($ticket->diagnoseReports)->content !!}
                </div>

                <div class="row task-dates">
                    {{--<div class="col-sm-4 col-6">
                        <div class="mt-4">
                            <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Due Date</h5>
                            <p class="text-muted mb-0">12 Oct, 2019</p>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Technicien</h4>

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="font-size-14 m-0">
                                    <a href="javascript: void(0);" class="text-dark">
                                        {{optional($ticket->technicien)->full_name}}
                                    </a>
                                   </h5>
                               </td>
                                {{--<td>
                                    <div>
                                        <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">Backend</a>
                                    </div>
                                </td>--}}
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
