@extends('layout')

@section('content')


<div class="card">
    <div class="card-header bg-secondary text-white">
        Currently Selected Layout: {{$imgs->l_name}}
    </div>
    <div class="card-body">
        <form method="post">
            @csrf
            <input type="hidden" name="g_id" value="{{$imgs->g_id}}">
            <div class="input-group mb-3">
                <select class="custom-select" name="layout">
                    @foreach($layouts as $l)
                    <option value="{{$l->id}}">{{$l->name}}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Activate</button>
                </div>
            </div>
        </form>
        @if($imgs->l_id == 2)

        <div id="gallery">
            @foreach($imgs->data as $img)

            <img width="{{$img->width}}" height="{{$img->height}}" src="/{{$img->path}}" alt="{{$img->title}}">

            @endforeach
        </div>

        @else

        <div class="row">
            @foreach($imgs->data as $img)
            <div class="col-md-3 mb-3">
                <img width="300" height="300" class=" img-hover" src="/{{$img->path}}" />
            </div>
            @endforeach
        </div>

        @endif

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

@endsection