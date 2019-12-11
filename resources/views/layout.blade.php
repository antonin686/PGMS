<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Dashboard</title>


    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css')}} ">
    
    <link rel="stylesheet" href="{{ asset('css/cropper.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery.mosaic.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}} ">

    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    <script src=" {{ asset('js/jquery.mosaic.min.js')}} "></script>
    
    

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="{{route('home')}}">PGMS</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <ul class="navbar-nav mr-auto"> </ul>
        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item">
                <a class="nav-link" href=" {{route('logt')}}">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-images"></i>
                    <span>Images</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="{{route('image.index')}}">List</a>
                    <a class="dropdown-item" href="{{route('image.create')}}">Add</a>
                    
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-camera-retro"></i>
                    <span>Gallery</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="{{route('galleryImage.index')}}">Show</a>
                    <a class="dropdown-item" href="{{route('galleryImage.create')}}">Add</a>           
                </div>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->
        </ul>

        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                @yield('content')
                <!-- DataTables Example -->
                <!-- <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Data Table Example</div>
                    <div class="card-body">


                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div> -->

            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © PGMS 2019</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
    <script src=" {{ asset('js/dropzone.min.js')}} "></script>
    <script src="{{asset('js/sb-admin.min.js')}}"></script>
    <script src=" {{ asset('js/cropper.min.js')}} "></script>
    <script src=" {{ asset('js/jquery-cropper.min.js')}} "></script>
   
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>


</body>

</html>