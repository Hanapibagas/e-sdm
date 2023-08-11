@extends('master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data video</h4>
                <p class="card-description">
                    Silahkan edit Data video
                </p>
                <form class="forms-sample" action="{{ route('update-video', $video->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="video" class="file-upload-default" value="{{ $video->video }}">
                        <div class="input-group col-xs-12">
                            <input type="file" class="form-control file-upload-info" placeholder="Upload Image"
                                name="video" value="{{ $video->video }}">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload Video</button>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('index-video') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
