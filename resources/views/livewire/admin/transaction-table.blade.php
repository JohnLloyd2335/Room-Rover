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
                            <th>Transaction ID</th>
                            <th>Customer</th>
                            <th>Room</th>
                            <th>Category</th>
                            <th>Payment Method</th>
                            <th>Reference Number</th>
                            <th>Amount</th>
                            <th>Payment Date</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $transaction)
                            <tr class="text-center">
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->booking->id }}</td>
                                <td>{{ $transaction->booking->user->name }}</td>
                                <td>{{ $transaction->booking->room->name }}</td>
                                <td>{{ $transaction->booking->room->category->name }}</td>
                                <td>
                                    
                                    @switch($transaction->payment_method)
                                        @case('Cash')
                                            {{ $transaction->payment_method }}        
                                            @break
                                        @case('E-Wallet')
                                            {{ $transaction->payment_method }} ({{ 'G-Cash' }})       
                                            @break
                                        @case('Credit Card')
                                            {{ $transaction->payment_method }} ({{ 'Visa' }})        
                                            @break
                                        @default
                                            {{ $transaction->payment_method }}     
                                    @endswitch
                                </td>
                                <td>{{ $transaction->reference_number }}</td>
                                <td>₱{{ $transaction->amount }}</td>
                                <td>{{ $transaction->payment_date }}</td>
                                <td class="d-flex align-items-center justify-content-around gap-2">
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#viewtransactionModal{{ $transaction->id }}"><i
                                            class="fas fa-eye"></i></button>

                                </td>



                                <!-- View Modal -->
                                <div class="modal fade" id="viewtransactionModal{{ $transaction->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="exampleModalLabel">View Transaction</h2>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-12 d-flex flex-column align-items-center">
                                                        <img src="{{ asset('storage/' . $transaction->booking->room->image_path) }}"
                                                            style="width: 700px; height:400px" alt="Category Image"
                                                            class="img-fluid">
                                                        <h4 class="modal-title fw-bold my-2 text-center"
                                                            id="exampleModalLabel">
                                                            {{ $transaction->booking->room->name }}</h4>
                                                    </div>


                                                </div>

                                                <div class="row my-2 px-5">

                                                    <div class="col-6">
                                                        <p class="fw-bold text-center">Transaction Details:</p>
                                                        <p>Customer Name:
                                                            <strong>{{ $transaction->booking->user->name }}</strong>
                                                        </p>
                                                        <p>Email:
                                                            <strong>{{ $transaction->booking->user->email }}</strong>
                                                        </p>
                                                        <p>Contact Number:
                                                            <strong>{{ $transaction->booking->user->mobile_number }}</strong>
                                                        </p>
                                                        <p>Checked In/Out:
                                                            <strong>{{ $transaction->booking->checked_in . ' to ' . $transaction->booking->checked_out }}</strong>
                                                        </p>
                                                        <p>Payment Status: <strong>
                                                                @switch($transaction->booking->is_paid)
                                                                    @case(true)
                                                                        <span class="badge badge-success">Paid</span>
                                                                    @break

                                                                    @case(false)
                                                                        <span class="badge badge-danger">Unpaid</span>
                                                                    @break

                                                                    @default
                                                                        <span
                                                                            class="badge badge-primary">{{ $transaction->is_paid }}
                                                                            </sp>
                                                                    @endswitch
                                                            </strong>
                                                        </p>
                                                        
                                                        <p>
                                                            Amount To Pay/Paid:
                                                            <strong>₱{{ $transaction->amount }}</strong>
                                                        </p>
                                                        <p>
                                                            Payment Method:
                                                            <strong>
                                                                @switch($transaction->payment_method)
                                                                    @case('Cash')
                                                                        {{ $transaction->payment_method }}        
                                                                        @break
                                                                    @case('E-Wallet')
                                                                        {{ $transaction->payment_method }} ({{ 'G-Cash' }})       
                                                                        @break
                                                                    @case('Credit Card')
                                                                        {{ $transaction->payment_method }} ({{ 'Visa' }})        
                                                                        @break
                                                                    @default
                                                                        {{ $transaction->payment_method }}     
                                                                @endswitch
                                                            </strong>
                                                        </p>
                                                        <p>
                                                            Reference Number:
                                                            <strong>{{ $transaction->reference_number }}</strong>
                                                        </p>
                                                        <p>
                                                            Payment Date:
                                                            <strong>{{ $transaction->payment_date }}</strong>
                                                        </p>
                                                        <span>
                                                            Payment Description:
                                                            
                                                        </span>
                                                        <strong style="text-align: justify; text-justify: inter-word">{{ $transaction->description }}</strong>
                                                        
                                                    </div>
                                                    <div class="col-6 px-5">
                                                        <p class="fw-bold text-center">Room Details:</p>
                                                        <p>Price per Night:
                                                            <strong>₱{{ $transaction->booking->room->category->price }}</strong>
                                                        </p>
                                                        <p>Size (sqm):
                                                            <strong>{{ $transaction->booking->room->category->size }}</strong>
                                                        </p>
                                                        <p>Capacity (max person):
                                                            <strong>{{ $transaction->booking->room->category->capacity }}</strong>
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
                    {{ $transactions->links() }}
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
