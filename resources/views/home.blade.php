@extends('layout')

@section('content')

<div class="card">
    <div class="card-header bg-secondary text-light">Layout: {{$imgs->l_name}}</div>
    <div class="card-body">
        @if($imgs->l_id == 2)

        <div id="gallery">
            @foreach($imgs->data as $img)

            <img width="{{$img->width}}" height="{{$img->height}}" src="/{{$img->path}}" alt="{{$img->title}}">

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
@endsection