@extends('layout')

@section('content')

<div class="card">
    <div class="card-header bg-secondary text-white">Layouts</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form method="POST">
                @csrf
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
            </div>

            <div class="col-md-12">

                @foreach($layouts as $layout)
                <div class="card mt-3">
                    <div class="card-header bg-light text-dark">{{$layout->name}}</div>
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

            </div>
        </div>
    </div>
</div>

@endsection