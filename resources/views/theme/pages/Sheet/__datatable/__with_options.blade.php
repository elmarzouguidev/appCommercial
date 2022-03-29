<div class="row" id="sheets_lister">

    {{--@include('theme.pages.Sheet.__datatable.__filters')--}}

    <div class="col-" id="sheets-list">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="col-lg-4 mb-4">
                            <a href="#" type="button" onclick="openFilters()" class="btn btn-primary">
                                Filters
                            </a>
                            <button type="button" class="btn btn-info  btn-sm" data-bs-toggle="modal"
                                data-bs-target=".addSheet">
                                Ajouter un document
                            </button>
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
                            <th>CODE</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($sheets as $sheet)
                            <tr>
                                {{-- <td>
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox"
                                        id="orderidcheck-{{ $invoice->id }}">
                                    <label class="form-check-label" for="orderidcheck-{{ $invoice->id }}"></label>
                                </div>
                            </td> --}}
                                <td>
                                    <a href="{{ $sheet->url }}" class="text-body fw-bold">
                                        <i class="bx bx-hash"></i> {{ $sheet->code }}
                                    </a>
                                </td>
                                <td> {{ $sheet->name }}</td>

                                <td>
                                    <i class="mdi mdi-circle text-info font-size-10"></i>
                                    ok
                                </td>

                                <td>
                                    <div class="d-flex gap-3">

                                        <a href="{{ $sheet->edit_url }}" class="text-success">
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
