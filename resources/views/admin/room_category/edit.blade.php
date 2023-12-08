@extends('admin.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark fw-bold">Edit Room Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item  ">Room Category</li>

              <li class="breadcrumb-item  ">Edit Category</li>
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
          <form action="{{ route('admin.room_category.update',$category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <label>Category Name</label>
                <input type="text" placeholder="Category Name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <label>Price</label>
                <input type="number" value="{{ $category->price }}" placeholder="Price" name="price" class="form-control @error('price') is-invalid @enderror">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-md-4 col-sm-6">
                <label>Size(sqkm)</label>
                <input type="number" value="{{ $category->size }}" placeholder="Size" name="size" class="form-control @error('size') is-invalid @enderror">
                @error('size')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-md-4 col-sm-6">
                <label>Capacity</label>
                <input type="number" value="{{ $category->capacity }}" placeholder="Capacity" name="capacity" class="form-control @error('capacity') is-invalid @enderror">
                @error('capacity')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="row my-2">
              <div class="col-12 ">
                <button type="submit" class="btn btn-primary float-end">Update</button>
                <a href="{{ route('admin.room_category.index') }}" class="float-end btn btn-secondary text-light mr-1">Cancel</a>
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
@endsection