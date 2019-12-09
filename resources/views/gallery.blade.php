<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gallery</title>
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
    <nav></nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        @if($imgs->l_id == 2)

                        <div id="gallery">
                            @foreach($imgs->data as $img)

                            <img width="{{$img->width}}" height="{{$img->height}}" src="/{{$img->path}}"
                                alt="{{$img->title}}">

                            @endforeach
                        </div>

                        @else

                        <div class="row">
                            @foreach($imgs->data as $img)
                            <div class="col-md-3">

                                <div class="container">
                                    <div class="img-hover">
                                        <img src="/{{$img->path}}" alt="{{$img->title}}">
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>


                        @endif

                    </div>
                </div>

            </div>
        </div>
        <script>
        $('#gallery').Mosaic({
            maxRowHeight: 800,
            refitOnResize: true,
            refitOnResizeDelay: false,
            defaultAspectRatio: 0.5,
            maxRowHeightPolicy: 'crop',
            highResImagesWidthThreshold: 850,
            responsiveWidthThreshold: 500
        });
        </script>
    </div>

</body>

</html>