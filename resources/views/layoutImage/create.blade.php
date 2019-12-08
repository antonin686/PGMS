@extends('layout')

@section('content')

<div class="card card-body">
    <form method="post">
        @csrf
        <div class="input-group mb-3">
            <select class="custom-select" name="layout">

                @foreach($layouts as $l)
                <option value="{{$l->id}}">{{$l->name}}</option>
                @endforeach
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="cat">Options</label>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <div class="row">
                    @foreach($imgs as $img)
                    <div class="col-md-3">

                        <div class="container">
                            <a href="/image/edit/{{$img->id}}">
                                <div class="container">
                                    <div class="img-hover">
                                        <img src="/{{$img->path}}" alt="{{$img->title}}">
                                    </div>
                                </div>

                            </a>

                            <label class="checkbox-inline">
                                <input type="checkbox" name="imgs[]" value="{{$img->id}}"> Select
                            </label>

                        </div>


                    </div>

                    @endforeach
                </div>
                <div class="col-md-6">
                    <input type="submit" class="btn btn-primary" value="Add">
                </div>

    </form>

</div>

</div>


</div>

@endsection