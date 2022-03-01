<div class="row" id="printer">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="invoice-title">
                    <h4 class="float-end font-size-16">FACTURE N° : {{ $invoice->code }}</h4>
                    <div class="mb-4">
                        @php
                            $logo = $invoice->company->logo ? asset('storage/' . $invoice->company->logo) : asset('storage/company-logo/default.png');
                        @endphp
                        <img src="{{ $logo }}" alt="logo" height="50" />
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <address>
                            <strong>Destinataire :</strong><br>
                            {{ optional($invoice->client)->entreprise }}<br>
                            Adresse : {{ optional($invoice->client)->addresse }}<br>
                            ICE : {{ optional($invoice->client)->ice }}<br>
                        </address>
                    </div>
                    <div class="col-sm-6 text-sm-end">
                        <address class="mt-2 mt-sm-0">
                            <strong>{{ optional($invoice->company)->name }}</strong><br>

                            Adresse : {{ optional($invoice->company)->addresse }}
                            <br>
                            ICE : {{ optional($invoice->company)->ice }}
                            <br>
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <address>
                            <strong>méthode de paiement :</strong><br>
                            Chéque
                        </address>
                    </div>
                    <div class="col-sm-6 mt-3 text-sm-end">
                        <address>
                            <strong>Date de facture:</strong><br>
                            {{ $invoice->invoice_date->format('Y-m-d') }}<br><br>
                        </address>
                        <address>
                            <strong>date d'échéance:</strong><br>
                            {{ $invoice->due_date->format('Y-m-d') }}<br><br>
                        </address>
                    </div>
                </div>
                <div class="py-2 mt-3">
                    <h3 class="font-size-15 fw-bold">Détails de la facture</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 70px;">No.</th>
                                <th>Article</th>
                                <th>Qté</th>
                                <th class="text-end">Prix</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($invoice->articles as $article)

                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->designation }}</td>
                                    <td>{{ $article->quantity }}</td>
                                    <td class="text-end">{{ $article->formated_montant_ht }} DH</td>
                                </tr>

                            @endforeach
                            <tr>
                                <td colspan="3" class="text-end">Montant HT</td>
                                <td class="text-end">{{ $invoice->formated_price_ht }} DH</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="border-0 text-end">
                                    <strong>Montant TVA</strong>
                                </td>
                                <td class="border-0 text-end">{{ $invoice->formated_total_tva }} DH</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="border-0 text-end">
                                    <strong>Montant Total</strong>
                                </td>
                                <td class="border-0 text-end">
                                    <h4 class="m-0">{{ $invoice->formated_price_total }} DH</h4>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="d-print-none">
                    <div class="float-end">
                        <a href="#" class="btn btn-success waves-effect waves-light me-1" onclick="printDiv('printer')">
                            <i class="fa fa-print"></i>
                        </a>
                        <a href="{{ route('public.show.invoice', $invoice->uuid) }}" target="__blank"
                            class="btn btn-primary waves-effect waves-light me-1">
                            public lien
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
