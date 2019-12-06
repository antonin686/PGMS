@extends('layout')

@section('content')

<div class="card">
    <div class="card-header bg-secondary text-white">
        Image List
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($imgs as $img)
            <div class="col-md-3">
                <a href="/image/edit/{{$img->id}}">
                    <div class="container">
                        <div class="img-hover">
                            <img src="/{{$img->path}}" alt="{{$img->title}}">
                            <!--
                        <div class="img-text ">
                            <div class="h2">
                                dad
                            </div>
                        </div>
                        -->
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</div>

@endsection