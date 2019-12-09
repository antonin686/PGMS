@extends('layout')

@section('content')

<div class="card">
    <div class="card-header bg-secondary text-white">
        Image List
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($imgs as $img)
            <div class="col-md-4">
                <div class="card card-body m-3">
                    <a href="/image/edit/{{$img->id}}">
                        <div class="container">
                            <div class="img-hover">
                                <img src="/{{$img->path}}" alt="{{$img->title}}">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

@endsection