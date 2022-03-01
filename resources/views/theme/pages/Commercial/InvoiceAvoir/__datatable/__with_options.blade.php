<div class="row">

    @include('theme.pages.Commercial.InvoiceAvoir.__datatable.__filters')

    <div class="col-" id="invoices-list">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="col-lg-4 mb-4">
                            <a href="#" type="button" onclick="openFilters()" class="btn btn-primary">
                                Filters
                            </a>
                            <a href="{{ route('commercial:invoices.create.avoir', ['avoir' => 'yes']) }}"
                               type="button" class="btn btn-danger">
                                Créer une facture d'avoir
                            </a>
                        </div>
                    </div>
                </div>
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
                        <th>Facture N°</th>
                        <th>{{ __('invoice.table.date_invoice') }}</th>
                        <th>{{ __('invoice.table.total_ht') }}</th>
                        <th>{{ __('invoice.table.total_tva') }}</th>
                        <th>Status</th>
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
                            <td>
                                {{ $invoice->invoice_number }}
                            </td>
                            <td>
                                {{ $invoice->invoice_date->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ $invoice->formated_price_ht }} DH
                            </td>
                            {{-- <td>
                                {{ $invoice->formated_price_total }} DH
                            </td> --}}
                            <td>
                                {{ $invoice->formated_total_tva }} DH
                            </td>
                            <td>
                                <i class="mdi mdi-circle text-info font-size-10"></i>
                                Régler
                            </td>
                            <td>
                                <div class="d-flex gap-3">

                                    <a href="{{ route('commercial:invoices.pdf.build.avoir', $invoice->uuid) }}"
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
