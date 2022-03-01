<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product-detai-imgs">
                            <div class="row">
                                <div class="col-md-2 col-sm-3 col-4">
                                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
                                         aria-orientation="vertical">

                                        @foreach ($ticket->getMedia('tickets-images') as $image)
                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}"
                                               id="product-{{ $loop->index + 1 }}-tab" data-bs-toggle="pill"
                                               href="#product-{{ $loop->index + 1 }}" role="tab"
                                               aria-controls="product-{{ $loop->index + 1 }}"
                                               aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                <img src="{{ $image->getFullUrl('normal') }}" alt=""
                                                     class="img-fluid mx-auto d-block rounded">
                                            </a>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        @foreach ($ticket->getMedia('tickets-images') as $image)
                                            <div class="tab-pane {{ $loop->first ? 'fade show active' : '' }}"
                                                 id="product-{{ $loop->index + 1 }}" role="tabpanel"
                                                 aria-labelledby="product-{{ $loop->index + 1 }}-tab">
                                                <div>
                                                    <img src="{{ $image->getFullUrl('normal') }}" alt=""
                                                         class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="mt-4 mt-xl-3">
                            {{-- <a href="javascript: void(0);" class="text-primary">Headphone</a> --}}
                            <h4 class="mt-1 mb-3">{{ $ticket->article }}</h4>
                            {{--
                            <p class="text-muted float-start me-3">
                                <span class="bx bxs-star text-warning"></span>
                                <span class="bx bxs-star text-warning"></span>
                                <span class="bx bxs-star text-warning"></span>
                                <span class="bx bxs-star text-warning"></span>
                                <span class="bx bxs-star"></span>
                            </p>
                            <p class="text-muted mb-4">( 152 Customers Review )</p>
                            --}}
                            <h5 class="mt-1 mb-3">Description :</h5>
                            <p class="text-muted mb-4"> {!! $ticket->description !!}</p>
                            <div class="row mb-3">
                                {{-- <div class="col-md-6">
                                    <div>
                                        <p class="text-muted"><i
                                                class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>
                                            Wireless</p>
                                        <p class="text-muted"><i
                                                class="bx bx-shape-triangle font-size-16 align-middle text-primary me-1"></i>
                                            Wireless Range : 10m</p>
                                        <p class="text-muted"><i
                                                class="bx bx-battery font-size-16 align-middle text-primary me-1"></i>
                                            Battery life : 6hrs</p>
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div>
                                        {{--<p class="text-muted"><i
                                                class="bx bx-user-voice font-size-16 align-middle text-primary me-1"></i>
                                            Bass</p>--}}
                                        <p class="text-muted"><i
                                                class="bx bx-cog font-size-16 align-middle text-primary me-1"></i>
                                            Garantie : 3 mois</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="mt-5">

                    <div class="text-left mb-5">
                        @if(auth()->user()->hasAnyRole('SuperAdmin','Admin'))
                            <a href="{{ $ticket->edit }}" type="button" class="btn btn-primary">
                                Editer Le Ticket
                            </a>
                            <a href="{{ route('admin:tickets.report.generate',$ticket->uuid) }}" type="button"
                               class="btn btn-primary">
                               Générer le rapport complet
                            </a>
                        @endif
                        @if(auth()->user()->hasAnyRole('SuperAdmin','Reception'))
                            <a href="{{ $ticket->media_url }}" type="button" class="btn btn-success">
                                <i class="bx bx-image-alt font-size-16 align-middle me-2"></i>
                                Ajouter des photos
                            </a>
                        @endif
                    </div>

                    <h5 class="mb-3">Informations :</h5>
                    <div class="row">

                        @include('theme.pages.Ticket.__single_v2.section_ticket_info')

                        @if(auth()->user()->hasAnyRole('SuperAdmin','Admin'))
                            @include('theme.pages.Ticket.__single_v2.section_attached_files')
                        @endif

                    </div>
                </div>
                {{--@include('theme.pages.Ticket.__single_v2.section_logs') --}}

            </div>
        </div>

    </div>
</div>
