<div class="row" id="invoices_lister">

    @include('theme.pages.Commercial.Invoice.__datatable.__filters')

    <div class="col-" id="invoices-list">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="col-lg-4 mb-4">
                            <a href="#" type="button" onclick="openFilters()" class="btn btn-primary">
                                Filters
                            </a>
                            <a href="{{ route('commercial:invoices.create') }}" type="button" class="btn btn-info">
                                Créer une facture
                            </a>
                        </div>
                    </div>
                </div>
                {{$errors}}
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            {{-- <th style="width: 20px;" class="align-middle">
                            <div class="form-check font-size-16">
                                <input class="form-check-input" type="checkbox" id="checkAll">
                                <label class="form-check-label" for="checkAll"></label>
                            </div>
                        </th> --}}
                            <th>{{ __('invoice.table.number') }}</th>
                            <th>{{ __('invoice.table.client') }}</th>
                            <th>{{ __('invoice.table.date_invoice') }}</th>
                            <th>{{ __('invoice.table.total_ht') }}</th>
                            <th>{{ __('invoice.table.total_tva') }}</th>
                            <th>{{ __('invoice.table.total_total') }}</th>
                            <th>{{ __('invoice.table.date_due') }}</th>

                            <th>Status</th>
                            <th>Règlement</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($invoices as $invoice)
                            <tr>
                                {{-- <td>
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox"
                                        id="orderidcheck-{{ $invoice->id }}">
                                    <label class="form-check-label" for="orderidcheck-{{ $invoice->id }}"></label>
                                </div>
                            </td> --}}
                                <td>
                                    <a href="{{ $invoice->url }}" class="text-body fw-bold">
                                        <i class="bx bx-hash"></i> {{ $invoice->code }}
                                    </a>
                                </td>
                                <td> {{ optional($invoice->client)->entreprise }}</td>
                                <td>
                                    {{ $invoice->invoice_date->format('d-m-Y') }}
                                </td>
                                <td>
                                    {{ $invoice->formated_price_ht }} DH
                                </td>
                                <td>
                                    {{ $invoice->formated_total_tva }} DH
                                </td>
                                <td>
                                    {{ $invoice->formated_price_total }} DH
                                </td>

                                <td>
                                    {{ $invoice->due_date->format('d-m-Y') }}
                                </td>
                                <td>
                                    <i class="mdi mdi-circle text-info font-size-10"></i>
                                    {{ __('response.status.'. $invoice->status) }}
                                </td>
                                <td>
                                    @if ($invoice->bill_count && $invoice->status === App\Constants\Response::INVOICE_PAID && !$invoice->avoir_count)
                                        <button type="button" class="btn btn-info  btn-sm" data-bs-toggle="modal"
                                            data-bs-target=".orderdetailsModal-{{ $invoice->id }}">
                                            Détails
                                        </button>
                                    @else
                                        @if ($invoice->avoir_count)
                                            <a href="#{{-- $invoice->avoir->url --}}" type="button"
                                                class="btn btn btn-danger btn-sm">
                                                Annulé par avoir
                                            </a>
                                        @else
                                            <button type="button" class="btn btn-warning  btn-sm" data-bs-toggle="modal"
                                                data-bs-target=".addPaymentToInvoice-{{ $invoice->uuid }}">
                                                Régler
                                            </button>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-3">

                                        <a href="{{ route('commercial:invoices.pdf.build', $invoice->uuid) }}"
                                            target="__blank" class="text-success">
                                            <i class="mdi mdi-file-pdf-outline font-size-18"></i>
                                        </a>

                                        <a href="{{ $invoice->edit_url }}" class="text-success">
                                            <i class="mdi mdi-pencil font-size-18"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
