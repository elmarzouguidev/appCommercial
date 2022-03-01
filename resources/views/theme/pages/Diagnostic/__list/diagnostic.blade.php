<div class="row">

    <div class="col-xl-4">

      
        <h4 class="text-truncate text-center font-size-15" >Diagnostique ouverts</h4>
        @if(Arr::exists($tickets,'ouvert'))     
            @foreach ($tickets['ouvert'] as $ticket)
                <div class="col-xl-12 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-4">
                                    <div class="avatar-md">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="{{$ticket->getFirstMediaUrl('tickets-images','thumb')}}" alt="" height="30">
                                        </span>
                                    </div>
                                </div>
                                

                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="{{$ticket->diagnose_url}}" class="text-dark">{{$ticket->article}}</a></h5>
                                    <p class="text-muted mb-4">{{$ticket->unique_code}}</p>
                                
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-3">
                                    <span class="badge bg-success">{{$ticket->status}}</span>
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-calendar me-1"></i> {{$ticket->updated_at}}
                                </li>
                                {{--<li class="list-inline-item me-3">
                                    <i class= "bx bx-comment-dots me-1"></i> 214
                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
  
    </div>
    <div class="col-xl-4">
        <h5 class="text-truncate text-center font-size-15" >Diagnostique envoyeé en attente de devis</h5>
        @if(Arr::exists($tickets,'en-attent-de-devis')) 
            @foreach ($tickets['en-attent-de-devis'] as $ticket)
                <div class="col-xl-12 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-4">
                                    <div class="avatar-md">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="{{$ticket->getFirstMediaUrl('tickets-images','thumb')}}" alt="" height="30">
                                        </span>
                                    </div>
                                </div>
                                

                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="{{$ticket->diagnose_url}}" class="text-dark">{{$ticket->article}}</a></h5>
                                    <p class="text-muted mb-4">{{$ticket->unique_code}}</p>
                            
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-3">
                                    <span class="badge bg-warning">{{$ticket->status}}</span>
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-calendar me-1"></i> {{$ticket->created_at}}
                                </li>
                                {{--<li class="list-inline-item me-3">
                                    <i class= "bx bx-comment-dots me-1"></i> 214
                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
    <div class="col-xl-4">
        <h5 class="text-truncate text-center font-size-15" >Annuler par L'administration</h5>
   
        @if(Arr::exists($tickets,'annuler')) 
  
            @foreach ($tickets['annuler'] as $ticket)
                <div class="col-xl-12 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-4">
                                    <div class="avatar-md">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="{{$ticket->getFirstMediaUrl('tickets-images','thumb')}}" alt="" height="30">
                                        </span>
                                    </div>
                                </div>
                                

                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-15"><a href="{{$ticket->diagnose_url}}" class="text-dark">{{$ticket->article}}</a></h5>
                                    <p class="text-muted mb-4">{{$ticket->unique_code}}</p>
                            
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-3">
                                    <span class="badge bg-danger">{{$ticket->status}}</span>
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-calendar me-1"></i>{{$ticket->created_at}}
                                </li>
                                {{--<li class="list-inline-item me-3">
                                    <i class= "bx bx-comment-dots me-1"></i> 214
                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>