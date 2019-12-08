@extends('layout')

@section('content')


@foreach($layouts as $layout)
<div class="card mt-3">
    <div class="card-header bg-secondary text-white">{{$layout->name}}</div>
    <div class="card-body">
        <div class="row">
            @foreach($layout->data as $img)
            <div class="col-md-3">
                <a href="/image/edit/{{$img->id}}">
                    <div class="container">
                        <div class="img-hover">
                            <img src="/{{$img->path}}" alt="{{$img->title}}">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endforeach


@endsection