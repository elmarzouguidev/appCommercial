<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Default Datatable</h4>
                <p class="card-title-desc">

                </p>

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">

                    <thead>
                        <tr>
                            <th style="width: 20px;" class="align-middle">
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th>Numéro</th>
                            <th>Client</th>
                            <th>Date de facture</th>
                            <th>Montant HT</th>
                            <th>Montant TOTAL</th>
                            <th>Montant TVA</th>
                            <th>Date d'échéance</th>
                            <th>Société</th>
                            <th>Détails</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($invoices as $invoice)
                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox"
                                            id="orderidcheck-{{ $invoice->id }}">
                                        <label class="form-check-label" for="orderidcheck-{{ $invoice->id }}"></label>
                                    </div>
                                </td>
                                <td><a href="{{ $invoice->url }}"
                                        class="text-body fw-bold">{{ $invoice->full_number }}</a> </td>
                                <td> {{ $invoice->client->entreprise }}</td>
                                <td>
                                    {{ $invoice->date_invoice }}
                                </td>
                                <td>
                                    {{ $invoice->formated_price_ht }} DH
                                </td>
                                <td>
                                    {{ $invoice->formated_price_total }} DH
                                </td>
                                <td>
                                    {{ $invoice->formated_total_tva }} DH
                                </td>
                                <td>
                                    {{ $invoice->date_due }}
                                </td>
                                <td>
                                    <i class="fas fas fa-user me-1"></i> {{ $invoice->company->name ?? '' }}
                                </td>
                                <td>

                                    <a href="{{ $invoice->url }}" type="button"
                                        class="btn btn-primary btn-sm btn-rounded">
                                        Voir les détails
                                    </a>
                                </td>

                                <td>
                                    <div class="d-flex gap-3">

                                        <a href="{{ $invoice->pdf_url }}" target="__blank" class="text-success">
                                            <i class="mdi mdi-file-pdf-outline font-size-18"></i>
                                        </a>

                                        <a href="{{ $invoice->edit_url }}" class="text-success">
                                            <i class="mdi mdi-pencil font-size-18"></i>
                                        </a>
                                        <a href="#" class="text-danger" onclick="
                                                var result = confirm('Are you sure you want to delete this invoice ?');
                                                
                                                if(result){
                                                    event.preventDefault();
                                                    document.getElementById('delete-invoice-{{ $invoice->id }}').submit();
                                                }">
                                            <i class="mdi mdi-delete font-size-18"></i>
                                        </a>
                                    </div>
                                </td>
                                <form id="delete-invoice-{{ $invoice->id }}" method="post"
                                    action="{{ route('commercial:invoices.delete') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="invoiceId" value="{{ $invoice->uuid }}">
                                </form>
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
