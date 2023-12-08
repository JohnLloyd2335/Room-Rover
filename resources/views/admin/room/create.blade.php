@extends('admin.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark fw-bold">Add Room</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item  ">Room</li>

              <li class="breadcrumb-item  ">Add Room</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="card shadow-lg py-3 px-3">

      <div class="row">
        <div class="col-12">
          <form action="{{ route('admin.room.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

              <div class="col-md-8 col-sm-12">
                <label>Category</label>
                <select class="form-control @error('category') is-invalid @enderror" name="category">
                  @forelse ($room_categories as $key => $value)
                    <option @selected(old('category') == $value) value="{{ $key }}">{{ $value }}</option>
                  @empty
                      <option disabled>No Category Found</option>
                  @endforelse
                </select>
                @error('category')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>



              <div class="col-md-4 col-sm-12">
                <label>Image</label>
                <input type="file" placeholder="Image" name="image" class="form-control @error('image') is-invalid @enderror" accept=".png,.jpg,.jpeg" >
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
             
            </div>
            <div class="row">
              
              <div class="col-md-12 col-sm-12">
                <label>Name</label>
                <input type="text" value="{{ old('name') }}" placeholder="Name" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
             
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12">
                <label>Room Details</label>
                <textarea name="details" class="form-control @error('details') is-invalid @enderror" id="room_details" cols="30" rows="30" placeholder="Room Details">{{ old('details') }}</textarea>
              </div>
              @error('details')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>

            <div class="row my-2">
              <div class="col-12 ">
                <button type="submit" class="btn btn-primary float-end">Add</button>
                <a href="{{ route('admin.room.index') }}" class="float-end btn btn-secondary text-light mr-1">Cancel</a>
              </div>
            </div>
          </form>
        </div>
      </div>

    
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->    
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
@endsection