<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Room Rover | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

      </ul>



      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">


        <li class="nav-item dropdown">
          <div class="dropdown">
            <button class="btn" data-bs-toggle="dropdown" aria-expanded="false" style="outline: none; border: none;">
              {{ auth()->user()->name }}
              <i class="fa fa-user ml-2"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <form action="{{ route('admin.logout') }}" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
                
              </li>
            </ul>
          </div>
        </li>
        


      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <img src="{{ asset('img/logo-text.png') }}" alt="Logo" width="230" style="opacity: .8">

      </a>

      <!-- Sidebar -->
      <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="dashboard.html" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="room_category.html" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Room Category
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="room.html" class="nav-link">
                <i class="nav-icon fas fa-hotel"></i>
                <p>
                  Room
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                  Reservation
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pending_reservation.html" class="nav-link">
                    <p>Pending</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="approved_reservation.html" class="nav-link">
                    <p>Approved</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cancelled_reservation.html" class="nav-link">
                    <p>Cancelled</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="rejected_reservation.html" class="nav-link">
                    <p>Rejected</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-calendar-check"></i>
                <p>
                  Booking
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="unpaid_booking.html" class="nav-link">
                    <p>Unpaid Booking</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="paid_booking.html" class="nav-link">
                    <p>Paid Booking</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-dollar"></i>
                <p>
                  Payment
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="cash_payment.html" class="nav-link">
                    <p>Cash</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="credit_card_payment.html" class="nav-link">
                    <p>Credit Card</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="e_wallet_payment.html" class="nav-link">
                    <p>E-wallet</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="transaction.html" class="nav-link">
                <i class="nav-icon fas fa-money-check-dollar"></i>
                <p>
                  Transaction
                </p>
              </a>
            </li>



            <li class="nav-item">
              <a href="reports.html" class="nav-link">
                <i class="nav-icon fa-solid fa-chart-line"></i>
                <p>
                  Reports
                </p>
              </a>
            </li>


            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Users
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pending_users.html" class="nav-link">

                    <p>Pending Users</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="approved_users.html" class="nav-link">

                    <p>Approved Users</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="rejected_users.html" class="nav-link">

                    <p>Rejected Users</p>
                  </a>
                </li>
              </ul>
            </li>


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

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
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2023 <a class="text-info">Room Rover</a></strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.1-pre
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <!-- AdminLTE App -->
  <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>


</body>

</html>