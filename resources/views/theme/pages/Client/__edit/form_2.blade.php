<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Basic Information</h4>
                <p class="card-title-desc">Fill all information below</p>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form autocomplete="off" class="outer-repeater" id="clientForm" action="{{ $client->update }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" id="phones_list">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="entreprise">Entreprise *</label>
                                <input id="entreprise" name="entreprise" type="text"
                                    class="form-control @error('entreprise') is-invalid @enderror"
                                    value="{{ $client->entreprise }}" required>
                                @error('entreprise')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="contact">Contact *</label>
                                <input id="contact" name="contact" type="text"
                                    class="form-control @error('contact') is-invalid @enderror"
                                    value="{{ $client->contact }}" required>
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telephone">Telephone *</label>
                                <input id="telephone" name="telephone" type="text"
                                    class="form-control @error('telephone') is-invalid @enderror"
                                    value="{{ $client->telephone }}" required>
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr>

                            @include('theme.pages.Client.__edit.__edit_phones')

                            <hr>
                            <div class="mb-3">
                                <label for="email">Email principal *</label>
                                <input id="email" name="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $client->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target=".addEmails">
                                Ajouter des Emails
                            </button>
                            <hr>

                            <div class="mb-3">
                                <label for="addresse">Siège social *</label>
                                <input id="addresse" name="addresse" type="text"
                                    class="form-control @error('addresse') is-invalid @enderror"
                                    value="{{ $client->addresse }}">
                                @error('addresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="rc">RC</label>
                                <input id="rc" name="rc" type="number"
                                    class="form-control @error('rc') is-invalid @enderror" value="{{ $client->rc }}"
                                    required>
                                @error('rc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="ice">ICE *</label>
                                <input id="ice" name="ice" type="number"
                                    class="form-control @error('ice') is-invalid @enderror" value="{{ $client->ice }}"
                                    required>
                                @error('ice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="description">Description de la société</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" rows="5" name="description">{{ $client->description }}</textarea>


                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>

                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
@include('theme.pages.Client.__edit.__edit_emails')
