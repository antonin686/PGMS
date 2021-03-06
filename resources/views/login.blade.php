<!DOCTYPE html>
<html lang="en">

<head>
    <title>PGMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src=" {{ asset('js/dropzone.min.js')}} "></script>
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('css/style.css')}} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/cropper.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery.mosaic.min.css')}}">
    <script src=" {{ asset('js/cropper.min.js')}} "></script>
    <script src=" {{ asset('js/jquery-cropper.min.js')}} "></script>
    <script src=" {{ asset('js/jquery.mosaic.min.js')}} "></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">PGMS</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('root')}}">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            
        </div>

    </nav>

    <div class="container mt-3 mb-3">
        <div class="col-md-6 mx-auto">
            <div class="card card-body">
                <form method="POST">
				@csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>