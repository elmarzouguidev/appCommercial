<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Article : {{$ticket->article}}</h4>
                <p class="card-title-desc">{{$ticket->article}} </p>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form id="ticketForm" action="{{$ticket->update_url}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <label for="article" class="col-form-label col-lg-2">Article</label>
                        <div class="col-lg-10">
                            <input id="article" name="article" type="text"
                                   class="form-control @error('article') is-invalid @enderror"
                                   value="{{$ticket->article}}">
                            @error('article')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="ticketdesc-editor" class="col-form-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                      id="ticketdesc-editor" rows="6">
                                {{$ticket->description}}
                            </textarea>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
