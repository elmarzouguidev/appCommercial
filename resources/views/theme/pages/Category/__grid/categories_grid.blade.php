<div class="row">

        @foreach ($categories as $category)
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="text-lg-center">
                                    <div class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none">
                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                            M
                                        </span>
                                    </div>
                                    <h5 class="mb-1 font-size-15 text-truncate">{{$category->name}}</h5>
                                    <a href="javascript: void(0);" class="text-muted">@Skote</a>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div>
                                    <a href="invoices-detail.html" class="d-block text-primary text-decoration-underline mb-2">Invoice #14251</a>
                                    <h5 class="text-truncate mb-4 mb-lg-5">Skote Dashboard UI</h5>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item me-3">
                                            <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount"><i class="bx bx-money me-1 text-muted"></i> $1455</h5>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i> 10 Oct, 19</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach

</div>
