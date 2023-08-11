@extends('master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Agenda</h4>
                <p class="card-description">
                    Silahkan Tambah Data Agenda
                </p>
                <form class="forms-sample" action="{{ route('update-agenda', $agenda->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">judul agenda</label>
                        <input type="text" class="form-control" id="judul" placeholder="judul" name="judul"
                            value="{{ $agenda->judul }}">
                    </div>
                    <div class="form-group">
                        <label for="title">photo</label>
                        <input class="form-control" id="inputnumber" type="file" placeholder="Masukkan photo ..."
                            name="photo">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('index-agenda') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
