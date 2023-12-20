@extends('layouts.app')
@section('content')
    <!-- Room Details Section Begin -->
    <section class="room-details-section spad my-3">
        <div class="container">
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
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <img src="{{ asset('storage/' . $room->image_path) }}" alt="Room Iamge" height="500"
                            width="1200">
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>{{ $room->name }}</h3>
                                <div class="rdt-right">
                                    {{ $room_avg }} / 5.0
                                    @php
                                        $roundedRating = round($room_avg * 2) / 2;
                                        $integerPart = floor($roundedRating);
                                        $decimalPart = $roundedRating - $integerPart;
                                    @endphp
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $integerPart)
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif ($decimalPart >= 0.5 && $i === $integerPart)
                                            <i class="fas fa-star-half-alt text-warning"></i>
                                        @else
                                            <i class="far fa-star text-secondary"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <h2>₱{{ $room->category->price }}<span>/Night</span></h2>
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
                                        <td>Max of {{ $room->category->capacity }} persons</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Availablity:</td>
                                        <td>{!! $room->is_available
                                            ? "<p class='badge badge-success text-light'>Available</p>"
                                            : "<p class='badge badge-danger text-light'>Unavailable</p>" !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="f-para">
                            <h4 class="fw-bold">Details:</h4>
                            <div class="pl-4">
                                {!! $room->details !!}
                            </div>
                            </p>
                        </div>
                    </div>

                    <livewire:customer.review :room_id="$room->id">

                </div>
                <div class="col-lg-4 disabled">
                    @if (!$room->is_available)
                        <div class="my-2">
                            <div class="alert alert-warning" role="alert">
                                Room is currently Reserved or Booked
                            </div>
                        </div>
                    @endif
                    <div class="room-booking ">

                        <h3 class="text-center">Reserve Now</h3>
                        <form action="{{ route('room.reserve', $room->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" class="date-input @error('start_date') is-invalid @enderror"
                                    id="date-in" name="start_date" @disabled(!$room->is_available)
                                    value="{{ old('start_date') }}">
                                <i class="icon_calendar"></i>
                            </div>
                            @error('start_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="date-input @error('end_date') is-invalid @enderror"
                                    id="date-out" name="end_date" @disabled(!$room->is_available)
                                    value="{{ old('end_date') }}">
                                <i class="icon_calendar"></i>
                            </div>
                            @error('end_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <button type="submit" @disabled(!$room->is_available)>Reserve</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->
@endsection
