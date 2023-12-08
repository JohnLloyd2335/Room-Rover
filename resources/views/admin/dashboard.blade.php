@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark fw-bold">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item ">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>0</h3>
                                <p>Room Categories</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-list"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>0</h3>

                                <p>Room</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-hotel"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>0</h3>

                                <p>Customers</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <h3>0</h3>

                                <p>Reservation</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>0</h3>

                                <p> Bookings</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-clipboard"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>0</h3>

                                <p>Monthly Income</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>0</h3>

                                <p>Yearly Income</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->


                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">

                    <section class="col-lg-12 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fw-bold">
                                    <i class="fas fa-chart-line mr-1"></i>
                                    Income
                                </h3>
                                <div class="card-tools">
                                    <select class="form-control">
                                        <option>Daily</option>
                                        <option>Monthly</option>
                                        <option>Yearly</option>
                                    </select>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <h1 class="text-center fw-bold">Graph</h1>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>


                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
