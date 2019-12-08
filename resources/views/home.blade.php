@extends('layout')

@section('content')
<div id="gallery">
    @foreach($imgs as $img)

        <img width="{{$img->width}}" height="{{$img->height}}" src="/{{$img->path}}" alt="{{$img->title}}">
        
    @endforeach
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