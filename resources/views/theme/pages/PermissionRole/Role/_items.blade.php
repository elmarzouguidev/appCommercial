<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap table-check">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;" class="align-middle">
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th class="align-middle">Role ID</th>
                                <th class="align-middle">Nom</th>
                                <th class="align-middle">Type</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role )
                                <tr>
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                            <label class="form-check-label" for="orderidcheck01"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#{{$role->id}}</a> </td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->guard_name}}</td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <a href="javascript:void(0);" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="#" class="text-danger"
                                            onclick="document.getElementById('delete-role-{{$role->id}}').submit();"
                                            >
                                                <i class="mdi mdi-delete font-size-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <form id="delete-role-{{$role->id}}" method="post" action="{{route('admin:permissions-roles.delete')}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="roleId" value="{{$role->id}}">
                                </form>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <ul class="pagination pagination-rounded justify-content-end mb-2">
                    {{ $roles->links('vendor.pagination.bootstrap-4') }}
                </ul>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Ajouter un role</h4>
                <p class="card-title-desc">Fill all information below</p>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form id="clientForm" action="{{route('admin:permissions-roles.add')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="role">Role *</label>
                                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">

                                <label class="control-label">Type de User</label>

                                <select name="guard_name" class="form-control @error('guard_name') is-invalid @enderror">
                                    <option value="">Select</option>
                                    <option value="admin">Admin</option>
                                    <option value="technicien">Technicien</option>
                                    <option value="reception">Reception</option>
                                </select>

                                @error('guard_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="description">Description de role</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="5" name="description">{{old('description')}}</textarea>
                                
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Enregistrer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>