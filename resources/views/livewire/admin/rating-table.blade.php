<div>
    
    <div class="card shadow-lg py-3 px-3">

        <div class="row">
            <div class="col-12">
                @include('includes.alert-message')
            </div>
            <div class="col-12">
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
                            <th>Booking ID</th>
                            <th>Customer</th>
                            <th>Room</th>
                            <th>Category</th>
                            <th>Checked In/Out</th>
                            <th>Rating</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ratings as $rating)
                            <tr class="text-center">
                                <td>{{ $rating->id }}</td>
                                <td>{{ $rating->booking->id }}</td>
                                <td>{{ $rating->user->name }}</td>
                                <td>{{ $rating->room->name }}</td>
                                <td>{{ $rating->room->category->name }}</td>
                                <td>{{ $rating->booking->checked_in." to ".$rating->booking->checked_out }}</td>
                                <td>{{ $rating->rating }}</td>
                                <td>{{ $rating->comment }}</td>
                            </tr>

                        @empty
                            <tr class="text-center">
                                <td colspan="8" class="text-center fw-bold">No Records Found.</td>
                            </tr>
                        @endforelse
                       
                    </tbody>
                </table>
            </div>
        </div>

        <!--Pagination-->
        <div class="row">
            <div class="col-12 d-flex align-item-center justify-content-end">
               {{ $ratings->links() }}
            </div>
        </div>


    </div>


</div>
