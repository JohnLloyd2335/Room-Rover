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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Mobile Number</th>
                            <th>Age</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="text-center">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->mobile_number }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->dob }}</td>
                                <td>{{ $user->gender }}</td>
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
               {{ $users->links() }}
            </div>
        </div>


    </div>


</div>
