<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
        
                        <div class="col-lg-4 mb-4">
                            <a href="{{ route('commercial:companies.create') }}" type="button" class="btn btn-info">
                                {{__('company.companies_add')}}
                            </a>
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
                            <th class="align-middle">{{ __('company.table.id') }}</th>
                            <th class="align-middle">{{ __('company.table.name') }}</th>
                            {{-- <th class="align-middle">Website</th> --}}
                            {{-- <th class="align-middle">Description</th> --}}
                            <th class="align-middle">{{ __('company.table.city') }}</th>
                            <th class="align-middle">{{ __('company.table.addresse') }}</th>
                            <th class="align-middle">{{ __('company.table.phone') }}</th>
                            <th class="align-middle">{{ __('company.table.email') }}</th>
                            <th class="align-middle">{{ __('company.table.ice') }}</th>
                            <th class="align-middle">{{ __('company.table.rc') }}</th>
                            <th class="align-middle">{{ __('company.table.cnss') }}</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                        <label class="form-check-label" for="orderidcheck01"></label>
                                    </div>
                                </td>
                                <td><a href="{{ $company->edit_url }}"
                                        class="text-body fw-bold">{{ $company->id }}</a>
                                </td>
                                <td> {{ $company->name }}</td>
                                {{-- <td>
                                    {{$company->website}}
                                </td> --}}
                                {{-- <td>
                                    {{$company->description}}
                                </td> --}}
                                <td>
                                    {{ $company->city }}
                                </td>
                                <td>
                                    {{ $company->addresse }}
                                </td>
                                <td>
                                    {{ $company->telephone }}
                                </td>
                                <td>
                                    {{ $company->email }}
                                </td>
                                <td>
                                    {{ $company->ice }}
                                </td>
                                <td>
                                    {{ $company->rc }}
                                </td>
                                <td>
                                    {{ $company->cnss }}
                                </td>

                                <td>
                                    <div class="d-flex gap-3">

                                        <a href="{{ $company->edit_url }}" class="text-success"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="#" class="text-danger"
                                            onclick="document.getElementById('delete-company-{{ $company->uuid }}').submit();">
                                            <i class="mdi mdi-delete font-size-18"></i>
                                        </a>
                                    </div>
                                </td>

                            </tr>

                            <form id="delete-company-{{ $company->uuid }}" method="post"
                                action="{{ route('commercial:companies.delete') }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="companyId" value="{{ $company->uuid }}">
                            </form>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
