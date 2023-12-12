<div>
    <section class="contact-section spad">
        <div class="container">
            <div class="card shadow-lg py-3 px-3">
                <div class="row">
                    <div class="col-12">
                        @if (session('error'))
                        <div class="my-2">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                               {{ session('error') }}
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                               </button>
                            </div>
                        </div>
                    @endif
    
                    @if (session('success'))
                        <div class="my-2">
                            <div class="alert alert-success alert-dismissible" role="alert">
                               {{ session('success') }}
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                               </button>
                            </div>
                        </div>
                    @endif
                    </div>
                </div>

                <div class="row my-2">
                    <div class="col-12">
                        <h2>My Reservation</h2>
                    </div>
                </div>

               

                <div class="row d-flex justify-content-end">
                    <div class="col-4">
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reservations as $reservation)
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
                                        <td class="d-flex align-items-center justify-content-center gap-2">
                                           @if(in_array($reservation->status,['Pending']))
                                                <form action="{{ route('reservation.cancel', $reservation) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-sm btn-secondary">Cancel</button>
                                                </form>
                                           @endif
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

                <!-- Pagination -->
                <div class="row">
                    <div class="col-12 d-flex align-item-center justify-content-end">
                        {{ $reservations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
