<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Upload File</h4>
                <p class="card-title-desc">Here are examples of </p>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form id="ticketForm" action="{{route('admin:tickets.createPost')}}" method="post" enctype="multipart/form-data">

                    @csrf
            
                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">Photo</label>
                        <div class="col-lg-10">
                            <input class="form-control @error('photo') is-invalid @enderror" name="photo" type="file" accept="image/*" />
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </form>

                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button onclick="document.getElementById('ticketForm').submit();" class="btn btn-primary">Create Ticket</button>
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>
</div>