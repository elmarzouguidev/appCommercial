<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-4">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target=".addCategory">
                            Ajouter une catégorie
                        </button>
                    </div>
                </div>

                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th style="width: 20px;" class="align-middle">
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th>categorie N°</th>
                            <th>Nom</th>
                    
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox"
                                            id="orderidcheck-{{ $category->id }}">
                                        <label class="form-check-label" for="orderidcheck-{{ $category->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ $category->url }}" class="text-body fw-bold">
                                        {{ $category->code }}
                                    </a>
                                </td>

                                <td>
                                    {{ $category->name }}
                                </td>

                                <td>
                                    <div class="d-flex gap-3">

                                        <a href="{{ $category->edit_url }}" class="text-success">
                                            <i class="mdi mdi-pencil font-size-18"></i>
                                        </a>
                                        <a href="#" class="text-danger" onclick="
                                                var result = confirm('Are you sure you want to delete this invoice ?');

                                                if(result){
                                                    event.preventDefault();
                                                    document.getElementById('delete-category-{{ $category->uuid }}').submit();
                                                }">
                                            <i class="mdi mdi-delete font-size-18"></i>
                                        </a>
                                    </div>
                                </td>
                                <form id="delete-category-{{ $category->uuid }}" method="post"
                                    action="{{ route('commercial:bills.delete') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="categoryId" value="{{ $category->uuid }}">
                                </form>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('theme.pages.Catalog.Category.__datatable.add_category')