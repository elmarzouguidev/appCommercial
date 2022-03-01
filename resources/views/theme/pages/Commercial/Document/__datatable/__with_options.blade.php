<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                        {{__('buttons.add')}}
                    </button>
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
                            <th>Numéro</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th colspan="2">details</th>
                
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($documents as $document)
                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox"
                                            id="orderidcheck-{{ $document->id }}">
                                        <label class="form-check-label" for="orderidcheck-{{ $document->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ $document->url }}" class="text-body fw-bold">
                                       {{ $document->id }}
                                    </a> 
                                </td>
                                <td> {{ $document->title }}</td>
                                <td>
                                    {{ $document->description }}
                                </td>
 
                                <td>
                                    <a href="{{ $document->url }}" type="button"
                                        class="btn btn-primary btn-sm btn-rounded">
                                        Voir les détails
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex gap-3">

                                        <a href="{{ $document->edit_url }}" class="text-success">
                                            <i class="mdi mdi-pencil font-size-18"></i>
                                        </a>
                                        <a href="#" class="text-danger" onclick="
                                                var result = confirm('Are you sure you want to delete this invoice ?');
                                                
                                                if(result){
                                                    event.preventDefault();
                                                    document.getElementById('delete-invoice-{{ $document->id }}').submit();
                                                }">
                                            <i class="mdi mdi-delete font-size-18"></i>
                                        </a>
                                    </div>
                                </td>
                                <form id="delete-invoice-{{ $document->id }}" method="post"
                                    action="{{ route('commercial:invoices.delete') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="invoiceId" value="{{ $document->uuid }}">
                                </form>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
