<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="col-lg-4 mb-4">
                            <a href="{{ route('commercial:bcommandes.create') }}" type="button" class="btn btn-info">
                                Créer un bon de commande
                            </a>
                        </div>
                    </div>
                </div>
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        {{--<th style="width: 20px;" class="align-middle">
                            <div class="form-check font-size-16">
                                <input class="form-check-input" type="checkbox" id="checkAll">
                                <label class="form-check-label" for="checkAll"></label>
                            </div>
                        </th>--}}
                        <th>Numéro</th>
                        <th>Founisseur</th>
                        <th>date de BON</th>
                        <th>Montant HT</th>
                        <th>Montant TOTAL</th>
                        <th>Montant TVA</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($commandes as $document)
                        <tr>
                            {{--<td>
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox"
                                           id="orderidcheck-{{ $document->id }}">
                                    <label class="form-check-label" for="orderidcheck-{{ $document->id }}"></label>
                                </div>
                            </td>--}}
                            <td>
                                <a href="{{ $document->url }}" class="text-body fw-bold">
                                    {{ $document->full_number }}
                                </a>
    
                            </td>
                            <td> {{ optional($document->provider)->entreprise }}</td>
                            <td>
                                {{ $document->date_command->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ $document->formated_price_ht }}
                            </td>
                            <td>
                                {{ $document->formated_price_total }}
                            </td>
                            <td>
                                {{ $document->formated_total_tva }}
                            </td>
                            <td>
                                <div class="d-flex gap-3">
                                    <a href="{{ route('public.show.bcommand', $document->uuid) }}"
                                       target="__blank" class="text-success">
                                        <i class="mdi mdi-file-pdf-outline font-size-18"></i>
                                    </a>
                                    <a href="{{ $document->edit_url }}" class="text-success">
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
