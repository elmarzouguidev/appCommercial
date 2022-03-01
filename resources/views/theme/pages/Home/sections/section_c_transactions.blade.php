<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Produits prét a la livraison</h4>
            <div class="table-responsive">
                <table class="table align-middle table-nowrap mb-0">
                    <thead class="table-light">
                    <tr>
                        <th style="width: 20px;">
                            <div class="form-check font-size-16 align-middle">
                                <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                <label class="form-check-label" for="transactionCheck01"></label>
                            </div>
                        </th>
                        <th class="align-middle">Tikct ID</th>
                        <th class="align-middle">Produite</th>
                        <th class="align-middle">Date</th>
                        <th class="align-middle">Etat</th>
                        <th class="align-middle">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($tickets as $ticket)
                        <tr>
                            <td>
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="transactionCheck02">
                                    <label class="form-check-label" for="transactionCheck02"></label>
                                </div>
                            </td>
                            <td><a href="{{$ticket->url}}" class="text-body fw-bold">{{$ticket->unique_code}}</a> </td>
                            <td>{{$ticket->product}}</td>
                            <td>
                                {{$ticket->full_date}}
                            </td>
                            <td>
                                {{$ticket->etat}}
                            </td>
    
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                   Livré
                                </button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- end table-responsive -->
        </div>
    </div>
</div>