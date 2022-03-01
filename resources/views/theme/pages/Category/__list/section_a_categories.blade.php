<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="width: 70px;">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                    
                                <tr>
                        
                                    <td>
                                        <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">{{$category->id}}</a></h5>
                                      
                                    </td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->logo}}</td>
                     
                                    <td>{{$category->is_published}}</td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <a href="#" class="text-danger"
                                            onclick="document.getElementById('delete-category-{{$category->id}}').submit();"
                                            >
                                                <i class="mdi mdi-delete font-size-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <form id="delete-category-{{$category->id}}" method="post" action="{{route('admin:categories.delete')}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="categoryId" value="{{$category->id}}">
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="pagination pagination-rounded justify-content-center mt-4">
                            <li class="page-item disabled">
                                <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="javascript: void(0);" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link">4</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link">5</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Ajouter une catégorie</h4>
  
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form id="categoryForm" action="{{route('admin:categories.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="role">Nom *</label>
                                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description">Description </label>
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