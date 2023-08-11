@extends('master')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pengaturan</h4>
                <p class="card-description">
                    Update Pengaturan
                </p>
                <form class="forms-sample" action="{{ route('update-pengaturan', $pengaturan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Nama Dinas</label>
                        <input type="text" class="form-control" id="nama_dinas" placeholder="Nama Dinas"
                            name="nama_dinas" value="{{ $pengaturan->nama_dinas }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Alamat Dinas</label>
                        <input type="text" class="form-control" id="alamat_dinas" placeholder="Alamat Dinas"
                            name="alamat_dinas" value="{{ $pengaturan->alamat_dinas }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Nama Kepala Dinas</label>
                                <input type="text" class="form-control" id="nama_kadis" placeholder="Nama Kepala Dinas"
                                    name="nama_kadis" value="{{ $pengaturan->nama_kadis }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan_kadis"
                                    placeholder="Nama Kepala Dinas" name="jabatan_kadis"
                                    value="{{ $pengaturan->jabatan_kadis }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Photo Kepala Dinas</label>
                                <input class="form-control" id="inputnumber" type="file" placeholder="Masukkan photo ..."
                                    name="photo_kadis">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('storage/' . $pengaturan->foto_kadis) }}" alt="image"
                                    style="width:200px;height:200px;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Background Image</label>
                                <input class="form-control" id="inputnumber" type="file"
                                    placeholder="Masukkan background ..." name="image_background">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('storage/' . $pengaturan->image_background) }}" alt="image"
                                    style="width:50%;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Primary Color</label>
                                <input type="color" name="primary_color" value="{{ $pengaturan->primary_color }}"
                                    id="pilih-warna" onchange="tampilkanHex()">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="box"
                                    style="width: 80px;height: 80px;background-color: {{ $pengaturan->primary_color }}; border-radius: 50%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Running Text</label>
                        <textarea class="form-control" name="running_text" id="editor" cols="30" rows="5"
                            placeholder="Masukkan Running text ...">{{ $pengaturan->running_text }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function tampilkanHex() {
            var input = document.getElementById("pilih-warna");
            var hexWarna = input.value;

            // Mengubah nilai hex menjadi format yang diinginkan
            hexWarna = hexWarna.substr(1); // Menghapus karakter '#' di depan
            hexWarna = hexWarna.toUpperCase(); // Mengubah menjadi huruf kapital

        }
    </script>
@endsection
