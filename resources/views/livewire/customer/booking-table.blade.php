<div>
    <section class="contact-section spad">
        <div class="container-fluid">
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
                        <h2>My Bookings</h2>
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
                                    {{-- <th>ID</th>
                                    <th>Reservation ID</th> --}}
                                    <th>Customer</th>
                                    <th>Room</th>
                                    <th>Category</th>
                                    <th>Checked In/Out</th>
                                    <th>Payment Status</th>
                                    <th>Payment Method</th>
                                    <th>Amount To Pay/Paid</th>
                                    <th>Booking Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $booking)
                                    <tr class="text-center">
                                        {{-- <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->reservation->id }}</td> --}}
                                        <td>{{ $booking->reservation->user->name }}</td>
                                        <td>{{ $booking->reservation->room->name }}</td>
                                        <td>{{ $booking->reservation->room->category->name }}</td>
                                        <td>{{ $booking->checked_in . ' to ' . $booking->checked_out }}</td>
                                        <td>
                                            @switch($booking->is_paid)
                                                @case(true)
                                                    <p class="badge badge-success">Paid</p>
                                                @break

                                                @case(false)
                                                    <button class="btn btn-sm btn-primary">Pay Now</button>
                                                @break

                                                @default
                                                    <p class="badge badge-primary">{{ $booking->is_paid }}</p>
                                            @endswitch
                                        </td>
                                        <td>{{ $booking->is_paid ? $booking->payment->payment_method : 'Not Applicable' }}
                                        </td>
                                        <td>₱{{ $booking->amount }}</td>
                                        <td>
                                            @switch($booking->status)
                                                @case('Completed')
                                                    <p class="badge badge-success">Completed</p>
                                                @break

                                                @case('On-Going')
                                                    <p class="badge badge-primary">On-Going</p>
                                                @break

                                                @default
                                                    <p class="badge badge-info">{{ $booking->status }}</p>
                                            @endswitch
                                        </td>
                                        <td class="d-flex align-items-center justify-content-around gap-2">
                                            <button class="btn btn-sm btn-success" data-toggle="modal"
                                                data-target="#viewBookingModal{{ $booking->id }}"><i
                                                    class="fas fa-eye"></i></button>
                                        </td>

                                        <!-- View Modal -->
                                        <div class="modal fade" id="viewBookingModal{{ $booking->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="exampleModalLabel">View Booking</h2>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <div class="col-12 d-flex flex-column align-items-center">
                                                                <img src="{{ asset('storage/' . $booking->reservation->room->image_path) }}"
                                                                    style="width: 700px; height:400px"
                                                                    alt="Category Image" class="img-fluid">
                                                                <h4 class="modal-title fw-bold my-2 text-center"
                                                                    id="exampleModalLabel">
                                                                    {{ $booking->reservation->room->name }}</h4>
                                                            </div>


                                                        </div>

                                                        <div class="row my-2 px-5">

                                                            <div class="col-6">
                                                                <p class="fw-bold text-center">Booking Details:</p>
                                                                <p>Customer Name:
                                                                    <strong>{{ $booking->reservation->user->name }}</strong>
                                                                </p>
                                                                <p>Email:
                                                                    <strong>{{ $booking->reservation->user->email }}</strong>
                                                                </p>
                                                                <p>Contact Number:
                                                                    <strong>{{ $booking->reservation->user->mobile_number }}</strong>
                                                                </p>
                                                                <p>Checked In/Out:
                                                                    <strong>{{ $booking->checked_in . ' to ' . $booking->checked_out }}</strong>
                                                                </p>
                                                                <p>Payment Status: <strong>
                                                                        @switch($booking->is_paid)
                                                                            @case(true)
                                                                                <span class="badge badge-success">Paid</span>
                                                                            @break

                                                                            @case(false)
                                                                                <span class="badge badge-danger">Unpaid</span>
                                                                            @break

                                                                            @default
                                                                                <span
                                                                                    class="badge badge-primary">{{ $booking->is_paid }}
                                                                                    </sp>
                                                                            @endswitch
                                                                    </strong>
                                                                </p>
                                                                @if ($booking->is_paid)
                                                                    <p>
                                                                        Payment Method :
                                                                        <strong>{{ $booking->is_paid ? $booking->payment->payment_method : 'Not Applicable (Unpaid)' }}</strong>
                                                                    </p>
                                                                    <p>
                                                                        Amount To Pay/Paid:
                                                                        <strong>₱{{ $booking->amount }}</strong>
                                                                    </p>
                                                                    <p>Payment Date:
                                                                        <strong>{{ $booking->payment->created_at ?? '' }}</strong>
                                                                    </p>
                                                                @endif
                                                                <p>Booking Status: <strong>
                                                                        @switch($booking->status)
                                                                            @case('Completed')
                                                                                <span class="badge badge-success">Completed</sp>
                                                                                @break

                                                                                @case('On-Going')
                                                                                    <span
                                                                                        class="badge badge-primary">On-Going</span>
                                                                                @break

                                                                                @default
                                                                                    <span
                                                                                        class="badge badge-info">{{ $booking->status }}</span>
                                                                            @endswitch
                                                                    </strong></p>
                                                            </div>
                                                            <div class="col-6 px-5">
                                                                <p class="fw-bold text-center">Room Details:</p>
                                                                <p>Price per Night:
                                                                    <strong>₱{{ $booking->reservation->room->category->price }}</strong>
                                                                </p>
                                                                <p>Size (sqm):
                                                                    <strong>{{ $booking->reservation->room->category->size }}</strong>
                                                                </p>
                                                                <p>Capacity (max person):
                                                                    <strong>{{ $booking->reservation->room->category->capacity }}</strong>
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal"
                                                            class="btn btn-secondary">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="10" class="text-center fw-bold">No Records Found.</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-12 d-flex align-item-center justify-content-end">
                            {{ $bookings->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
