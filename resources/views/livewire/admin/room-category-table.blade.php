<div>
    
    <div class="card shadow-lg py-3 px-3">

        <div class="row">
            <div class="col-12">
                @include('includes.alert-message')
            </div>
            <div class="col-6">
                <a href="{{ route('admin.room_category.create') }}" class="btn btn-primary">Add Category</a>
            </div>
            <div class="col-6">
                <div class="float-end">
                    <input type="text" class="form-control" placeholder="Search..." wire:model.live.debounce.250ms="search">
                </div>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Capacity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr class="text-center">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->price }}</td>
                                <td>{{ $category->size }}</td>
                                <td>{{ $category->capacity }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#viewCategoryModal{{ $category->id }}"><i class="fas fa-eye"></i></button>


                                    <a href="{{ route('admin.room_category.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>


                            <!-- View Modal -->
                            <div class="modal fade" id="viewCategoryModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                      
                                       <div class="row">
                                        <div class="col-12">
                                            <img src="{{ asset('storage/'.$category->image_path) }}" style="width: 600px; height:300px" alt="Category Image" class="img-fluid">
                                        </div>
                                       </div>
                                       <div class="row">
                                        <div class="col-12">
                                            <h3 class="modal-title fw-bold text-center" id="exampleModalLabel">{{ $category->name }}</h3>
                                        </div>
                                        <div class="col-12">
                                            <p>Price per Night: <strong>{{ $category->price }}</strong></p>
                                            <p>Size (sqm): <strong>{{ $category->size }}</strong></p>
                                            <p>Capacity (max person): <strong>{{ $category->capacity }}</strong></p>
                                        </div>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                        @empty
                            <tr class="text-center">
                                <td colspan="6" class="text-center fw-bold">No Records Found.</td>
                            </tr>
                        @endforelse
                       
                    </tbody>
                </table>
            </div>
        </div>

        <!--Pagination-->
        <div class="row">
            <div class="col-12 d-flex align-item-center justify-content-end">
               {{ $categories->links() }}
            </div>
        </div>


    </div>


</div>
