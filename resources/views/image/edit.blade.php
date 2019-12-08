@extends('layout')

@section('content')

<div class="card">
    <div class="card-body">
        <form method="POST">
            @csrf

            <div class="col">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">
                        Delete Image
                    </button>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" value="{{$img->title}}" name="title" id="title">
                    </div>

                    <div class="form-group">
                        <label for="title">Description</label>
                        <textarea class="form-control" name="desc" aria-label="With textarea">{{$img->desc}}</textarea>
                    </div>
                </div>

                <div class="col-md-12">

                    <input type="hidden" name="cropX" id="cropX">
                    <input type="hidden" name="cropY" id="cropY">
                    <input type="hidden" name="cropWidth" id="cropWidth">
                    <input type="hidden" name="cropHeight" id="cropHeight">
                    <div class="row">
                        <div class="col-md-6">
                            <img id="image" style="width:100%" src="/{{$img->path}}" alt="Picture">
                        </div>

                        <div class="col-md-5 m-3">

                            <button type="button" class="btn btn-info" id="btn-rotate"><span><i
                                        class="fas fa-sync-alt"></i></span> Rotate</button>
                            <div class="custom-control custom-checkbox mt-3">
                                <input type="checkbox" class="custom-control-input" name="cropCheck" id="cropCheck">
                                <label class="custom-control-label" for="cropCheck">Apply Crop</label>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-md-6 mt-3">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>

            </div>

        </form>
    </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure, you want to delete this image?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a class="btn btn-danger" href="{{route('image.destroy', ['id' => $img->id])}}">Yes</a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(() => {

    var image = $('#image');

    image.cropper({

        crop: function(event) {
            console.log(event.detail.x);
            // console.log(event.detail.y);
            // console.log(event.detail.width);
            // console.log(event.detail.height);
            // console.log(event.detail.rotate);
            // console.log(event.detail.scaleX);
            // console.log(event.detail.scaleY);

            $('#cropX').val(event.detail.x);
            $('#cropY').val(event.detail.y);
            $('#cropWidth').val(event.detail.width);
            $('#cropHeight').val(event.detail.height);
        }



    });

    // Get the Cropper.js instance after initialized
    var cropper = image.data('cropper');

    var rotateValue = 0;

    $("#btn-rotate").click(() => {
        rotateValue += 90;
        if (rotateValue == 360) {
            rotateValue = 0;
        }
        cropper.rotateTo(rotateValue);
        //console.log(rotateValue);
        //$('#image').css('transform', `rotate(${rotateValue}deg)`);
        $('#irotate').val(rotateValue);
        //console.log(`rotate(${rotateValue}deg)`);
    });
});
</script>
@endsection