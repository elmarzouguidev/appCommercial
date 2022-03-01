<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Ajouté Admin</h4>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{route('admin:admins.createPost')}}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="nom" class="col-md-2 col-form-label">Nom</label>
                        <div class="col-md-10">
                            <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{old('nom')}}"
                                id="nom">
                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="prenom" class="col-md-2 col-form-label">Prénom</label>
                        <div class="col-md-10">
                            <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" value="{{old('prenom')}}"
                                id="prenom">
                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{old('email')}}" placeholder="Enter Email"
                                id="example-email-input">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-tel-input" class="col-md-2 col-form-label">Telephone</label>
                        <div class="col-md-10">
                            <input class="form-control @error('telephone') is-invalid @enderror" name="telephone" type="tel" value="{{old('telephone')}}" placeholder="Enter Telephone"
                                id="example-tel-input">
                            @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-password-input" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-10">
                            <input class="form-control @error('password') is-invalid @enderror" name="password" type="password"   placeholder="Enter Password"
                                id="example-password-input">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Role</label>
                        <div class="col-md-10">
                            <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                                <option value=""></option>
                                @foreach($roles as $role)
                                 <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Super Admin</label>
                        <div class="col-md-10">
                            <select name="super_admin" class="form-select @error('super_admin') is-invalid @enderror">
                                <option value="0">Non</option>
                                <option value="1">Oui</option>
                            </select>
                            @error('super_admin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
