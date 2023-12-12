<div>
    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="card">
                        <article class="card-group-item">
                            <header class="card-header">
                                Price Per Night Range Filter
                            </header>
                            <div class="filter-content">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label>Min</label>
                                            <input type="number" class="form-control" id="inputEmail4"
                                                placeholder="0" wire:model.live="min" >
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Max</label>
                                            <input type="number" class="form-control" placeholder="0" wire:model.live="max" >
                                        </div>
                                    </div>
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- card-group-item.// -->
                        {{-- <article class="card-group-item">
                            <header class="card-header">
                                Room Category
                            </header>
                            <div class="filter-content">
                                <div class="card-body">

                                    {{-- @foreach ($room_categories as $category)
                                    <div class="custom-control custom-checkbox">
                                        <span class="float-right badge badge-light round">{{ $category->room_count }}</span>
                                        <input type="checkbox" name="category" class="custom-control-input" id="Check{{ $category->id }}" checked wire:model.live="filter_category[]" value="{{ $category->id }}">
                                        <label class="custom-control-label" for="Check{{ $category->id }}">{{ $category->name }}</label>
                                    </div> <!-- form-check.// -->
                                    @endforeach --}}

                                    {{-- <select class="form-control" wire:model.change="category">
                                        <option value="All">All</option>
                                        @forelse ($room_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty
                                            <option disabled>No Category Found</option>
                                        @endforelse
                                    </select> --}}

                                    

                                    
                                {{-- </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- card-group-item.// --> --}} 
                    </div> <!-- card.// -->
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="row my-2">
                        <div class="col-12">
                            <input type="search" class="form-control" placeholder="Search for Rooms" wire:model.live="search">
                        </div>
                    </div>
                    <div class="row">
                        @forelse ($rooms as $room)
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="room-item">
                                <img src="{{ asset('storage/'.$room->image_path) }}" style="height: 368px; with: 529px;">
                                <div class="ri-text">
                                    <h4>{{ $room->name }}</h4>
                                    <h3>₱{{ $room->category->price }}<span>/Night</span></h3>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="r-o">Category:</td>
                                                <td>{{ $room->category->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Size:</td>
                                                <td>{{ $room->category->size }} sqm</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Capacity:</td>
                                                <td>Max of {{$room->category->capacity}} person</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Availablity:</td>
                                                <td>{!! ($room->is_available) ? "<p class='badge badge-success'>Available</p>" : "<p class='badge badge-danger'>Unavailable</p>" !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{ route('room.show', $room->id) }}" class="primary-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="col-12 text-center my-5 py-5">
                                
                            <h3 class="text-center">No Rooms Found.</h3>
                            </div>
                        @endforelse
                       
                    </div>
                    <div class="col-lg-12">
                        <div class="room-pagination d-flex align-items-center justify-content-center">
                            {{ $rooms->links(); }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<!-- Rooms Section End -->
</div>
