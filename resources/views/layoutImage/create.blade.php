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
              <div class="col-md-6">
                  <div class="card card-body">
                      <img src="/{{$img->path}}" alt="{{$img->name}}">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="checkbox" name="imgs[]" value="{{$img->id}}">
                          </div>
                        </div>
                        <input type="text" disabled class="form-control" aria-label="Text input with checkbox">
                      </div>
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