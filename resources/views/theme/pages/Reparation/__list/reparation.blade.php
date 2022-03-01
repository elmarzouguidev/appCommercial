<div class="row">

    <div class="col-xl-4">

      
        <h4 class="text-truncate text-center font-size-15" >Produits a réparer</h4>
        @if(Arr::exists($tickets,'a-preparer'))     
            @foreach ($tickets['a-preparer'] as $ticket)
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
                                    <h5 class="text-truncate font-size-15"><a href="{{$ticket->repear_url}}" class="text-dark">{{$ticket->article}}</a></h5>
                                    {{$ticket->unique_code}}
                                
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
                                <li class="list-inline-item me-3">
                                    <a href="{{$ticket->repear_url}}" class="btn btn-primary btn-sm mr-auto" type="submit"> commencer la réparation</a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
  
    </div>
    <div class="col-xl-4">
        <h5 class="text-truncate text-center font-size-15" >Produits en cours de réparation</h5>
        @if(Arr::exists($tickets,'encours-de-reparation')) 
            @foreach ($tickets['encours-de-reparation'] as $ticket)
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
                                    <h5 class="text-truncate font-size-15"><a href="{{$ticket->repear_url}}" class="text-dark">{{$ticket->article}}</a></h5>
                                    {{$ticket->unique_code}}
                            
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-3">
                                    <span class="badge bg-warning">{{$ticket->status}}</span>
                                </li>
                                <li class="list-inline-item me-3">
                                    <i class= "bx bx-calendar me-1"></i> {{$ticket->envoyer_at}}
                                </li>
                                <li class="list-inline-item me-3">
                                    <a href="{{$ticket->repear_url}}" class="btn btn-primary btn-sm mr-auto" type="submit">
                                        continue la réparation
                                    </a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
    <div class="col-xl-4">
        <h5 class="text-truncate text-center font-size-15" >Produits réparé</h5>
        @if(Arr::exists($tickets,'pret-a-livre')) 
            @foreach ($tickets['pret-a-livre'] as $ticket)
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
                                    <h5 class="text-truncate font-size-15"><a href="{{$ticket->repear_url}}" class="text-dark">{{$ticket->article}}</a></h5>
                                    {{$ticket->unique_code}}
                            
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
                                <li class="list-inline-item me-3">
                                    <a href="#" class="btn btn-secondary btn-sm mr-auto" type="submit"> réparation terminée</a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>