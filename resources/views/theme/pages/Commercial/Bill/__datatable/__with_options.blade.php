<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-4">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target=".addPaymentToInvoice">
                            Ajouter un Règlement
                        </button>
                    </div>
                </div>

                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th style="width: 20px;" class="align-middle">
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th>Règlement N°</th>
                            <th>Facture</th>
                            <th>Mode de règlement</th>
                            <th>Référence de transaction</th>
                            {{-- <th>Client</th> --}}
                            <th>Montant</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($bills as $bill)
                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox"
                                            id="orderidcheck-{{ $bill->id }}">
                                        <label class="form-check-label" for="orderidcheck-{{ $bill->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ $bill->url }}" class="text-body fw-bold">
                                        {{ $bill->code }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ optional($bill->billable)->url }}" class="text-body fw-bold">
                                        {{ optional($bill->billable)->full_number }}
                                    </a>
                                </td>
                                <td>
                                    {{ $bill->bill_mode }}
                                </td>
                                <td>
                                    {{ $bill->reference }}
                                </td>
                                {{-- <td>
                                   Client
                                </td> --}}
                                <td>
                                    {{ $bill->formated_price_total }} DH
                                </td>
                                <td>
                                    {{ $bill->bill_date->format('d-m-Y') }}
                                </td>

                                <td>
                                    <div class="d-flex gap-3">

                                        <a href="{{ $bill->edit_url }}" class="text-success">
                                            <i class="mdi mdi-pencil font-size-18"></i>
                                        </a>
                                        <a href="#" class="text-danger" onclick="
                                                var result = confirm('Are you sure you want to delete this invoice ?');

                                                if(result){
                                                    event.preventDefault();
                                                    document.getElementById('delete-bill-{{ $bill->uuid }}').submit();
                                                }">
                                            <i class="mdi mdi-delete font-size-18"></i>
                                        </a>
                                    </div>
                                </td>
                                <form id="delete-bill-{{ $bill->uuid }}" method="post"
                                    action="{{ route('commercial:bills.delete') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="billId" value="{{ $bill->uuid }}">
                                </form>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('theme.pages.Commercial.Bill.__datatable.add_bill')