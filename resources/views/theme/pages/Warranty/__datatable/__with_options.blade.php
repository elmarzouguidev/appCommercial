<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="col-lg-4 mb-4">
                            <a href="#" type="button" onclick="openFilters()" class="btn btn-primary">
                                Filters
                            </a>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target=".addWarranty">
                                Ajouter une Garantie
                            </button>
                        </div>
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
                        <th scope="col">Code</th>
                        <th scope="col">Ticket</th>
                        <th scope="col">Date de début</th>
                        <th scope="col">Date de fin</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($warranties as $warranty)
                        <tr>
                            <td>
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox"
                                           id="checkAll" value="{{ $warranty->id }}">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </td>
                            <td>
                                <a href="{{ $warranty->url }}" class="text-body fw-bold">
                                    {{ $warranty->code }}
                                </a>
                            </td>
                            <td>
                                {{ optional($warranty->ticket)->code }}
                            </td>
                            <td>
                                {{ $warranty->start_at }}
                            </td>
                            <td>
                                {{ $warranty->end_at }}
                            </td>
                            <td>
                                {{ $warranty->addresse }}
                            </td>
                            <td>
                                <div class="d-flex gap-3">

                                    <a href="{{ $warranty->edit }}" class="text-success">
                                        <i class="mdi mdi-pencil font-size-18"></i>
                                    </a>
                                    <a href="#" class="text-danger" onclick="
                                        var result = confirm('Are you sure you want to delete this client ?');

                                        if(result){
                                        event.preventDefault();
                                        document.getElementById('delete-warranty-{{ $warranty->uuid }}').submit();
                                        }">
                                        <i class="mdi mdi-delete font-size-18"></i>
                                    </a>
                                </div>
                            </td>
                            <form id="delete-warranty-{{ $warranty->uuid }}" method="post"
                                  action="{{ route('admin:clients.delete') }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="warrantyId" value="{{ $warranty->uuid }}">
                            </form>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
