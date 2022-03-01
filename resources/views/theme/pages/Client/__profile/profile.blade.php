<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">Profil du Client</h5>
                      
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="{{$client->getFirstMediaUrl('clients-logo','thumb')}}" alt="" class="img-thumbnail rounded-circle">
                        </div>
                        <h5 class="font-size-15 text-truncate">{{$client->entreprise}}</h5>
                        <p class="text-muted mb-0 text-truncate">{{$client->contact}}</p>
                    </div>

                    <div class="col-sm-8">
                        <div class="pt-4">
                           
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="font-size-15">{{$client->tickets_count}}</h5>
                                    <p class="text-muted mb-0">Tickets</p>
                                </div>
                                {{--<div class="col-6">
                                    <h5 class="font-size-15">$1245</h5>
                                    <p class="text-muted mb-0">Revenue</p>
                                </div>--}}
                            </div>
                            {{--<div class="mt-4">
                                <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">information personnelle</h4>

                <p class="text-muted mb-4">
                    {{$client->description}}
                </p>
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Nom Complet :</th>
                                <td>{{$client->contact}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Mobile :</th>
                                <td>{{$client->telephone}}</td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail :</th>
                                <td>{{$client->email}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Location :</th>
                                <td>{{$client->addresse}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end card -->

        {{--<div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Experience</h4>
                <div class="">
                    <ul class="verti-timeline list-unstyled">
                        <li class="event-list active">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle bx-fade-right"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <i class="bx bx-server h4 text-primary"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark">Back end Developer</a></h5>
                                        <span class="text-primary">2016 - 19</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <i class="bx bx-code h4 text-primary"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark">Front end Developer</a></h5>
                                        <span class="text-primary">2013 - 16</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <i class="bx bx-edit h4 text-primary"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark">UI /UX Designer</a></h5>
                                        <span class="text-primary">2011 - 13</span>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>--}}  
        <!-- end card -->
    </div>         
    
    <div class="col-xl-8">

        <div class="row">
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium mb-2">Completed Tickets</p>
                                <h4 class="mb-0">{{$client->tickets_count}}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-check-circle font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium mb-2">Pending Tickets</p>
                                <h4 class="mb-0">1</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-hourglass font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium mb-2">Total Revenue</p>
                                <h4 class="mb-0">$36,524</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-package font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
        {{--<div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Revenue</h4>
                <div id="revenue-chart" class="apex-charts" dir="ltr"></div>
            </div>
        </div>--}}

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Tickets</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Ticket ID</th>
                                <th scope="col">Produit</th>
                                <th scope="col">Date</th>
                                <th scope="col">Etat</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($client->tickets as $ticket )
                                <tr>
                                    <th scope="row"><a href="{{$ticket->url}}">{{$ticket->unique_code}}</a></th>
                                    <td>{{$ticket->product}}</td>
                                    <td>{{$ticket->full_date}}</td>
                                    <td>{{$ticket->etat}}</td>
                               
                                </tr>
                            @empty
                  
                             <tr>
                                <th scope="row">No Tickets pour le mement</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->