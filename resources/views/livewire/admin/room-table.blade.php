<div>
    
    <div class="card shadow-lg py-3 px-3">

        <div class="row">
            <div class="col-12">
                @include('includes.alert-message')
            </div>
            <div class="col-6">
                <a href="{{ route('admin.room.create') }}" class="btn btn-primary">Add Room</a>
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
                            <th>Category</th>
                            <th>Availability</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rooms as $room)
                            <tr class="text-center">
                                <td>{{ $room->id }}</td>
                                <td>{{ $room->name }}</td>
                                <td>{{ $room->category->name }}</td>
                                <td>
                                   @if ($room->is_available)
                                       <p class="badge badge-success p-2">Available</p>
                                   @else
                                        <p class="badge badge-danger p-2">Unavailable</p>
                                   @endif
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#viewRoomModal{{ $room->id }}"><i class="fas fa-eye"></i></button>
                                    <a href="{{ route('admin.room.edit', $room->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>

                            <!-- View Modal -->
                            <div class="modal fade" id="viewRoomModal{{ $room->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                      
                                       <div class="row">
                                            <div class="col-6">
                                                <img src="{{ asset('storage/'.$room->image_path) }}" style="width: 600px; height:300px" alt="Category Image" class="img-fluid">
                                            </div>

                                            <div class="col-6">
                                                <div class="col-12">
                                                    <h3 class="modal-title fw-bold" id="exampleModalLabel">{{ $room->name }}</h3>
                                                    <p>Price per Night: <strong>{{ $room->category->price }}</strong></p>
                                                    <p>Size (sqm): <strong>{{ $room->category->size }}</strong></p>
                                                    <p>Capacity (max person): <strong>{{ $room->category->capacity }}</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col">
                                                <label>Room Details</label>
                                                <div class="px-2" style="text-align: justify; text-justify: inter-word;">
                                                    {!! $room->details !!}
                                                </div>
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
                                <td colspan="5" class="text-center fw-bold">No Records Found.</td>
                            </tr>
                        @endforelse
                       
                    </tbody>
                </table>
            </div>
        </div>

        <!--Pagination-->
        <div class="row">
            <div class="col-12 d-flex align-item-center justify-content-end">
               {{ $rooms->links() }}
            </div>
        </div>


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
  <script>
    $(document).ready(function () {
    //CK Editor....
    var room_details = document.querySelectorAll('#room_details');
  
    for(var i=0; i<room_details.length; i++){
     ClassicEditor.create(room_details[i]).catch((error) => {
       console.log(error);
     });
    }
  });
  </script>


</div>
