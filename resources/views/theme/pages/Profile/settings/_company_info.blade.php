<div class="card">
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('admin:settings.company.update') }}" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="nom" class="col-md-2 col-form-label">Nom</label>
                <div class="col-md-10">
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                        value="{{ $user->name }}" id="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="prenom" class="col-md-2 col-form-label">Prénom</label>
                <div class="col-md-10">
                    <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom"
                        value="{{ $user->prenom }}" id="prenom">
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
                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                        value="{{ $user->email }}" id="example-email-input">
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
                    <input class="form-control @error('telephone') is-invalid @enderror" name="telephone" type="tel"
                        value="{{ $user->telephone }}" id="example-tel-input">
                    @error('telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="example-password-input" class="col-md-2 col-form-label">Old Password</label>
                <div class="col-md-10">
                    <input class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" type="password"
                        placeholder="Enter old Password" id="example-password-input">
                    @error('oldpassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="example-password-input" class="col-md-2 col-form-label">New Password</label>
                <div class="col-md-10">
                    <input class="form-control @error('new_password') is-invalid @enderror" name="new_password" type="password"
                        placeholder="Enter new Password" id="example-password-input">
                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="example-password-input" class="col-md-2 col-form-label">Comfirm Password</label>
                <div class="col-md-10">
                    <input class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password" type="password"
                        placeholder="Comfirm new Password" id="example-password-input">
                    @error('new_confirm_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div>
                <button type="submit" class="btn btn-primary w-md">Update</button>
            </div>
        </form>
    </div>
</div>
