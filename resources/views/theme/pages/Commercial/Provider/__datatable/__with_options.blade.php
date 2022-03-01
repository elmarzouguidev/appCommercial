<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="col-lg-4 mb-4">
                            <a href="{{ route('commercial:providers.create') }}" type="button" class="btn btn-info">
                                Ajouter un fournisseur
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
                            <th scope="col">Code Fournisseur</th>
                            <th scope="col">Entreprise</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Email</th>
                            {{--<th scope="col">Addresse</th>--}}
                            <th scope="col">ICE</th>
                            <th scope="col">RC</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($providers as $provider)

                            <tr>

                                <td>{{ $provider->code }}</td>
                                <td>
                                    <h5 class="font-size-14 mb-1"><a href="{{ $provider->url }}"
                                            class="text-dark">{{ $provider->entreprise }}</a></h5>
                                    <p class="text-muted mb-0">{{ $provider->contact }}</p>
                                </td>
                                <td>{{ $provider->telephone }}</td>
                                <td>{{ $provider->email }}</td>
                                {{--<td>{{ $provider->addresse }}</td>--}}
                                <td>{{ $provider->ice }}</td>
                                <td>{{ $provider->rc }}</td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ $provider->edit }}" class="text-success"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="#" class="text-danger"
                                            onclick="document.getElementById('delete-provider-{{ $provider->uuid }}').submit();">
                                            <i class="mdi mdi-delete font-size-18"></i>
                                        </a>
                                    </div>

                                    <form id="delete-provider-{{ $provider->uuid }}"
                                        action="{{ route('commercial:providers.delete') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="providerId" value="{{ $provider->uuid }}">

                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
