<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;" class="align-middle">
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th>Fichier</th>
                                <th>Nom du Fichier</th>
                                <th>Type</th>
                                <th>Collection</th>
                                <th colspan="2">Size</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($ticket->getMedia('tickets-images') as $image)
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" name="checkedFiles[]" type="checkbox"
                                                id="check-media-{{ $image->id }}">
                                            <label class="form-check-label"
                                                for="check-media-{{ $image->id }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{{ $image->getFullUrl('normal') }}" alt="{{ $image->name }}"
                                            title="product-img" class="avatar-md" />
                                    </td>
                                    <td>
                                        <h5 class="font-size-14 text-truncate">
                                            <a href="#" class="text-dark">{{ $image->name }}</a>
                                        </h5>
                                    </td>
                                    <td>
                                        {{ $image->mime_type }}
                                    </td>
                                    <td>
                                        <div style="width: 120px;">
                                            {{ $image->collection_name }}
                                        </div>
                                    </td>
                                    <td>
                                        {{ $image->human_readable_size }}
                                    </td>
                                    <td>
                                        <a href="#" class="action-icon text-danger"
                                            onclick="document.getElementById('delete-ticket-media-{{ $image->id }}').submit();">
                                            <i class="mdi mdi-trash-can font-size-18"></i>
                                        </a>
                                    </td>
                                </tr>

                                <form id="delete-ticket-media-{{ $image->id }}" method="post"
                                    action="{{ route('admin:tickets.media.delete', $ticket->uuid) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="mediaId" value="{{ $image->id }}">
                                </form>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <a href="{{ $ticket->url }}" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left me-1"></i> return </a>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="text-sm-end mt-2 mt-sm-0">
                            <a href="ecommerce-checkout.html" class="btn btn-success">
                                <i class="mdi mdi-cart-arrow-right me-1"></i> Delete All </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">{{ $ticket->article }}</h5>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Détails</h4>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <th>Total :</th>
                                <th>{{ $ticket->media_count }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Attaches images</h4>
                <form id="ticketFormAttachements" action="{{ route('admin:tickets.attachements', $ticket->uuid) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-lg-10">
                            <input class="form-control @error('photos') is-invalid @enderror" name="photos[]"
                                type="file" accept="image/*" multiple />
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    @error('photos')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="row justify-content-start">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-info">attaches images</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- end card -->
    </div>
</div>
