<div>

    <div class="card shadow-lg py-3 px-3">

        <div class="row">
            <div class="col-12">
                @include('includes.alert-message')
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="float-end">
                    <input type="text" class="form-control" placeholder="Search..."
                        wire:model.live.debounce.250ms="search">
                </div>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Room Name</th>
                            <th>Category</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cancelled_reservations as $reservation)
                            <tr class="text-center">
                                <td>{{ $reservation->id }}</td>
                                <td>{{ $reservation->user->name }}</td>
                                <td>{{ $reservation->room->name }}</td>
                                <td>{{ $reservation->room->category->name }}</td>
                                <td>{{ $reservation->start_date }}</td>
                                <td>{{ $reservation->end_date }}</td>
                                <td>
                                    @switch($reservation->status)
                                        @case('Pending')
                                            <p class="badge badge-primary">{{ $reservation->status }}</p>
                                        @break

                                        @case('Approved')
                                            <p class="badge badge-success">{{ $reservation->status }}</p>
                                        @break

                                        @case('Cancelled')
                                            <p class="badge badge-dark">{{ $reservation->status }}</p>
                                        @break

                                        @case('Rejected')
                                            <p class="badge badge-danger">{{ $reservation->status }}</p>
                                        @break

                                        @default
                                            <p>{{ $reservation->status }}</p>
                                    @endswitch
                                </td>
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
                    {{ $cancelled_reservations->links() }}
                </div>
            </div>


        </div>



    </div>
