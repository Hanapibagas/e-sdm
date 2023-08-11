@extends('master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data info grtafis</h4>
                <p class="card-description">
                    Silahkan Tambah Data info grafis
                </p>
                <form class="forms-sample" action="{{ route('store-infografis') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>File upload</label>
                        <div class="form-group">
                            <label for="title">photo</label>
                            <input class="form-control" id="inputnumber" type="file" placeholder="Masukkan photo ..."
                                name="photo">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('index-infografis') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
