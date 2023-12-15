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
                            <th>Reservation ID</th>
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
                        @forelse($on_going_bookings as $booking)
                            <tr class="text-center">
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->reservation->id }}</td>
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
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#paymentModal{{ $booking->id }}">Mark as Paid</button>
                                        @break

                                        @default
                                            <p class="badge badge-primary">{{ $booking->is_paid }}</p>
                                    @endswitch
                                </td>
                                <td>{{ $booking->is_paid ? $booking->payment->payment_method : 'Not Applicable' }}</td>
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
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#viewBookingModal{{ $booking->id }}"><i
                                            class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-primary"><i class="fas fa-check"></i></button>
                                </td>

                                <!-- View Modal -->
                                <div class="modal fade" id="viewBookingModal{{ $booking->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="exampleModalLabel">View Booking</h2>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-12 d-flex flex-column align-items-center">
                                                        <img src="{{ asset('storage/' . $booking->reservation->room->image_path) }}"
                                                            style="width: 700px; height:400px" alt="Category Image"
                                                            class="img-fluid">
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
                                                        <p>Payment Date: <strong>{{ $booking->payment->created_at ?? '' }}</strong></p>
                                                        @endif
                                                        <p>Booking Status: <strong>
                                                            @switch($booking->status)
                                                                @case('Completed')
                                                                    <span class="badge badge-success">Completed</sp>
                                                                    @break

                                                                    @case('On-Going')
                                                                        <span class="badge badge-primary">On-Going</span>
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
                                                <button type="button" data-bs-dismiss="modal"
                                                    class="btn btn-secondary">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Modal -->
                                <div class="modal fade" id="paymentModal{{ $booking->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="exampleModalLabel">Payment</h2>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-12 d-flex flex-column align-items-center">
                                                        <img src="{{ asset('storage/' . $booking->reservation->room->image_path) }}"
                                                            style="width: 700px; height:400px" alt="Category Image"
                                                            class="img-fluid">
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
                                                        <p>Payment Date: <strong>{{ $booking->payment->created_at ?? '' }}</strong></p>
                                                        @endif
                                                        <p>Booking Status: <strong>
                                                            @switch($booking->status)
                                                                @case('Completed')
                                                                    <span class="badge badge-success">Completed</sp>
                                                                    @break

                                                                    @case('On-Going')
                                                                        <span class="badge badge-primary">On-Going</span>
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
                                                <form action="{{ route('admin.payment.pay.cash', $booking->id) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="room_name" value="{{ $booking->reservation->room->name }}" required>
                                                    <input type="hidden" name="booking_id" value="{{ $booking->id }}" required>
                                                    <input type="hidden" name="amount" value="{{ $booking->amount }}" required>
                                                    <button type="submit" class="btn btn-primary">Mark as Paid</button>
                                                </form>
                                               
                                                <button type="button" data-bs-dismiss="modal"
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

            <!--Pagination-->
            <div class="row">
                <div class="col-12 d-flex align-item-center justify-content-end">
                    {{ $on_going_bookings->links() }}
                </div>
            </div>


        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
        <script>
            $(document).ready(function() {
                //CK Editor....
                var room_details = document.querySelectorAll('#room_details');

                for (var i = 0; i < room_details.length; i++) {
                    ClassicEditor.create(room_details[i]).catch((error) => {
                        console.log(error);
                    });
                }
            });
        </script>



    </div>
