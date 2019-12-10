@extends('layout')

@section('content')

<div class="card">
    <div class="card-header bg-secondary text-white">
        Image List
    </div>
    <div class="card-body">
        <div class="col">
            @foreach($datas as $data)
            <div class="card">
                <div class="card-header">{{$data['cata_name']}}</div>
                <div class="card-body">
                    <div class="col">
                        @foreach($data['sub_data'] as $sub)
                        <div class="card mt-3">
                            <div class="card-header">{{$sub['sub_name']}}</div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($sub['data'] as $img)
                                    <div class="col-md-3">
                                        <div class="card card-body m-3">
                                            <a href="/image/edit/{{$img->id}}">
                                                <div class="container">
                                                    <div class="img-hover">
                                                        <img width="300" height="300" src="/{{$img->path}}"
                                                            alt="{{$img->title}}">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

@endsection